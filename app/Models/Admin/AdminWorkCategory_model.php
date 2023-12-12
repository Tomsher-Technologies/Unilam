<?php

namespace App\Models\Admin;

use App\Models\Admin\AdminBaseModel;

class AdminWorkCategory_model extends AdminBaseModel
{

    protected $table = 'work_category';
    protected $primaryKey = 'categoryID';
    protected $allowedFields = [
        'canonicalName', 'categoryName', 'createdOn',
    ];
}
