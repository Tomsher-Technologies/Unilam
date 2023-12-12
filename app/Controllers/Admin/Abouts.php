<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminBaseResourceController;



class Abouts extends AdminBaseResourceController
{
    protected $modelName = "App\Models\Admin\AdminAbout_model";

    public function index()
    {
        // echo "works";die();
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Abouts', 'li_1' => 'Unilam', 'li_2' => 'Abouts'])
        ];
        $data['aboutDetails'] = $this->model->findAll();
        // print_r($data['aboutDetails']);die;

        return view('abouts', $data);
    }


    public function editabout($canonicalName = null)
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Edit Abouts', 'li_1' => 'Abouts', 'li_2' => 'Edit Abouts'])
        ];
        $data['post'] = $this->model->where('canonicalName', $canonicalName)->first();
        // print_r($data['post']);die;
        if (($this->request->getMethod() === 'post') && !empty($canonicalName)) {
            if (!empty($data['post'])) {

                $response =  $this->manageabout($data['post']['aboutID']);
                if ($response === 'Success') {
                    $session->setFlashdata('successMessage', 'Successfully updated about');

                    if (!empty($canonicalName)) {

                        return redirect()->to('../admin/abouts');
                    } else {

                        return redirect()->to('abouts');
                    }
                } else {
                    return view('manage-about', $data);
                }
            } else {
                $session->setFlashdata('errorMessage', 'This about not found!');
                return view('manage-about', $data);
            }
        } else {
            return view('manage-about', $data);
        }
    }

    public function manageabout($aboutID = null)
    {
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Abouts', 'li_1' => 'Unilam', 'li_2' => 'Abouts'])
        ];
        $data['post'] = $_POST;

        if ($this->validateInput($aboutID)) {
            if (!empty($aboutID)) {
                $canonName = strtolower($this->request->getVar('aboutTitle'));
                $canonicalName = str_replace(' ', '-', $canonName); // Replaces all spaces with hyphens.
                $canonicalName = preg_replace('/[^A-Za-z0-9\-]/', '', $canonicalName); // Removes special chars.
                $cann = preg_replace('/-+/', '-', $canonicalName);

                $updateData = [
                    'canonicalName' => $cann . '-' . $aboutID,
                    'bannerTitle' => $this->request->getVar('bannerTitle'),
                    'bannerImageUrl' => $this->handleUploadImage("bannerImage", 'bannerImage', '', $this->request->getVar('bannerImageUrl')),
                    'aboutAuthorName' => $this->request->getVar('aboutAuthorName'),
                    'aboutTitle' => $this->request->getVar('aboutTitle'),
                    // 'aboutType' => $this->request->getVar('aboutType'),
                    'aboutDescription' => $this->request->getVar('aboutDescription'),
                    'aboutImageUrl' => $this->handleUploadImage("aboutImage", 'aboutImage', '', $this->request->getVar('aboutImageUrl')),
                    'aboutTitle2' => $this->request->getVar('aboutTitle2'),
                    'aboutDescription2' => $this->request->getVar('aboutDescription2'),
                    'aboutImageUrl2' => $this->handleUploadImage("aboutImage2", 'aboutImage2', '', $this->request->getVar('aboutImageUrl2')),
                    'currentClients' => $this->request->getVar('currentClients'),
                    'yearsOfExperience' => $this->request->getVar('yearsOfExperience'),
                    'awardWinning' => $this->request->getVar('awardWinning'),
                    'officeWorldWide' => $this->request->getVar('officeWorldWide'),
                    'updatedOn' => date('Y-m-d H:i:s'),
                ];
                $this->model->update($aboutID, $updateData);

                return 'Success';
            } else {
                $data["validation"] = ['msg' => 'Something went wrong. About ID is missing!'];
                return view('manage-about', $data);
            }
        } else {
            // echo "here";die;
            $data["validation"] = $this->validator->getErrors();
            // print_r($data["validation"]);die;
            return view('manage-about', $data);
        }
    }

    private function validateInput($id = null)
    {
        if ($id) {
            if (!empty($this->request->getFile('bannerImageUrl'))) {
                $validationArr['bannerImage'] = "max_size[bannerImage,10096]";
            }
            if (!empty($this->request->getFile('aboutImageUrl'))) {
                $validationArr['aboutImage'] = "max_size[aboutImage,10096]";
            }
            if (!empty($this->request->getFile('aboutImageUrl2'))) {
                $validationArr['aboutImage2'] = "max_size[aboutImage2,10096]";
            }
        } else {
            $validationArr['bannerImage'] = "uploaded[bannerImage]|max_size[bannerImage,10096]";
            $validationArr['aboutImage'] = "uploaded[aboutImage]|max_size[aboutImage,10096]";
            $validationArr['aboutImage2'] = "uploaded[aboutImage2]|max_size[aboutImage2,10096]";
        }
        if ($this->request->getVar('aboutType') != 'aboutpage') {
            $validationArr['aboutTitle'] = "required|min_length[4]";
            $validationArr['aboutDescription'] = "required|min_length[10]";
            $validationArr['aboutAuthorName'] = "required|min_length[4]";
        } else {
            $validationArr['bannerTitle'] = "required|min_length[4]";
            $validationArr['aboutAuthorName'] = "required|min_length[4]";
            $validationArr['aboutTitle'] = "required|min_length[4]";
            $validationArr['aboutDescription'] = "required|min_length[10]";
            $validationArr['aboutTitle2'] = "required|min_length[5]";
            $validationArr['aboutDescription2'] = "required|min_length[10]";
            $validationArr['currentClients'] = "required|numeric";
            $validationArr['yearsOfExperience'] = "required|numeric";
            $validationArr['awardWinning'] = "required|numeric";
            $validationArr['officeWorldWide'] = "required|numeric";
        }


        return  $this->validate($validationArr);
    }
}
