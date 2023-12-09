<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminBaseResourceController;



class Services extends AdminBaseResourceController
{
    protected $modelName = "App\Models\Admin\AdminServices_model";

    public function index()
    {
        // echo "works";die();
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Services', 'li_1' => 'Unilam', 'li_2' => 'Services'])
        ];
        $data['serviceDetails'] = $this->model->findAll();
        // print_r($data['serviceDetails']);die;

        return view('service-lists', $data);
    }

    public function createservice()
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Add Services', 'li_1' => 'Services', 'li_2' => 'Add Services'])
        ];

        if ($this->request->getMethod() === 'post') {
            $response =  $this->manageservice();
            if ($response === 'Success') {

                $session->setFlashdata('successMessage', 'Successfully added service');
                return redirect()->to('service-lists');
            } else {
                return view('manage-service', $data);
            }
        } else {
            return view('manage-service', $data);
        }
    }

    public function editservice($serviceID = null)
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Edit Services', 'li_1' => 'Services', 'li_2' => 'Edit Services'])
        ];
        $data['post'] = $this->model->where('serviceID', $serviceID)->where('status', 1)->first();

        if (($this->request->getMethod() === 'post') && !empty($serviceID)) {
            if (!empty($data['post'])) {

                $response =  $this->manageservice($serviceID);
                if ($response === 'Success') {
                    $session->setFlashdata('successMessage', 'Successfully updated service');

                    if (!empty($serviceID)) {

                        return redirect()->to('../admin/service-lists');
                    } else {

                        return redirect()->to('service-lists');
                    }
                } else {
                    return view('manage-service', $data);
                }
            } else {
                $session->setFlashdata('errorMessage', 'This service not found!');
                return view('manage-service', $data);
            }
        } else {
            return view('manage-service', $data);
        }
    }

    public function manageservice($serviceID = null)
    {
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Services', 'li_1' => 'Unilam', 'li_2' => 'Services'])
        ];
        $data['post'] = $_POST;

        if ($this->validateInput($serviceID)) {
            if (!empty($serviceID)) {

                $updateData = [
                    'serviceTitle' => $this->request->getVar('serviceTitle'),
                    'serviceHeadLine' => $this->request->getVar('serviceHeadLine'),
                    'serviceBannerImageTitle' => $this->request->getVar('serviceBannerImageTitle'),
                    'serviceBannerImageUrl' => $this->handleUploadImage("serviceBannerImage", 'serviceBannerImage', '', $this->request->getVar('serviceBannerImageUrl')),
                    'serviceHeadLine' => $this->request->getVar('serviceHeadLine'),
                    'serviceMainDescription' => $this->request->getVar('serviceMainDescription'),
                    'serviceHeadLine2' => $this->request->getVar('serviceHeadLine2'),
                    'serviceMainDescription2' => $this->request->getVar('serviceMainDescription2'),
                    'serviceHeadLineImageUrl2' => $this->handleUploadImage("serviceHeadLineImage2", 'serviceHeadLineImage2', '', $this->request->getVar('serviceHeadLineImageUrl2')),
                    'serviceHeadLine3' => $this->request->getVar('serviceHeadLine3'),
                    'serviceMainDescription3' => $this->request->getVar('serviceMainDescription3'),
                    'serviceHeadLineImageUrl3' => $this->handleUploadImage("serviceHeadLineImage3", 'serviceHeadLineImage3', '', $this->request->getVar('serviceHeadLineImageUrl3')),
                    'featureBannerImageUrl' => $this->handleUploadImage("featureBannerImage", 'featureBannerImage', '', $this->request->getVar('featureBannerImageUrl')),
                    'showOrder' => !empty($this->request->getVar('showOrder')) ??  $this->getNextShowOrder($this->model),
                    'updatedOn' => date('Y-m-d H:i:s'),
                ];
                $this->model->update($serviceID, $updateData);

                return 'Success';
            } else {
                $insertData = [
                    'serviceTitle' => $this->request->getVar('serviceTitle'),
                    'serviceHeadLine' => $this->request->getVar('serviceHeadLine'),
                    'serviceBannerImageTitle' => $this->request->getVar('serviceBannerImageTitle'),
                    'serviceBannerImageUrl' => $this->handleUploadImage("serviceBannerImage", 'serviceBannerImage', '', 'defaultUrl'),
                    'serviceHeadLine' => $this->request->getVar('serviceHeadLine'),
                    'serviceMainDescription' => $this->request->getVar('serviceMainDescription'),
                    'serviceHeadLine2' => $this->request->getVar('serviceHeadLine2'),
                    'serviceMainDescription2' => $this->request->getVar('serviceMainDescription2'),
                    'serviceHeadLineImageUrl2' => $this->handleUploadImage("serviceHeadLineImage2", 'serviceHeadLineImage2', '', 'defaultUrl'),
                    'serviceHeadLine3' => $this->request->getVar('serviceHeadLine3'),
                    'serviceMainDescription3' => $this->request->getVar('serviceMainDescription3'),
                    'serviceHeadLineImageUrl3' => $this->handleUploadImage("serviceHeadLineImage3", 'serviceHeadLineImage3', '', 'defaultUrl'),
                    'featureBannerImageUrl' => $this->handleUploadImage("featureBannerImage", 'featureBannerImage', '', 'defaultUrl'),
                    'showOrder' => !empty($this->request->getVar('showOrder')) ??  $this->getNextShowOrder($this->model),
                    'status' => '1',
                    'statusOn' => date('Y-m-d H:i:s'),
                    'createdOn' => date('Y-m-d H:i:s'),
                    'updatedOn' => date('Y-m-d H:i:s'),
                ];
                // print_r($insertData);die;

                $this->model->insert($insertData);

                $serviceID =  $this->model->insertID();
                if ($serviceID) {

                    return 'Success';
                } else {
                    $data["validation"] = ['msg' => 'Something went wrong!'];
                    return view('manage-service', $data);
                }
            }
        } else {
            // echo "here";die;
            $data["validation"] = $this->validator->getErrors();
            // print_r($data["validation"]);die;
            return view('manage-service', $data);
        }
    }

    public function deleteservice($serviceID)
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Add Services', 'li_1' => 'Services', 'li_2' => 'Add Services'])
        ];
        $data['post'] = $this->model->where('serviceID', $serviceID)->where('status', 1)->first();
        if (!empty($data['post'])) {
            $this->model->delete($serviceID);
            $session->setFlashdata('successMessage', 'Successfully deleted service');

            return redirect()->to('../admin/service-lists');
        } else {
            $session->setFlashdata('errorMessage', 'This service not found!');
            return view('manage-service', $data);
        }
    }


    private function validateInput($id = null)
    {
        if ($id) {
            if (!empty($this->request->getFile('serviceBannerImageUrl'))) {
                $validationArr['serviceBannerImage'] = "max_size[serviceBannerImage,10096]";
            }
            if (!empty($this->request->getFile('serviceHeadLineImageUrl2'))) {
                $validationArr['serviceHeadLineImage2'] = "max_size[serviceHeadLineImage2,10096]";
            }
            if (!empty($this->request->getFile('featureBannerImageUrl'))) {
                $validationArr['featureBannerImage'] = "max_size[featureBannerImage,10096]";
            }
        } else {
            $validationArr['serviceBannerImage'] = "uploaded[serviceBannerImage]|max_size[serviceBannerImage,10096]";
            $validationArr['serviceHeadLineImage2'] = "uploaded[serviceHeadLineImage2]|max_size[serviceHeadLineImage2,10096]";
            $validationArr['featureBannerImage'] = "uploaded[featureBannerImage]|max_size[featureBannerImage,10096]";
        }
        $validationArr['serviceTitle'] = "required|min_length[4]";
        $validationArr['serviceBannerImageTitle'] = "required|min_length[4]";
        $validationArr['serviceHeadLine'] = "required|min_length[4]";
        $validationArr['serviceMainDescription'] = "required|min_length[10]";
        $validationArr['serviceHeadLine2'] = "required|min_length[5]";
        $validationArr['serviceMainDescription2'] = "required|min_length[10]";

        return  $this->validate($validationArr);
    }
}
