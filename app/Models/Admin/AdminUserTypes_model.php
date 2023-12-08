<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class AdminUserTypes_model extends Model
{

    protected $table = 'user_types';
    protected $primaryKey = 'userTypeID';
    protected $allowedFields = [
        'userType', 'status', 'statusOn', 'createdOn', 'updatedOn'
    ];
}
