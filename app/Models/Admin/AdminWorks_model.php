<?php

namespace App\Models\Admin;

use App\Models\Admin\AdminBaseModel;

class AdminWorks_model extends AdminBaseModel
{

    protected $table = 'our_works';
    protected $primaryKey = 'workID';
    protected $allowedFields = [
        'workTitle', 'projectTitle', 'workImageUrl', 'projectLocation', 'services', 'projectType', 'strategy', 'projectDate', 'workDescription', 'workLongDescription', 'workBnnerImageUrl', 'twitterLink', 'faceBookLink', 'linkedInLink', 'pinterestLink', 'showOrder', 'status', 'statusOn', 'createdOn', 'updatedOn'
    ];

    public function getGalleryImage($workID = null, $cnt = false, $page = 0, $limit = AdminPageSize, $conditions = array(), $sortby = null)
    {
        if (!empty($workID)) {
            $db = db_connect();
            $builder = $db->table('our_work_gallery_images WGI');
            $builder->join('our_works W', 'WGI.workID = W.workID');

            $builder->select('WGI.gallaryImageID, WGI.workID, WGI.gallaryImageUrl');

            $builder->where('WGI.workID', $workID);

            return $this->appendAllAndGetMyResult($builder, $conditions, $sortby,  $cnt, $page, $limit);
        } else {
            return [];
        }
    }

    public function insertGalleryImage($insertArray)
    {
        $db = db_connect();
        $builder = $db->table('our_work_gallery_images');
        $builder->insert($insertArray);
    }
}
