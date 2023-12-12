<?php

namespace App\Controllers\Admin\Security;

use App\Controllers\Admin\AdminBaseResourceController;

use App\Models\Admin\AdminUser_model;


class Guest extends AdminBaseResourceController
{

    protected $modelName = "App\Models\Admin\AdminUser_model";

    public function show_auth_login()
    {
        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Validation']),
            'page_title' => view('partials/page-title', ['title' => 'Validation', 'li_1' => 'Forms', 'li_2' => 'Validation'])
        ];

        if ($this->request->getMethod() === 'post') {

            $response =  $this->login();
            if ($response === 'Suuccess') {
                return redirect()->to('dashboard');
            } else {
                return view('auth-login', $data);
            }
        } else {
            return view('auth-login', $data);
        }
    }

    public function login()
    {
        $session = session();
        $data['post'] = $_POST;
        if ($this->validateInput()) {
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            
            $data = $this->model->where('email', $email)->where('password', \md5($password))->where('status', 1)->first();
       
            if ($data) {

                $this->model->where('email', $email)->first();

                $ses_data = [
                    'userID' => $data['userID'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);

                $this->model->update($data['userID'], ['lastLoggedOn' => date('Y-m-d H:i:s')]);

                return 'Suuccess';
            } else {
                // $session->setFlashdata('msg', 'Incorrect email or password!');

                $data["validation"] = ['msg' => 'Incorrect email or password!'];
                return   view('auth-login', $data);
            }
        } else {

            $data["validation"] = $this->validator->getErrors();
            return   view('auth-login', $data);
        }
    }

    private function validateInput($id = null)
    {

        $validationArr['email'] = "required|min_length[4]";
        $validationArr['password'] = "required|min_length[4]";
        return  $this->validate($validationArr);
    }
}
