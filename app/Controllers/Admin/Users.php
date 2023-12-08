<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminBaseResourceController;

use App\Models\Admin\AdminUserTypes_model;

class Users extends AdminBaseResourceController
{
    protected $modelName = "App\Models\Admin\AdminUser_model";

    public function index()
    {
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Users', 'li_1' => 'Unilam', 'li_2' => 'User'])
        ];
        $data['userDetails'] = $this->model->getUsers();
        // echo $this->model->getLastQuery()->getQuery();die();
        // print_r($data['userDetails']);die;

        return view('users-list', $data);
    }

    public function createuser()
    {
        $session = session();
        $AdminUserTypesModel = new AdminUserTypes_model();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Add User', 'li_1' => 'User', 'li_2' => 'Add User'])
        ];
        $data['userTypes'] = $AdminUserTypesModel->select('')->get()->getResultArray();

        // print_r($data['userTypes']);die;

        if ($this->request->getMethod() === 'post') {
            $response =  $this->manageuser();
            if ($response === 'Success') {

                $session->setFlashdata('successMessage', 'Successfully added user');
                return redirect()->to('users');
            } else {
                return view('manage-user', $data);
            }
        } else {
            return view('manage-user', $data);
        }
    }

    public function edituser($userID = null)
    {
        $session = session();
        $AdminUserTypesModel = new AdminUserTypes_model();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Edit User', 'li_1' => 'User', 'li_2' => 'Edit User'])
        ];
        $data['post'] = $this->model->where('userID', $userID)->first();
        $data['userTypes'] = $AdminUserTypesModel->select('')->get()->getResultArray();

        if (($this->request->getMethod() === 'post') && !empty($userID)) {
            if (!empty($data['post'])) {

                $response =  $this->manageuser($userID);
                if ($response === 'Success') {
                    $session->setFlashdata('successMessage', 'Successfully updated user');

                    if (!empty($userID)) {

                        return redirect()->to('../admin/users');
                    } else {

                        return redirect()->to('users');
                    }
                } else {
                    return view('manage-user', $data);
                }
            } else {
                $session->setFlashdata('errorMessage', 'This user not found!');
                return view('manage-user', $data);
            }
        } else {
            return view('manage-user', $data);
        }
    }

    public function manageuser($userID = null)
    {
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'User', 'li_1' => 'Unilam', 'li_2' => 'User'])
        ];
        $data['post'] = $_POST;

        if ($this->validateInput($userID)) {
            if (!empty($userID)) {

                $updateData = [
                    'name' => $this->request->getVar('name'),
                    'phone' => $this->request->getVar('phone'),
                    'email' => $this->request->getVar('email'),
                    'userTypeID' => $this->request->getVar('userTypeID'),
                    'password' => \md5($this->request->getVar('password')),
                    'updatedOn' => date('Y-m-d H:i:s'),
                ];
                $this->model->update($userID, $updateData);
                return 'Success';
            } else {
                $insertData = [
                    'name' => $this->request->getVar('name'),
                    'phone' => $this->request->getVar('phone'),
                    'email' => $this->request->getVar('email'),
                    'userTypeID' => $this->request->getVar('userTypeID'),
                    'password' => \md5($this->request->getVar('password')),
                    'status' => '1',
                    'statusOn' => date('Y-m-d H:i:s'),
                    'createdOn' => date('Y-m-d H:i:s'),
                    'updatedOn' => date('Y-m-d H:i:s'),
                ];

                $this->model->insert($insertData);

                $userID =  $this->model->insertID();
                if ($userID) {
                    return 'Success';
                } else {
                    $data["validation"] = ['msg' => 'Something went wrong!'];
                    return view('manage-user-type', $data);
                }
            }
        } else {
            $data["validation"] = $this->validator->getErrors();
            return view('manage-user', $data);
        }
    }

    public function deleteuser($userID)
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Add User', 'li_1' => 'User', 'li_2' => 'Add User'])
        ];
        $data['post'] = $this->model->where('userID', $userID)->first();
        if (!empty($data['post'])) {

            $this->model->delete($userID);
            $session->setFlashdata('successMessage', 'Successfully deleted user');

            return redirect()->to('../admin/users');
        } else {
            $session->setFlashdata('errorMessage', 'This user not found!');
            return view('manage-user', $data);
        }
    }

    private function validateInput($id = null)
    {
        if ($id) {
            $validationArr['email'] = "required|min_length[4]|is_unique[users.email,userID,{$id}]";
            $validationArr['phone'] = "required|min_length[4]|max_length[10]|is_unique[users.phone,userID,{$id}]";
        } else {
            $validationArr['email'] = "required|min_length[4]|is_unique[users.email]";
            $validationArr['phone'] = "required|min_length[9]|max_length[10]|is_unique[users.phone]";
        }
        $validationArr['userTypeID'] = "numeric|required|min_length[1]";
        $validationArr['name'] = "required|min_length[2]";
        $validationArr['password'] = "required|min_length[5]";

        return  $this->validate($validationArr);
    }
}
