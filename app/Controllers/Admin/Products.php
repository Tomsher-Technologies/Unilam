<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminBaseResourceController;

use App\Models\Admin\AdminProductTypes_model;
use App\Models\Admin\AdminProductTypeDetails_model;
use App\Models\Admin\AdminProductMaterials_model;

class Products extends AdminBaseResourceController
{
    protected $modelName = "App\Models\Admin\AdminProduct_model";

    public function index()
    {
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Products', 'li_1' => 'Unilam', 'li_2' => 'Product'])
        ];
        $data['productDetails'] = $this->model
            ->distinct()->select('P.productID, P.productTypeIDs, P.canonicalName, P.productTitle, P.productImageUrl, P.productBannerImageUrl, P.status, P.createdOn, PM.materialName')
            ->from('products as P')
            ->join('product_material as PM', 'P.materialID = PM.materialID')
            ->findAll();
        //     echo $this->model->getLastQuery()->getQuery();die();
        // print_r($data['productDetails']);
        // die;

        return view('products-lists', $data);
    }

    public function createproduct()
    {
        $session = session();
        $AdminProductTypesModel = new AdminProductTypes_model();
        $AdminProductMaterialModel = new AdminProductMaterials_model();
        $AdminProductMaterialModel = new AdminProductMaterials_model();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Add Product', 'li_1' => 'Product', 'li_2' => 'Add Product'])
        ];

        $data['productTypes'] = $AdminProductTypesModel->select('')->get()->getResultArray();
        $data['productMaterials'] = $AdminProductMaterialModel->select('')->get()->getResultArray();

        if ($this->request->getMethod() === 'post') {

            $response =  $this->manageproduct();
            if ($response === 'Success') {

                $session->setFlashdata('successMessage', 'Successfully added Product');
                return redirect()->to('products');
            } else {
                return view('manage-product', $data);
            }
        } else {
            return view('manage-product', $data);
        }
    }

    public function editproduct($canonicalName = null)
    {
        $session = session();
        $AdminProductTypesModel = new AdminProductTypes_model();
        $AdminProductMaterialModel = new AdminProductMaterials_model();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Edit Product', 'li_1' => 'Product', 'li_2' => 'Edit Product'])
        ];

        $data['post'] = $this->model->where('canonicalName', $canonicalName)->first();

        if ((isset($data['post'])) && (!empty($data['post']))) {

            $data['gallaryImages'] = $this->model->getGalleryImage($data['post']['productID']);

            $data['productTypes'] = $AdminProductTypesModel->select('')->get()->getResultArray();
            $data['productMaterials'] = $AdminProductMaterialModel->select('')->get()->getResultArray();
            $data['canonicalName'] = $canonicalName;

            if (($this->request->getMethod() === 'post') && !empty($canonicalName)) {

                $response =  $this->manageproduct($data['post']['productID']);
                if ($response === 'Success') {
                    $session->setFlashdata('successMessage', 'Successfully updated Product');

                    if (!empty($canonicalName)) {

                        return redirect()->to('../admin/products');
                    } else {

                        return redirect()->to('products');
                    }
                } else {
                    return view('manage-product', $data);
                }
            } else {
                return view('manage-product', $data);
            }
        } else {
            $session->setFlashdata('errorMessage', 'This Product not found!');
            return redirect()->to('../admin/products');
        }
    }

    public function manageproduct($productID = null)
    {
        $AdminProductTypesModel = new AdminProductTypes_model();
        $AdminProductMaterialModel = new AdminProductMaterials_model();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Products', 'li_1' => 'Unilam', 'li_2' => 'Product'])
        ];
        $data['post'] = $_POST;
        $data['productTypes'] = $AdminProductTypesModel->select('')->get()->getResultArray();
        $data['productMaterials'] = $AdminProductMaterialModel->select('')->get()->getResultArray();
        $data['gallaryImages'] = $this->model->getGalleryImage($productID);
        $productDetails =   $this->model->where('productID', $productID)->first();
        if ($this->validateInput($productID)) {
            $canonName = strtolower($this->request->getVar('productTitle'));
            $canonicalName = str_replace(' ', '-', $canonName); // Replaces all spaces with hyphens.
            $canonicalName = preg_replace('/[^A-Za-z0-9\-]/', '', $canonicalName); // Removes special chars.
            $cann = preg_replace('/-+/', '-', $canonicalName);

            if (!empty($productID)) {
                $productDetails = $this->model->where('productID', $productID)->first();
                if (!empty($productDetails)) {

                    $updateData = [
                        'canonicalName' => $cann . '-' . $productID,
                        'productTitle' => $this->request->getVar('productTitle'),
                        'productDescription' => $this->request->getVar('productDescription'),
                        'productBannerImageUrl' =>  $this->insertProductImage("bannerImage", $this->request->getVar('productBannerImageUrl')),
                        'productImageUrl' =>  $this->insertProductImage("productImage", $this->request->getVar('productImageUrl')),
                        'menuProductImageUrl' =>  $this->insertProductImage("menuProductImage", $this->request->getVar('menuProductImageUrl')),
                        'productTypeIDs' => $this->request->getVar('productTypeIDs'),
                        'materialID' => $this->request->getVar('materialID'),
                        'status' => $this->request->getVar('status'),
                        'showOrder' => !empty($this->request->getVar('showOrder')) ? $this->request->getVar('showOrder') :  $this->getNextShowOrder($this->model),
                        'statusOn' => date('Y-m-d H:i:s'),
                        'updatedOn' => date('Y-m-d H:i:s'),
                    ];

                    $this->model->update($productID, $updateData);
                    // echo $this->model->getLastQuery()->getQuery();die();
                    $this->insertGalleryImages($productID);

                    return 'Success';
                } else {
                    $data["validation"] = ['msg' => 'Product details not found!'];
                    return view('manage-product', $data);
                }
            } else {

                $insertData = [
                    'productTitle' => $this->request->getVar('productTitle'),
                    'productDescription' => $this->request->getVar('productDescription'),
                    'productBannerImageUrl' => $this->insertProductImage("bannerImage"),
                    'productImageUrl' => $this->insertProductImage("productImage"),
                    'menuProductImageUrl' => $this->insertProductImage("menuProductImage"),
                    'productTypeIDs' => $this->request->getVar('productTypeIDs'),
                    'materialID' => $this->request->getVar('materialID'),
                    'showOrder' => !empty($this->request->getVar('showOrder')) ? $this->request->getVar('showOrder') :  $this->getNextShowOrder($this->model),
                    'status' => $this->request->getVar('status'),
                    'statusOn' => date('Y-m-d H:i:s'),
                    'createdOn' => date('Y-m-d H:i:s'),
                    'updatedOn' => date('Y-m-d H:i:s'),
                ];

                $this->model->insert($insertData);

                $productID =  $this->model->insertID();
                if ($productID) {

                    $this->model->update($productID, ['canonicalName' => $cann . '-' . $productID]);

                    $this->insertGalleryImages($productID);

                    return 'Success';
                } else {
                    $data["validation"] = ['msg' => 'Something went wrong!'];
                    return view('manage-product', $data);
                }
            }
        } else {

            $data["validation"] = $this->validator->getErrors();
            return view('manage-product', $data);
        }
    }

    public function manageproducttypes($canonicalName)
    {
        $session = session();
        $AdminProductTypesModel = new AdminProductTypes_model();
        $AdminProductTypeDetailsModel = new AdminProductTypeDetails_model();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Edit Product Type Details', 'li_1' => 'Product', 'li_2' => 'Edit Product Type Details'])
        ];

        $data['post'] = $this->model->where('canonicalName', $canonicalName)->first();

        $data['gallaryImages'] = $this->model->getGalleryImage($data['post']['productID']);

        $data['productTypes'] = $AdminProductTypesModel->select('')->get()->getResultArray();
        if (!empty($data['productTypes'])) {

            $productTypeIDs =  explode(',', $data['post']['productTypeIDs']);
            $data['productTypesDetails'] = $AdminProductTypeDetailsModel->select('typeDetailID, productTypeID, typeDetailTitle, typeDetailImageUrl')
                ->where('productID', $data['post']['productID'])
                ->whereIn('productTypeID', $productTypeIDs)->get()->getResult();
            // echo $AdminProductTypeDetailsModel->getLastQuery()->getQuery();die();
            // print_r($data['productTypesDetails']);
            // die;
            // echo ;die;
        }

        if (($this->request->getMethod() === 'post') && !empty($data['post']['productID'])) {
            $combinedData = [];
            // echo '<pre>';
            // print_r($_POST);    die;
            if (isset($_POST['productTypeID']) && isset($_FILES['typeDetailImage']) && !empty($_POST['productTypeID']) && !empty($_FILES['typeDetailImage']) && (count($_POST['productTypeID']) === count($_FILES['typeDetailImage']['name']))) {
                $count = count($_POST['productTypeID']);
                for ($i = 0; $i < $count; $i++) {
                    // echo $_POST['typeDetailImageUrl'][$i];die;
                    $combinedData[] = [
                        'typeDetailID' => $_POST['typeDetailID'][$i] != 0 ? $_POST['typeDetailID'][$i] : '',
                        'productTypeID' => $_POST['productTypeID'][$i],
                        'typeDetailTitle' => $_POST['typeDetailTitle'][$i],
                        'typeDetailImageUrl' => $_POST['typeDetailImageUrl'][$i],
                        'typeDetailImage' => [
                            'name' => $_FILES['typeDetailImage']['name'][$i],
                            'tmp_name' => $_FILES['typeDetailImage']['tmp_name'][$i],
                            'type' => $_FILES['typeDetailImage']['type'][$i],
                            'size' => $_FILES['typeDetailImage']['size'][$i],
                            'error' => $_FILES['typeDetailImage']['error'][$i],
                            'full_path' => $_FILES['typeDetailImage']['full_path'][$i]
                        ]
                    ];
                    // echo "here";die;
                }
                // echo '<pre>';
                // print_r($combinedData);    die;
                if (!empty($combinedData)) {
                    foreach ($combinedData as $combinedData_row) {
                        $canonName = strtolower($combinedData_row['typeDetailTitle']);
                        $canonicalName = str_replace(' ', '-', $canonName); // Replaces all spaces with hyphens.
                        $canonicalName = preg_replace('/[^A-Za-z0-9\-]/', '', $canonicalName); // Removes special chars.
                        $cann = preg_replace('/-+/', '-', $canonicalName);

                        if (!empty($combinedData_row['typeDetailID'])) {

                            $imageUrl = '';
                            if (isset($combinedData_row['typeDetailImage']) && isset($combinedData_row['typeDetailImage']['name']) && !empty($combinedData_row['typeDetailImage']['name'])) {
                                $imageUrl = $this->insertproducttypeimages($combinedData_row['typeDetailImage'], $combinedData_row['productTypeID']);
                            } else {
                                $imageUrl = $combinedData_row['typeDetailImageUrl'];
                            }

                            $updateData = [
                                'productID' => $data['post']['productID'],
                                'canonicalName' => $cann . '-' . $combinedData_row['typeDetailID'],
                                'productTypeID' => $combinedData_row['productTypeID'],
                                'typeDetailTitle' => $combinedData_row['typeDetailTitle'],
                                'typeDetailImageUrl' => $imageUrl
                            ];

                            $AdminProductTypeDetailsModel->update($combinedData_row['typeDetailID'], $updateData);
                        } else {
                            // echo "here";die;
                            $insertData = [
                                'productID' => $data['post']['productID'],
                                'productTypeID' => $combinedData_row['productTypeID'],
                                'typeDetailTitle' => $combinedData_row['typeDetailTitle'],
                                'typeDetailImageUrl' => $this->insertproducttypeimages($combinedData_row['typeDetailImage'], $combinedData_row['productTypeID'])
                            ];
                            $AdminProductTypeDetailsModel->insert($insertData);

                            $typeDetailID =  $AdminProductTypeDetailsModel->insertID();
                            $AdminProductTypeDetailsModel->update($typeDetailID, ['canonicalName' => $cann . '-' . $typeDetailID]);

                        }
                    }
                    $session->setFlashdata('successMessage', 'Successfully updated product type details');
                    return redirect()->to('../admin/products');
                } else {
                    $session->setFlashdata('errorMessage', 'Please try again no inputs found!');
                    return view('add-product-type', $data);
                }
            } else {
                $session->setFlashdata('errorMessage', 'Please inputs all the fields!');
                return view('add-product-type', $data);
            }
        } else {
            // echo "here";die;
            // $session->setFlashdata('errorMessage', 'This Product ID not found!');
            return view('add-product-type', $data);
        }
    }

    private function insertproducttypeimages($typeDetailImage, $productTypeID)
    {
        if (!empty($typeDetailImage)) {
            if ($this->isValidUpload($typeDetailImage)) {
                $targetDirectory = 'uploads/products/producttype_' . $productTypeID . '_' . rand(10, 100000000) . $typeDetailImage['name'];
                $uploadResult = move_uploaded_file($typeDetailImage['tmp_name'], $targetDirectory);
                if (!$uploadResult) {
                    error_log('File upload error: ' . error_get_last()['message']);
                } else {
                    return $targetDirectory;
                }
            }
        }
    }

    private function isValidUpload($file)
    {
        return ($file['error'] === UPLOAD_ERR_OK && is_uploaded_file($file['tmp_name']));
    }

    public function deleteproducttype($productID)
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Add Product', 'li_1' => 'Product', 'li_2' => 'Add Product'])
        ];
        $data['post'] = $this->model->where('productID', $productID)->where('status', 1)->first();
        if (!empty($data['post'])) {

            $this->model->delete($productID);
            $session->setFlashdata('successMessage', 'Successfully deleted Product');

            return redirect()->to('../admin/products');
        } else {
            $session->setFlashdata('errorMessage', 'This Product not found!');
            return view('manage-product', $data);
        }
    }

    private function validateInput($id = null)
    {
        if ($id) {
            $validationArr['productTitle'] = "required|min_length[4]|is_unique[products.productTitle,productID,{$id}]";
            $validationArr['bannerImage'] = "max_size[bannerImage,10096]";
            $validationArr['productImage'] = "max_size[productImage,10096]";
            $validationArr['menuProductImage'] = "max_size[menuProductImage,10096]";
        } else {
            $validationArr['productTitle'] = "required|min_length[4]|is_unique[products.productTitle]";
            $validationArr['bannerImage'] = "uploaded[bannerImage]|max_size[bannerImage,10096]";
            $validationArr['productImage'] = "uploaded[productImage]|max_size[productImage,10096]";
            $validationArr['menuProductImage'] = "uploaded[menuProductImage]|max_size[menuProductImage,10096]";
        }

        $validationArr['productTitle'] = "required|min_length[2]";
        $validationArr['status'] = "required|numeric";
        $validationArr['productDescription'] = "required|min_length[2]";
        $validationArr['productTypeIDs'] = "required";
        $validationArr['materialID'] = "required|numeric";

        return  $this->validate($validationArr);
    }

    private function insertProductImage($InputName, $defaultUrl = '', $folderName = 'products')
    {
        $imageFile = $this->request->getFile($InputName);
        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {

            return $this->insertImage($folderName, $InputName, $this->request->getFile($InputName));
        } else {
            return $defaultUrl;
        }
    }

    private function insertImage($path, $namePrefix, $image)
    {
        $newName = $namePrefix . $image->getRandomName();
        // echo $newName ;die();
        $image->move(FCPATH . 'uploads/' . $path, $newName);
        return "uploads/$path/$newName";
    }

    private function insertGalleryImages($productID)
    {
        $imagefile = $this->request->getFiles();
        if ($imagefile = $this->request->getFiles()) {
            if ((isset($imagefile['galleryImages'])) && (!empty($imagefile['galleryImages']))) {
                foreach ($imagefile['galleryImages'] as $img) {
                    if ($img->isValid() && !$img->hasMoved()) {
                        $uploadedUrl = $this->insertImage(('products/' . $productID), 'galleryImages_', $img);
                        $this->model->insertGalleryImage(["productID" => $productID, "gallaryImageUrl" => $uploadedUrl]);
                    }
                }
            }
        }

        if (!empty($this->request->getVar('removedGalleryImages'))) {
            foreach ($this->request->getVar('removedGalleryImages') as $key => $value) {
                $this->model->removeGalleryImage($value, $productID);
            }
        }
    }
}
