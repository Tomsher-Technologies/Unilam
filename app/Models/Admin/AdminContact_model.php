<?php

namespace App\Models\Admin;

use App\Models\Admin\AdminBaseModel;

class AdminContact_model extends AdminBaseModel
{

    protected $table = 'contactus';
    protected $primaryKey = 'contactID';
    protected $allowedFields = [
        'bannerTitle', 'bannerImageUrl', 'contactTitle', 'contactDescription', 'address', 'phone', 'zipcode', 'email', 'twitterLink', 'faceBookLink', 'instagramLink', 'youTubeLink', 'whatsAppLink', 'status', 'statusOn', 'createdOn', 'updatedOn'
    ];
}
