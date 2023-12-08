<?php

namespace App\Models\Admin;

use App\Models\Admin\AdminBaseModel;

class AdminAbout_model extends AdminBaseModel
{

    protected $table = 'abouts';
    protected $primaryKey = 'aboutID';
    protected $allowedFields = [
        'aboutType', 'bannerTitle', 'bannerImageUrl', 'aboutAuthorName', 'aboutTitle', 'aboutDescription', 'aboutImageUrl', 'aboutTitle2', 'aboutDescription2', 'aboutImageUrl2', 'currentClients', 'yearsOfExperience', 'awardWinning', 'officeWorldWide', 'status', 'statusOn', 'createdOn', 'updatedOn'
    ];
}
