<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminBaseResourceController;

class WorkCategories extends AdminBaseResourceController
{
    protected $modelName = "App\Models\Admin\AdminWorkCategory_model";

    public function index()
    {
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Work Categories', 'li_1' => 'Unilam', 'li_2' => 'Work Category'])
        ];
        $data['workcategoryDetails'] = $this->model->findAll();
        // print_r($data['workcategoryDetails']);die;

        return view('work-categories', $data);
    }

    public function createworkcategory()
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Add Work Category', 'li_1' => 'Work Category', 'li_2' => 'Add Work Category'])
        ];

        if ($this->request->getMethod() === 'post') {
            $response =  $this->manageworkcategory();
            if ($response === 'Success') {

                $session->setFlashdata('successMessage', 'Successfully added Work Category');
                return redirect()->to('work-categories');
            } else {
                return view('manage-work-category', $data);
            }
        } else {
            return view('manage-work-category', $data);
        }
    }

    public function editworkcategory($canonicalName = null)
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Edit Work Category', 'li_1' => 'Work Category', 'li_2' => 'Edit Work Category'])
        ];
        $data['post'] = $this->model->where('canonicalName', $canonicalName)->first();

        if (($this->request->getMethod() === 'post') && !empty($data['post']['categoryID'])) {
            if (!empty($data['post'])) {

                $response =  $this->manageworkcategory($data['post']['categoryID']);
                if ($response === 'Success') {
                    $session->setFlashdata('successMessage', 'Successfully updated Work Category');

                    if (!empty($data['post']['categoryID'])) {

                        return redirect()->to('../admin/work-categories');
                    } else {

                        return redirect()->to('work-categories');
                    }
                } else {
                    return view('manage-work-category', $data);
                }
            } else {
                $session->setFlashdata('errorMessage', 'This Work Category not found!');
                return view('manage-work-category', $data);
            }
        } else {
            return view('manage-work-category', $data);
        }
    }

    public function manageworkcategory($categoryID = null)
    {
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Work Category', 'li_1' => 'Unilam', 'li_2' => 'Work Category'])
        ];
        $data['post'] = $_POST;

        if ($this->validateInput()) {
            $canonName = strtolower($this->request->getVar('categoryName'));
            $canonicalName = str_replace(' ', '-', $canonName); // Replaces all spaces with hyphens.
            $canonicalName = preg_replace('/[^A-Za-z0-9\-]/', '', $canonicalName); // Removes special chars.
            $cann = preg_replace('/-+/', '-', $canonicalName);

            if (!empty($categoryID)) {
                $updateData = [
                    'canonicalName' => $cann . '-' . $categoryID,
                    'categoryName' => $this->request->getVar('categoryName'),
                    'updatedOn' => date('Y-m-d H:i:s'),
                ];

                $this->model->update($categoryID, $updateData);
                return 'Success';
            } else {
                $insertData = [
                    'categoryName' => $this->request->getVar('categoryName'),
                    'status' => '1',
                    'statusOn' => date('Y-m-d H:i:s'),
                    'createdOn' => date('Y-m-d H:i:s'),
                    'updatedOn' => date('Y-m-d H:i:s'),
                ];

                $this->model->insert($insertData);

                $categoryID =  $this->model->insertID();
                if ($categoryID) {

                    $this->model->update($categoryID, ['canonicalName' => $cann . '-' . $categoryID]);

                    return 'Success';
                } else {
                    $data["validation"] = ['msg' => 'Something went wrong!'];
                    return view('manage-work-category', $data);
                }
            }
        } else {
            $data["validation"] = $this->validator->getErrors();
            return view('manage-work-category', $data);
        }
    }

    public function deleteworkcategory($categoryID)
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Add Work Category', 'li_1' => 'Work Category', 'li_2' => 'Add Work Category'])
        ];
        $data['post'] = $this->model->where('categoryID', $categoryID)->first();
        if (!empty($data['post'])) {

            $this->model->delete($categoryID);
            $session->setFlashdata('successMessage', 'Successfully deleted Work Category');

            return redirect()->to('../admin/work-categories');
        } else {
            $session->setFlashdata('errorMessage', 'This Work Category not found!');
            return view('manage-work-category', $data);
        }
    }

    private function validateInput($id = null)
    {
        $validationArr['categoryName'] = "required|min_length[2]";
        return  $this->validate($validationArr);
    }
}
