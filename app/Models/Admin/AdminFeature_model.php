<?php

namespace App\Models\Admin;

use App\Models\Admin\AdminBaseModel;

class AdminFeature_model extends AdminBaseModel
{
    protected $table = 'features';
    protected $primaryKey = 'featureID';
    protected $allowedFields = [
        'featureTitle', 'featureDescription', 'featureIconUrl', 'showOrder', 'status', 'statusOn', 'createdOn', 'updatedOn'
    ];
}
