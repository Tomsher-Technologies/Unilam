<?php

namespace App\Models\Admin;

use App\Models\Admin\AdminBaseModel;

class AdminProductMaterials_model extends AdminBaseModel
{

    protected $table = 'product_material';
    protected $primaryKey = 'materialID';
    protected $allowedFields = [
        'canonicalName', 'materialName', 'createdOn',
    ];
}
