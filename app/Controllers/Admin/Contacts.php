<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminBaseResourceController;
use App\Models\User\UserContactDetails_model;

class Contacts extends AdminBaseResourceController
{
    protected $modelName = "App\Models\Admin\AdminContact_model";

    public function index()
    {
        // echo "works";die();
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Contacts', 'li_1' => 'Unilam', 'li_2' => 'Contacts'])
        ];
        $data['contactDetails'] = $this->model->findAll();
        // print_r($data['contactDetails']);die;

        return view('contacts', $data);
    }


    public function editcontact($canonicalName = null)
    {
        $session = session();
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Edit Contacts', 'li_1' => 'Contacts', 'li_2' => 'Edit Contacts'])
        ];
        $data['post'] = $this->model->where('canonicalName', $canonicalName)->first();
        if (($this->request->getMethod() === 'post') && !empty($canonicalName)) {
            if (!empty($data['post'])) {

                $response =  $this->managecontact($data['post']['contactID']);
                if ($response === 'Success') {
                    $session->setFlashdata('successMessage', 'Successfully updated contact');

                    if (!empty($canonicalName)) {

                        return redirect()->to('../admin/contacts');
                    } else {

                        return redirect()->to('contacts');
                    }
                } else {
                    return view('manage-contact', $data);
                }
            } else {
                $session->setFlashdata('errorMessage', 'This contact not found!');
                return view('manage-contact', $data);
            }
        } else {
            return view('manage-contact', $data);
        }
    }

    public function managecontact($contactID = null)
    {
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Contacts', 'li_1' => 'Unilam', 'li_2' => 'Contacts'])
        ];
        $data['post'] = $_POST;

        if ($this->validateInput($contactID)) {
            if (!empty($contactID)) {
                $canonName = strtolower($this->request->getVar('contactTitle'));
                $canonicalName = str_replace(' ', '-', $canonName); // Replaces all spaces with hyphens.
                $canonicalName = preg_replace('/[^A-Za-z0-9\-]/', '', $canonicalName); // Removes special chars.
                $cann = preg_replace('/-+/', '-', $canonicalName);

                $updateData = [
                    'canonicalName' => $cann . '-' . $contactID,
                    'bannerTitle' => $this->request->getVar('bannerTitle'),
                    'bannerImageUrl' => $this->handleUploadImage("bannerImage", 'bannerImage', '', $this->request->getVar('bannerImageUrl')),
                    'contactTitle' => $this->request->getVar('contactTitle'),
                    'contactDescription' => $this->request->getVar('contactDescription'),
                    'address' => $this->request->getVar('address'),
                    'phone' => $this->request->getVar('phone'),
                    'zipcode' => $this->request->getVar('zipcode'),
                    'email' => $this->request->getVar('email'),
                    'email2' => $this->request->getVar('email2'),
                    'twitterLink' => $this->request->getVar('twitterLink'),
                    'faceBookLink' => $this->request->getVar('faceBookLink'),
                    'instagramLink' => $this->request->getVar('instagramLink'),
                    'youTubeLink' => $this->request->getVar('youTubeLink'),
                    'whatsAppLink' => $this->request->getVar('whatsAppLink'),
                    'updatedOn' => date('Y-m-d H:i:s'),
                ];
                $this->model->update($contactID, $updateData);

                return 'Success';
            } else {
                $data["validation"] = ['msg' => 'Something went wrong. Contact ID is missing!'];
                return view('manage-contact', $data);
            }
        } else {
            $data["validation"] = $this->validator->getErrors();
            // print_r($data["validation"]);die;
            return view('manage-contact', $data);
        }
    }

    public function contactslists()
    {
        $UserContactDetailsModel = new UserContactDetails_model();
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Contacts List', 'li_1' => 'Unilam', 'li_2' => 'Contacts List'])
        ];
        $data['contactListDetails'] = $UserContactDetailsModel->findAll();
        // print_r($data['contactDetails']);die;

        return view('contacts-lists', $data);
    }

    private function validateInput($id = null)
    {
        if ($id) {
            if (!empty($this->request->getFile('bannerImageUrl'))) {
                $validationArr['bannerImage'] = "max_size[bannerImage,10096]";
            }
        } else {
            $validationArr['bannerImage'] = "uploaded[bannerImage]|max_size[bannerImage,10096]";
        }

        $validationArr['bannerTitle'] = "required|min_length[4]";
        $validationArr['contactTitle'] = "required|min_length[4]";
        $validationArr['contactDescription'] = "required|min_length[10]";
        $validationArr['address'] = "required|min_length[5]";
        $validationArr['phone'] = "required|numeric|min_length[8]";
        $validationArr['zipcode'] = "required|min_length[6]|max_length[8]";
        $validationArr['email'] = "required|max_length[254]|valid_email";

        return  $this->validate($validationArr);
    }
}
