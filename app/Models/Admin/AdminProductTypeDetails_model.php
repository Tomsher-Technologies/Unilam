<?php

namespace App\Models\Admin;

use App\Models\Admin\AdminBaseModel;

class AdminProductTypeDetails_model extends AdminBaseModel
{

    protected $table = 'product_type_details';
    protected $primaryKey = 'typeDetailID';
    protected $allowedFields = [
        'productID', 'productTypeID', 'typeDetailTitle', 'typeDetailImageUrl',  'createdOn'
    ];
}
