<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminBaseResourceController;

class ProductMaterials extends AdminBaseResourceController
{
    protected $modelName = "App\Models\Admin\AdminProductMaterials_model";

    public function index()
    {
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Product Materials', 'li_1' => 'Unilam', 'li_2' => 'Product Materials'])
        ];
        $data['productMaterialDetails'] = $this->model->findAll();
        // print_r($data['productMaterialDetails']);die;

        return view('product-materials', $data);
    }

    public function createproductmaterial()
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Add Product Materials', 'li_1' => 'Product Materials', 'li_2' => 'Add Product Materials'])
        ];

        if ($this->request->getMethod() === 'post') {
            $response =  $this->manageproductmaterial();
            if ($response === 'Success') {

                $session->setFlashdata('successMessage', 'Successfully added Product Materials');
                return redirect()->to('product-materials');
            } else {
                return view('manage-product-material', $data);
            }
        } else {
            return view('manage-product-material', $data);
        }
    }

    public function editproductmaterial($canonicalName = null)
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Edit Product Materials', 'li_1' => 'Product Materials', 'li_2' => 'Edit Product Materials'])
        ];
        $data['post'] = $this->model->where('canonicalName', $canonicalName)->first();

        if (($this->request->getMethod() === 'post') && !empty($canonicalName)) {
            if (!empty($data['post'])) {

                $response =  $this->manageproductmaterial($data['post']['materialID']);
                if ($response === 'Success') {
                    $session->setFlashdata('successMessage', 'Successfully updated Product Materials');

                    if (!empty($canonicalName)) {

                        return redirect()->to('../admin/product-materials');
                    } else {

                        return redirect()->to('product-materials');
                    }
                } else {
                    return view('manage-product-material', $data);
                }
            } else {
                $session->setFlashdata('errorMessage', 'This Product Materials not found!');
                return view('manage-product-material', $data);
            }
        } else {
            return view('manage-product-material', $data);
        }
    }

    public function manageproductmaterial($materialID = null)
    {
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Product Materials', 'li_1' => 'Unilam', 'li_2' => 'Product Materials'])
        ];
        $data['post'] = $_POST;

        if ($this->validateInput()) {
            $canonName = strtolower($this->request->getVar('materialName'));
            $canonicalName = str_replace(' ', '-', $canonName); // Replaces all spaces with hyphens.
            $canonicalName = preg_replace('/[^A-Za-z0-9\-]/', '', $canonicalName); // Removes special chars.
            $cann = preg_replace('/-+/', '-', $canonicalName);
            if (!empty($materialID)) {
                $updateData = [
                    'canonicalName' => $cann . '-' . $materialID,
                    'materialName' => $this->request->getVar('materialName'),
                    'updatedOn' => date('Y-m-d H:i:s'),
                ];

                $this->model->update($materialID, $updateData);
                return 'Success';
            } else {
                $insertData = [
                    'materialName' => $this->request->getVar('materialName'),
                    'status' => '1',
                    'statusOn' => date('Y-m-d H:i:s'),
                    'createdOn' => date('Y-m-d H:i:s'),
                    'updatedOn' => date('Y-m-d H:i:s'),
                ];

                $this->model->insert($insertData);

                $materialID =  $this->model->insertID();
                if ($materialID) {

                    $this->model->update($materialID, ['canonicalName' => $cann . '-' . $materialID]);

                    return 'Success';
                } else {
                    $data["validation"] = ['msg' => 'Something went wrong!'];
                    return view('manage-product-material', $data);
                }
            }
        } else {
            $data["validation"] = $this->validator->getErrors();
            return view('manage-product-material', $data);
        }
    }

    public function deleteproductmaterial($materialID)
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Add Product Materials', 'li_1' => 'Product Materials', 'li_2' => 'Add Product Materials'])
        ];
        $data['post'] = $this->model->where('materialID', $materialID)->first();
        if (!empty($data['post'])) {

            $this->model->delete($materialID);
            $session->setFlashdata('successMessage', 'Successfully deleted Product Materials');

            return redirect()->to('../admin/product-materials');
        } else {
            $session->setFlashdata('errorMessage', 'This Product Materials not found!');
            return view('manage-product-material', $data);
        }
    }

    private function validateInput($id = null)
    {
        $validationArr['materialName'] = "required|min_length[2]";
        return  $this->validate($validationArr);
    }
}
