<?php
namespace App\Models\Admin;
use App\Models\Admin\AdminBaseModel;

class AdminProductTypes_model extends AdminBaseModel
{

    protected $table = 'product_types';
    protected $primaryKey = 'productTypeID';
    protected $allowedFields = [
        'canonicalName', 'typeTitle', 'status', 'statusOn', 'createdOn', 'updatedOn'
    ];
}
