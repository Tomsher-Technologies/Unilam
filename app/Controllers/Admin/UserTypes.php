<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminBaseResourceController;



class UserTypes extends AdminBaseResourceController
{
    protected $modelName = "App\Models\Admin\AdminUserTypes_model";

    public function index()
    {
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'User Type', 'li_1' => 'Unilam', 'li_2' => 'User Type'])
        ];
        $data['userTypeDetails'] = $this->model->findAll();
        // print_r($data['userTypeDetails']);die;

        return view('user-types', $data);
    }

    public function createusertype()
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Add User Type', 'li_1' => 'User Type', 'li_2' => 'Add User Type'])
        ];

        if ($this->request->getMethod() === 'post') {
            $response =  $this->manageusertype();
            if ($response === 'Success') {

                $session->setFlashdata('successMessage', 'Successfully added user type');
                return redirect()->to('user-types');
            } else {
                return view('manage-user-type', $data);
            }
        } else {
            return view('manage-user-type', $data);
        }
    }

    public function editusertype($userTypeID = null)
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Edit User Type', 'li_1' => 'User Type', 'li_2' => 'Edit User Type'])
        ];
        $data['post'] = $this->model->where('userTypeID', $userTypeID)->where('status', 1)->first();

        if (($this->request->getMethod() === 'post') && !empty($userTypeID)) {
            if (!empty($data['post'])) {
                if ($data['post']['userType'] !== "Admin") {

                    $response =  $this->manageusertype($userTypeID);
                    if ($response === 'Success') {
                        $session->setFlashdata('successMessage', 'Successfully updated user type');

                        if (!empty($userTypeID)) {

                            return redirect()->to('../admin/user-types');
                        } else {

                            return redirect()->to('user-types');
                        }
                    } else {
                        return view('manage-user-type', $data);
                    }
                } else {
                    $session->setFlashdata('errorMessage', 'You do not have the necessary permissions to delete the Admin user type!');
                    return redirect()->to('../admin/user-types');
                }
            } else {
                $session->setFlashdata('errorMessage', 'This user type not found!');
                return view('manage-user-type', $data);
            }
        } else {
            return view('manage-user-type', $data);
        }
    }

    public function manageusertype($userTypeID = null)
    {
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'User Type', 'li_1' => 'Unilam', 'li_2' => 'User Type'])
        ];
        $data['post'] = $_POST;

        if ($this->validateInput()) {
            if (!empty($userTypeID)) {

                $updateData = [
                    'userType' => $this->request->getVar('userType'),
                    'updatedOn' => date('Y-m-d H:i:s'),
                ];

                $this->model->update($userTypeID, $updateData);
                return 'Success';
            } else {
                $insertData = [
                    'userType' => $this->request->getVar('userType'),
                    'status' => '1',
                    'statusOn' => date('Y-m-d H:i:s'),
                    'createdOn' => date('Y-m-d H:i:s'),
                    'updatedOn' => date('Y-m-d H:i:s'),
                ];

                $this->model->insert($insertData);

                $userTypeID =  $this->model->insertID();
                if ($userTypeID) {

                    return 'Success';
                } else {
                    $data["validation"] = ['msg' => 'Something went wrong!'];
                    return view('manage-user-type', $data);
                }
            }
        } else {
            $data["validation"] = $this->validator->getErrors();
            return view('manage-user-type', $data);
        }
    }

    public function deleteusertype($userTypeID)
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Add User Type', 'li_1' => 'User Type', 'li_2' => 'Add User Type'])
        ];
        $data['post'] = $this->model->where('userTypeID', $userTypeID)->where('status', 1)->first();
        if (!empty($data['post'])) {
            if ($data['post']['userType'] !== "Admin") {

                $this->model->delete($userTypeID);
                $session->setFlashdata('successMessage', 'Successfully deleted user type');

                return redirect()->to('../admin/user-types');
            } else {
                $session->setFlashdata('errorMessage', 'You do not have the necessary permissions to delete the Admin user type!');
                return redirect()->to('../admin/user-types');
            }
        } else {
            $session->setFlashdata('errorMessage', 'This user type not found!');
            return view('manage-user-type', $data);
        }
        echo "here";
        die;
    }

    private function validateInput($id = null)
    {
        $validationArr['userType'] = "required|min_length[2]";
        return  $this->validate($validationArr);
    }
}
