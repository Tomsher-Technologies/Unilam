<?php

namespace App\Models\User;

use App\Models\User\UserBaseModel;

class UserContactDetails_model extends UserBaseModel
{

    protected $table = 'contact_details';
    protected $primaryKey = 'contactDetailID';
    protected $allowedFields = [
        'contactName',  'contactEmail', 'contactPhone', 'message', 'contactStatus', 'contactStatusOn', 'createdOn', 'updatedOn'
    ];
}
