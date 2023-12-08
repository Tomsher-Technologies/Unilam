<?php

namespace App\Models\Admin;

use App\Models\Admin\AdminBaseModel;

class AdminServices_model extends AdminBaseModel
{

    protected $table = 'services';
    protected $primaryKey = 'serviceID';
    protected $allowedFields = [
        'serviceTitle', 'serviceBannerImageUrl', 'serviceBannerImageTitle', 'serviceHeadLine', 'serviceMainDescription', 'serviceHeadLine2', 'serviceMainDescription2', 'serviceHeadLineImageUrl2', 'serviceHeadLine3', 'serviceMainDescription3', 'serviceHeadLineImageUrl3', 'showOrder', 'status', 'statusOn', 'createdOn', 'updatedOn'
    ];
}
