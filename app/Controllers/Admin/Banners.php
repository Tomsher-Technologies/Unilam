<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminBaseResourceController;

class Banners extends AdminBaseResourceController
{
    protected $modelName = "App\Models\Admin\AdminBanner_model";

    public function index()
    {
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Banners', 'li_1' => 'Unilam', 'li_2' => 'Banners'])
        ];
        $data['bannerDetails'] = $this->model->findAll();
        // print_r($data['bannerDetails']);die;

        return view('banners-lists', $data);
    }

    public function createbanner()
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Add Banners', 'li_1' => 'Banners', 'li_2' => 'Add Banners'])
        ];

        if ($this->request->getMethod() === 'post') {
            $response =  $this->managebanner();
            if ($response === 'Success') {

                $session->setFlashdata('successMessage', 'Successfully added Banners');
                return redirect()->to('banners-lists');
            } else {
                return view('manage-banner', $data);
            }
        } else {
            return view('manage-banner', $data);
        }
    }

    public function editbanner($bannerID = null)
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Edit Banners', 'li_1' => 'Banners', 'li_2' => 'Edit Banners'])
        ];
        $data['post'] = $this->model->where('bannerID', $bannerID)->where('status', 1)->first();

        if (($this->request->getMethod() === 'post') && !empty($bannerID)) {
            if (!empty($data['post'])) {

                $response =  $this->managebanner($bannerID);
                if ($response === 'Success') {
                    $session->setFlashdata('successMessage', 'Successfully updated Banners');

                    if (!empty($bannerID)) {

                        return redirect()->to('../admin/banners-lists');
                    } else {

                        return redirect()->to('banners-lists');
                    }
                } else {
                    return view('manage-banner', $data);
                }
            } else {
                $session->setFlashdata('errorMessage', 'This Banners not found!');
                return view('manage-banner', $data);
            }
        } else {
            return view('manage-banner', $data);
        }
    }

    public function managebanner($bannerID = null)
    {
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Banners', 'li_1' => 'Unilam', 'li_2' => 'Banners'])
        ];
        $data['post'] = $_POST;

        if ($this->validateInput($bannerID)) {
            if (!empty($bannerID)) {

                $updateData = [
                    'bannerHeading' => $this->request->getVar('bannerHeading'),
                    'bannerTitle' => $this->request->getVar('bannerTitle'),
                    'bannerDescription' => $this->request->getVar('bannerDescription'),
                    'bannerUrl' => $this->request->getVar('bannerUrl'),
                    'bannerFileUrl' => $this->handleUploadImage("bannerFile", 'bannerFile', '', $this->request->getVar('bannerFileUrl')),
                    'updatedOn' => date('Y-m-d H:i:s'),
                ];

                $this->model->update($bannerID, $updateData);
                return 'Success';
            } else {
                $insertData = [
                    'bannerHeading' => $this->request->getVar('bannerHeading'),
                    'bannerTitle' => $this->request->getVar('bannerTitle'),
                    'bannerDescription' => $this->request->getVar('bannerDescription'),
                    'bannerUrl' => $this->request->getVar('bannerUrl'),
                    'bannerFileUrl' => $this->handleUploadImage("bannerFile", 'bannerFile', '', 'defaultUrl'),
                    'status' => '1',
                    'statusOn' => date('Y-m-d H:i:s'),
                    'createdOn' => date('Y-m-d H:i:s'),
                    'updatedOn' => date('Y-m-d H:i:s'),
                ];
                $this->model->insert($insertData);
                // echo $this->model->getLastQuery()->getQuery();die();

                $bannerID =  $this->model->insertID();
                if ($bannerID) {

                    return 'Success';
                } else {
                    $data["validation"] = ['msg' => 'Something went wrong!'];
                    return view('manage-banner', $data);
                }
            }
        } else {
            $data["validation"] = $this->validator->getErrors();
            return view('manage-banner', $data);
        }
    }

    public function deletebanner($bannerID)
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Add Banners', 'li_1' => 'Banners', 'li_2' => 'Add Banners'])
        ];
        $data['post'] = $this->model->where('bannerID', $bannerID)->where('status', 1)->first();
        if (!empty($data['post'])) {

            $this->model->delete($bannerID);
            $session->setFlashdata('successMessage', 'Successfully deleted Banners');

            return redirect()->to('../admin/banners-lists');
        } else {
            $session->setFlashdata('errorMessage', 'This Banners not found!');
            return view('manage-banner', $data);
        }
    }

    private function validateInput($id = null)
    {
        if ($id) {
            if (!empty($this->request->getFile('bannerFileUrl'))) {
                $validationArr['bannerFile'] = "max_size[bannerFile,10096]";
            }
        } else {
            $validationArr['bannerFile'] = "uploaded[bannerFile]|max_size[bannerFile,10096]";
        }

        $validationArr['bannerHeading'] = "required|min_length[3]";
        $validationArr['bannerTitle'] = "required|min_length[3]";
        return  $this->validate($validationArr);
    }
}
