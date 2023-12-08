<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminBaseResourceController;

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


    public function editcontact($contactID = null)
    {
        $session = session();
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Edit Contacts', 'li_1' => 'Contacts', 'li_2' => 'Edit Contacts'])
        ];
        $data['post'] = $this->model->where('contactID', $contactID)->first();
        if (($this->request->getMethod() === 'post') && !empty($contactID)) {
            if (!empty($data['post'])) {

                $response =  $this->managecontact($contactID);
                if ($response === 'Success') {
                    $session->setFlashdata('successMessage', 'Successfully updated contact');

                    if (!empty($contactID)) {

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

                $updateData = [
                    'bannerTitle' => $this->request->getVar('bannerTitle'),
                    'bannerImageUrl' => $this->handleUploadImage("bannerImage", 'bannerImage', '', $this->request->getVar('bannerImageUrl')),
                    'contactTitle' => $this->request->getVar('contactTitle'),
                    'contactDescription' => $this->request->getVar('contactDescription'),
                    'address' => $this->request->getVar('address'),
                    'phone' => $this->request->getVar('phone'),
                    'zipcode' => $this->request->getVar('zipcode'),
                    'email' => $this->request->getVar('email'),
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
