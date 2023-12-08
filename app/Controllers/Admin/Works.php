<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminBaseResourceController;



class Works extends AdminBaseResourceController
{
    protected $modelName = "App\Models\Admin\AdminWorks_model";

    public function index()
    {
        // echo "works";die();
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Works', 'li_1' => 'Unilam', 'li_2' => 'Works'])
        ];
        $data['worksDetails'] = $this->model->findAll();
        // print_r($data['worksDetails']);die;

        return view('works-lists', $data);
    }

    public function creatework()
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Add Works', 'li_1' => 'Works', 'li_2' => 'Add Works'])
        ];

        if ($this->request->getMethod() === 'post') {
            $response =  $this->managework();
            if ($response === 'Success') {

                $session->setFlashdata('successMessage', 'Successfully added Works');
                return redirect()->to('works-lists');
            } else {
                return view('manage-work', $data);
            }
        } else {
            // echo "here";die;
            return view('manage-work', $data);
        }
    }

    public function editwork($workID = null)
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Edit Works', 'li_1' => 'Works', 'li_2' => 'Edit Works'])
        ];
        $data['post'] = $this->model->where('workID', $workID)->where('status', 1)->first();
        $data['gallaryImages'] = $this->model->getGalleryImage($workID);

        if (($this->request->getMethod() === 'post') && !empty($workID)) {
            if (!empty($data['post'])) {

                $response =  $this->managework($workID);
                if ($response === 'Success') {
                    $session->setFlashdata('successMessage', 'Successfully updated Works');

                    if (!empty($workID)) {

                        return redirect()->to('../admin/works-lists');
                    } else {

                        return redirect()->to('works-lists');
                    }
                } else {
                    return view('manage-work', $data);
                }
            } else {
                $session->setFlashdata('errorMessage', 'This Works not found!');
                return view('manage-work', $data);
            }
        } else {
            return view('manage-work', $data);
        }
    }

    public function managework($workID = null)
    {
        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Works', 'li_1' => 'Unilam', 'li_2' => 'Works'])
        ];
        $data['post'] = $_POST;
        $data['gallaryImages'] = $this->model->getGalleryImage($workID);

        if ($this->validateInput($workID)) {
            if (!empty($workID)) {

                $updateData = [
                    'workTitle' => $this->request->getVar('workTitle'),
                    'projectTitle' => $this->request->getVar('projectTitle'),
                    'workImageUrl' => $this->handleUploadImage("workImage", 'workImage', '', $this->request->getVar('workImageUrl')),
                    'projectLocation' => $this->request->getVar('projectLocation'),
                    'services' => $this->request->getVar('services'),
                    'projectType' => $this->request->getVar('projectType'),
                    'strategy' => $this->request->getVar('strategy'),
                    'projectDate' => $this->request->getVar('projectDate'),
                    'projectDate' => $this->request->getVar('projectDate'),
                    'workDescription' => $this->request->getVar('workDescription'),
                    'workLongDescription' => $this->request->getVar('workLongDescription'),
                    'workBnnerImageUrl' => $this->handleUploadImage("workBnnerImage", 'workBnnerImage', '', $this->request->getVar('workBnnerImageUrl')),
                    'twitterLink' => $this->request->getVar('twitterLink'),
                    'faceBookLink' => $this->request->getVar('faceBookLink'),
                    'linkedInLink' => $this->request->getVar('linkedInLink'),
                    'showOrder' => !empty($this->request->getVar('showOrder')) ??  $this->getNextShowOrder($this->model),
                    'updatedOn' => date('Y-m-d H:i:s'),
                ];
                $this->model->update($workID, $updateData);

                $this->insertGalleryImages($workID);

                return 'Success';
            } else {
                $insertData = [
                    'workTitle' => $this->request->getVar('workTitle'),
                    'projectTitle' => $this->request->getVar('projectTitle'),
                    'workImageUrl' => $this->handleUploadImage("workImage", 'workImage', '', 'defaultUrl'),
                    'projectLocation' => $this->request->getVar('projectLocation'),
                    'services' => $this->request->getVar('services'),
                    'projectType' => $this->request->getVar('projectType'),
                    'strategy' => $this->request->getVar('strategy'),
                    'projectDate' => $this->request->getVar('projectDate'),
                    'projectDate' => $this->request->getVar('projectDate'),
                    'workDescription' => $this->request->getVar('workDescription'),
                    'workLongDescription' => $this->request->getVar('workLongDescription'),
                    'workBnnerImageUrl' => $this->handleUploadImage("workBnnerImage", 'workBnnerImage', '', 'defaultUrl'),
                    'twitterLink' => $this->request->getVar('twitterLink'),
                    'faceBookLink' => $this->request->getVar('faceBookLink'),
                    'linkedInLink' => $this->request->getVar('linkedInLink'),
                    'pinterestLink' => $this->request->getVar('pinterestLink'),
                    'showOrder' => !empty($this->request->getVar('showOrder')) ??  $this->getNextShowOrder($this->model),
                    'status' => '1',
                    'statusOn' => date('Y-m-d H:i:s'),
                    'createdOn' => date('Y-m-d H:i:s'),
                    'updatedOn' => date('Y-m-d H:i:s'),
                ];
                // print_r($insertData);die;

                $this->model->insert($insertData);

                $workID =  $this->model->insertID();
                if ($workID) {

                    $this->insertGalleryImages($workID);
                    return 'Success';
                } else {
                    $data["validation"] = ['msg' => 'Something went wrong!'];
                    return view('manage-work', $data);
                }
            }
        } else {
            // echo "here";die;
            $data["validation"] = $this->validator->getErrors();
            // print_r($data["validation"]);die;
            return view('manage-work', $data);
        }
    }

    public function deletework($workID)
    {
        $session = session();

        $data = [
            'page_title' => view('partials/page-title', ['title' => 'Add Works', 'li_1' => 'Works', 'li_2' => 'Add Works'])
        ];
        $data['post'] = $this->model->where('workID', $workID)->where('status', 1)->first();
        if (!empty($data['post'])) {
            $this->model->delete($workID);
            $session->setFlashdata('successMessage', 'Successfully deleted Works');

            return redirect()->to('../admin/works-lists');
        } else {
            $session->setFlashdata('errorMessage', 'This Works not found!');
            return view('manage-work', $data);
        }
    }

    private function insertImage($path, $namePrefix, $image)
    {
        $newName = $namePrefix . $image->getRandomName();
        $image->move(FCPATH . 'uploads/' . $path, $newName);
        return "uploads/$path/$newName";
    }

    private function insertGalleryImages($workID)
    {
        $imagefile = $this->request->getFiles();
        if ($imagefile = $this->request->getFiles()) {
            if ((isset($imagefile['galleryImages'])) && (!empty($imagefile['galleryImages']))) {
                foreach ($imagefile['galleryImages'] as $img) {
                    if ($img->isValid() && !$img->hasMoved()) {
                        $uploadedUrl = $this->insertImage(('works/' . $workID), 'galleryImages_', $img);
                        $this->model->insertGalleryImage(["workID" => $workID, "gallaryImageUrl" => $uploadedUrl]);
                    }
                }
            }
        }

        if (!empty($this->request->getVar('removedGalleryImages'))) {
            foreach ($this->request->getVar('removedGalleryImages') as $key => $value) {
                $this->model->removeGalleryImage($value, $workID);
            }
        }
    }

    private function validateInput($id = null)
    {
        if ($id) {
            if (!empty($this->request->getFile('workBnnerImageUrl'))) {
                $validationArr['workBnnerImage'] = "max_size[workBnnerImage,10096]";
            }
            if (!empty($this->request->getFile('workImageUrl'))) {
                $validationArr['workImage'] = "max_size[workImage,10096]";
            }
        } else {
            $validationArr['workBnnerImage'] = "uploaded[workBnnerImage]|max_size[workBnnerImage,10096]";
            $validationArr['workImage'] = "uploaded[workImage]|max_size[workImage,10096]";
        }
        $validationArr['workTitle'] = "required|min_length[2]";
        $validationArr['projectTitle'] = "required|min_length[2]";
        $validationArr['projectLocation'] = "required|min_length[2]";
        $validationArr['projectType'] = "required";
        $validationArr['services'] = "required|min_length[2]";
        $validationArr['strategy'] = "required|min_length[2]";
        $validationArr['projectDate'] = "required|min_length[2]";
        $validationArr['workDescription'] = "required|min_length[10]";
        $validationArr['workLongDescription'] = "required|min_length[10]";

        return  $this->validate($validationArr);
    }
}
