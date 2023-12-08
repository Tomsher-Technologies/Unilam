<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseResourceController;


class AdminBaseResourceController extends BaseResourceController
{

    public function getPaginationData($DefaultSort)
    {
        return [
            "page" => ((!empty($this->request->getVar('page'))) && (\is_numeric($this->request->getVar('page')))) ? $this->request->getVar('page') : 1,
            "sortby" => (!empty($this->request->getVar('sb'))) ? $this->request->getVar('sb') : $DefaultSort,
            "AdminPageSize" => (!empty($this->request->getVar('ps'))) ? $this->request->getVar('ps') : AdminPageSize
        ];
    }

    public function validateAction(&$myModel, $IDColumn, $id, $multi, $messageCaption = "Data")
    {
        if ($id) {
            $data = $myModel->where($IDColumn, $id)->findAll();
            if ($data) {
                if ((count($data) == 1) || ($multi)) {
                    return true;
                } else {
                    return ["ErrorType" => 'validation Error', 'Errors' => 'Multiple Rows Found.. Please use second parameter to true for multiple rows'];
                }
            } else {
                return ["ErrorType" => 'validation Error', 'Errors' => "No $messageCaption found"];
            }
        } else {
            return ["ErrorType" => 'validation Error', 'Errors' => "Please provide $messageCaption ID"];
        }
    }

    public function handleUploadImage($InputName, $folderName = '', $namePrefix = '', $defaultUrl = '')
    {
        $imageFile = $this->request->getFile($InputName);
        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            return $this->uploadImage($folderName, $InputName . (!empty($namePrefix)) ? ('_' . $namePrefix . '_') : '', $this->request->getFile($InputName));
        } else {
            return $defaultUrl;
        }
    }

    public function uploadImage($path, $namePrefix, $image)
    {
        $newName = $namePrefix . $image->getRandomName();
        $image->move(FCPATH . 'uploads/' . $path, $newName);
        return "uploads/$path/$newName";
    }

    public function getNextShowOrder(&$myModel)
    {
        $myModel->selectMax("ShowOrder");
        $query = $myModel->asObject()->get();
        $result = $query->getResult();
        return ((!empty($result)) && (!empty($result[0]->ShowOrder))) ? ($result[0]->ShowOrder + 1)  : "1";
    }

    public function handleUpdateShoworder(&$myModel, $ID, $IDcolumn, $RecordCaption)
    {
        $validationResult = $this->validateAction($myModel, $IDcolumn, $ID, FALSE, $RecordCaption);
        if ($validationResult === true) {
            $newShowOrder = $this->request->getVar('ShowOrder');
            if (is_numeric($newShowOrder)) {
                $updateData = ['ShowOrder' => $newShowOrder];
                $myModel->update($ID, $updateData);
                return $this->respondSuccess('ShowOrder changed successfully');
            } else {
                return $this->respondFailer(["ErrorType" => 'validation Error', 'Errors' => "Invalid ShowOrder value"]);
            }
        } else {
            return $this->respondFailer(["ErrorType" => 'validation Error', 'Errors' => $validationResult]);
        }
    }

    public function handleUpdatestatus(&$myModel, $ID, $IDcolumn, $RecordCaption, $ValidStatuses = ["2", "3"])
    {
        $validationResult = $this->validateAction($myModel, $IDcolumn, $ID, FALSE, $RecordCaption);
        if ($validationResult === true) {
            $newStatus = $this->request->getVar('Status');
            if (($newStatus == "2") || ($newStatus == "3")) { //2: Active,  3: Inactive
                $updateData = ['Status' => $newStatus, 'StatusOn' => date('Y-m-d H:i:s')];
                $myModel->update($ID, $updateData);
                return $this->respondSuccess('Status changed successfully');
            } else {
                return $this->respondFailer(["ErrorType" => 'validation Error', 'Errors' => "Invalid Status"]);
            }
        } else {
            return $this->respondFailer(["ErrorType" => 'validation Error', 'Errors' => $validationResult]);
        }
    }
}
