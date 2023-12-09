<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminBaseResourceController;

class ServiceFeatures extends AdminBaseResourceController
{
    protected $modelName = "App\Models\Admin\AdminServiceFeature_model";

    public function index()
    {
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Features', 'li_1' => 'Unilam', 'li_2' => 'Features'])
        ];
        $data['featureDetails'] = $this->model->findAll();
        // print_r($data['featureDetails']);die;

        return view('service-feature-lists', $data);
    }

    public function createservicefeature()
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Add Feature', 'li_1' => 'Features', 'li_2' => 'Add Feature'])
        ];

        if ($this->request->getMethod() === 'post') {
            $response =  $this->managefeature();
            if ($response === 'Success') {

                $session->setFlashdata('successMessage', 'Successfully added feature');
                return redirect()->to('service-feature-lists');
            } else {
                return view('manage-service-feature', $data);
            }
        } else {
            return view('manage-service-feature', $data);
        }
    }

    public function editservicefeature($featureID = null)
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Edit Features', 'li_1' => 'Features', 'li_2' => 'Edit Feature'])
        ];
        $data['post'] = $this->model->where('featureID', $featureID)->where('status', 1)->first();

        if (($this->request->getMethod() === 'post') && !empty($featureID)) {
            if (!empty($data['post'])) {

                $response =  $this->managefeature($featureID);
                if ($response === 'Success') {
                    $session->setFlashdata('successMessage', 'Successfully updated feature');
                    if (!empty($featureID)) {

                        return redirect()->to('../admin/service-feature-lists');
                    } else {

                        return redirect()->to('service-feature-lists');
                    }
                } else {
                    return view('manage-service-feature', $data);
                }
            } else {
                $session->setFlashdata('errorMessage', 'This Features not found!');
                return view('manage-service-feature', $data);
            }
        } else {
            return view('manage-service-feature', $data);
        }
    }

    public function managefeature($featureID = null)
    {
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Features', 'li_1' => 'Unilam', 'li_2' => 'Features'])
        ];
        $data['post'] = $_POST;

        if ($this->validateInput($featureID)) {
            if (!empty($featureID)) {

                $updateData = [
                    'featureTitle' => $this->request->getVar('featureTitle'),
                    'featureDescription' => $this->request->getVar('featureDescription'),
                    'featureIconUrl' => $this->handleUploadImage("featureIcon", 'featureIcon', '', $this->request->getVar('featureIconUrl')),
                    'showOrder' => !empty($this->request->getVar('showOrder')) ??  $this->getNextShowOrder($this->model),
                    'updatedOn' => date('Y-m-d H:i:s'),
                ];

                $this->model->update($featureID, $updateData);
                return 'Success';
            } else {
                $insertData = [
                    'featureTitle' => $this->request->getVar('featureTitle'),
                    'featureDescription' => $this->request->getVar('featureDescription'),
                    'featureIconUrl' => $this->handleUploadImage("featureIcon", 'featureIcon', '', 'defaultUrl'),
                    'featureBannerImageUrl' => $this->handleUploadImage("featureBannerImage", 'featureBannerImage', '', 'defaultUrl'),
                    'showOrder' => !empty($this->request->getVar('showOrder')) ??  $this->getNextShowOrder($this->model),
                    'status' => '1',
                    'statusOn' => date('Y-m-d H:i:s'),
                    'createdOn' => date('Y-m-d H:i:s'),
                    'updatedOn' => date('Y-m-d H:i:s'),
                ];
                $this->model->insert($insertData);
                // echo $this->model->getLastQuery()->getQuery();die();

                $featureID =  $this->model->insertID();
                if ($featureID) {

                    return 'Success';
                } else {
                    $data["validation"] = ['msg' => 'Something went wrong!'];
                    return view('manage-service-feature', $data);
                }
            }
        } else {
            $data["validation"] = $this->validator->getErrors();
            return view('manage-service-feature', $data);
        }
    }

    public function deleteservicefeature($featureID)
    {
        $session = session();
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Add Feature', 'li_1' => 'Features', 'li_2' => 'Add Feature'])
        ];
        $data['post'] = $this->model->where('featureID', $featureID)->where('status', 1)->first();
        if (!empty($data['post'])) {

            $this->model->delete($featureID);
            $session->setFlashdata('successMessage', 'Successfully deleted Feature');

            return redirect()->to('../admin/service-feature-lists');
        } else {
            $session->setFlashdata('errorMessage', 'This Feature not found!');
            return view('manage-service-feature', $data);
        }
    }

    private function validateInput($id = null)
    {
        if ($id) {
            if (!empty($this->request->getFile('featureIconUrl'))) {
                $validationArr['featureIcon'] = "max_size[featureIcon,10096]";
            }
            if (!empty($this->request->getFile('featureBannerImageUrl'))) {
                $validationArr['featureBannerImage'] = "max_size[featureBannerImage,10096]";
            }
        } else {
            $validationArr['featureIcon'] = "uploaded[featureIcon]|max_size[featureIcon,10096]|mime_in[featureIcon,image/png, image/PNG]";
        }

        $validationArr['featureTitle'] = "required|min_length[3]";
        $validationArr['featureDescription'] = "required|min_length[10]";
        return  $this->validate($validationArr);
    }
}
