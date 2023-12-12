<?php

namespace App\Models\Admin;

use App\Models\Admin\AdminBaseModel;

class AdminServiceFeature_model extends AdminBaseModel
{

    protected $table = 'service_feature';
    protected $primaryKey = 'featureID';
    protected $allowedFields = [
        'canonicalName', 'featureTitle', 'featureDescription', 'featureIconUrl',  'showOrder', 'status', 'statusOn', 'createdOn', 'updatedOn'
    ];
}
// $canon_name = strtolower($_POST['ProductsServices']['product_name_en']);
// $canonical_name = str_replace(' ', '-', $canon_name); // Replaces all spaces with hyphens.
// $canonical_name = preg_replace('/[^A-Za-z0-9\-]/', '', $canonical_name); // Removes special chars.
// $cann = preg_replace('/-+/', '-', $canonical_name);
