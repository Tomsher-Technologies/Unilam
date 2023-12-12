<?php

namespace App\Models\Admin;

use App\Models\Admin\AdminBaseModel;

class AdminBanner_model extends AdminBaseModel
{
    protected $table = 'banners';
    protected $primaryKey = 'bannerID';
    protected $allowedFields = [
        'canonicalName', 'bannerHeading', 'bannerTitle', 'bannerUrl', 'bannerFileUrl', 'bannerDescription', 'showOrder', 'status', 'statusOn', 'createdOn', 'updatedOn'
    ];
}
