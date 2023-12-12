<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminBaseResourceController;



class Contents extends AdminBaseResourceController
{
    protected $modelName = "App\Models\Admin\AdminContent_model";

    public function index()
    {
        // echo "works";die();
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Contents', 'li_1' => 'Unilam', 'li_2' => 'Contents'])
        ];
        $data['contentsDetails'] = $this->model->findAll();
        // print_r($data['contentsDetails']);die;

        return view('contents-lists', $data);
    }


    public function editcontents($canonicalName = null)
    {
        $session = session();
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Edit Contents', 'li_1' => 'Contents', 'li_2' => 'Edit Contents'])
        ];
        $data['post'] = $this->model->where('canonicalName', $canonicalName)->first();
        // print_r($data['post']);die;
        if (($this->request->getMethod() === 'post') && !empty($canonicalName)) {
            if (!empty($data['post'])) {

                $response =  $this->manageabout($data['post']['contentID']);
                if ($response === 'Success') {
                    $session->setFlashdata('successMessage', 'Successfully updated about');

                    if (!empty($canonicalName)) {

                        return redirect()->to('../admin/contents-lists');
                    } else {

                        return redirect()->to('contents-lists');
                    }
                } else {
                    return view('manage-contents', $data);
                }
            } else {
                $session->setFlashdata('errorMessage', 'This about not found!');
                return view('manage-contents', $data);
            }
        } else {
            return view('manage-contents', $data);
        }
    }

    public function manageabout($contentID = null)
    {
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Contents', 'li_1' => 'Unilam', 'li_2' => 'Contents'])
        ];
        $data['post'] = $_POST;

        if ($this->validateInput($contentID)) {
            if (!empty($contentID)) {
                $canonName = strtolower($this->request->getVar('contentType'));
                $canonicalName = str_replace(' ', '-', $canonName); // Replaces all spaces with hyphens.
                $canonicalName = preg_replace('/[^A-Za-z0-9\-]/', '', $canonicalName); // Removes special chars.
                $cann = preg_replace('/-+/', '-', $canonicalName);

                $updateData = [
                    'canonicalName' => $cann . '-' . $contentID,
                    'contentTitle1' => $this->request->getVar('contentTitle1'),
                    'contentSubTitle1' => $this->request->getVar('contentSubTitle1'),
                    'contentTitleMode1' => $this->request->getVar('contentTitleMode1'),
                    'contentTitle2' => $this->request->getVar('contentTitle2'),
                    'contentSubTitle2' => $this->request->getVar('contentSubTitle2'),
                    'contentTitleMode2' => $this->request->getVar('contentTitleMode2'),
                    'contentTitle3' => $this->request->getVar('contentTitle3'),
                    'contentSubTitle3' => $this->request->getVar('contentSubTitle3'),
                    'contentTitleMode3' => $this->request->getVar('contentTitleMode3'),
                    'contentTitle4' => $this->request->getVar('contentTitle4'),
                    'contentSubTitle4' => $this->request->getVar('contentSubTitle4'),
                    'contentTitleMode4' => $this->request->getVar('contentTitleMode4'),
                    'updatedOn' => date('Y-m-d H:i:s'),
                ];

                // echo "<pre>";print_r($updateData);die;
                $this->model->update($contentID, $updateData);
                // echo $this->model->getLastQuery()->getQuery();die();

                return 'Success';
            } else {
                $data["validation"] = ['msg' => 'Something went wrong. Content ID is missing!'];
                return view('manage-contents', $data);
            }
        } else {
            // echo "here";die;
            $data["validation"] = $this->validator->getErrors();
            // print_r($data["validation"]);die;
            return view('manage-contents', $data);
        }
    }

    private function validateInput($id = null)
    {
        if ($id) {
            $validationArr['contentTitle1'] = "required|min_length[5]";
            $validationArr['contentSubTitle1'] = "required|min_length[4]";
        }

        return  $this->validate($validationArr);
    }
}
