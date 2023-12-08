<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminBaseResourceController;

class ProductTypes extends AdminBaseResourceController
{
    protected $modelName = "App\Models\Admin\AdminProductTypes_model";

    public function index()
    {
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Product Type', 'li_1' => 'Unilam', 'li_2' => 'Product Type'])
        ];
        $data['productTypeDetails'] = $this->model->findAll();
        // print_r($data['productTypeDetails']);die;

        return view('product-types', $data);
    }

    public function createproducttype()
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Add Product Type', 'li_1' => 'Product Type', 'li_2' => 'Add Product Type'])
        ];

        if ($this->request->getMethod() === 'post') {
            $response =  $this->manageproducttype();
            if ($response === 'Success') {

                $session->setFlashdata('successMessage', 'Successfully added Product type');
                return redirect()->to('product-types');
            } else {
                return view('manage-product-type', $data);
            }
        } else {
            return view('manage-product-type', $data);
        }
    }

    public function editproducttype($productTypeID = null)
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Edit Product Type', 'li_1' => 'Product Type', 'li_2' => 'Edit Product Type'])
        ];
        $data['post'] = $this->model->where('productTypeID', $productTypeID)->where('status', 1)->first();

        if (($this->request->getMethod() === 'post') && !empty($productTypeID)) {
            if (!empty($data['post'])) {

                $response =  $this->manageproducttype($productTypeID);
                if ($response === 'Success') {
                    $session->setFlashdata('successMessage', 'Successfully updated Product type');

                    if (!empty($productTypeID)) {

                        return redirect()->to('../admin/product-types');
                    } else {

                        return redirect()->to('product-types');
                    }
                } else {
                    return view('manage-product-type', $data);
                }
            } else {
                $session->setFlashdata('errorMessage', 'This Product type not found!');
                return view('manage-product-type', $data);
            }
        } else {
            return view('manage-product-type', $data);
        }
    }

    public function manageproducttype($productTypeID = null)
    {
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Product Type', 'li_1' => 'Unilam', 'li_2' => 'Product Type'])
        ];
        $data['post'] = $_POST;

        if ($this->validateInput()) {
            if (!empty($productTypeID)) {

                $updateData = [
                    'typeTitle' => $this->request->getVar('typeTitle'),
                    'updatedOn' => date('Y-m-d H:i:s'),
                ];

                $this->model->update($productTypeID, $updateData);
                return 'Success';
            } else {
                $insertData = [
                    'typeTitle' => $this->request->getVar('typeTitle'),
                    'status' => '1',
                    'statusOn' => date('Y-m-d H:i:s'),
                    'createdOn' => date('Y-m-d H:i:s'),
                    'updatedOn' => date('Y-m-d H:i:s'),
                ];

                $this->model->insert($insertData);

                $productTypeID =  $this->model->insertID();
                if ($productTypeID) {

                    return 'Success';
                } else {
                    $data["validation"] = ['msg' => 'Something went wrong!'];
                    return view('manage-product-type', $data);
                }
            }
        } else {
            $data["validation"] = $this->validator->getErrors();
            return view('manage-product-type', $data);
        }
    }

    public function deleteproducttype($productTypeID)
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Add Product Type', 'li_1' => 'Product Type', 'li_2' => 'Add Product Type'])
        ];
        $data['post'] = $this->model->where('productTypeID', $productTypeID)->where('status', 1)->first();
        if (!empty($data['post'])) {

            $this->model->delete($productTypeID);
            $session->setFlashdata('successMessage', 'Successfully deleted Product type');

            return redirect()->to('../admin/product-types');
        } else {
            $session->setFlashdata('errorMessage', 'This Product type not found!');
            return view('manage-product-type', $data);
        }
    }

    private function validateInput($id = null)
    {
        $validationArr['typeTitle'] = "required|min_length[2]";
        return  $this->validate($validationArr);
    }
}
