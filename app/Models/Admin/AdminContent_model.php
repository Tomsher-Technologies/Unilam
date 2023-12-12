<?php

namespace App\Models\Admin;

use App\Models\Admin\AdminBaseModel;

class AdminContent_model extends AdminBaseModel
{

    protected $table = 'contents';
    protected $primaryKey = 'contentID';
    protected $allowedFields = [
        'canonicalName', 'contentType', 'contentTitle1', 'contentSubTitle1', 'contentTitleMode1', 'contentTitle2', 'contentSubTitle2', 'contentTitleMode2', 'contentTitle3', 'contentSubTitle3', 'contentTitleMode3', 'contentTitle4', 'contentSubTitle4', 'contentTitleMode4', 'status', 'statusOn', 'createdOn', 'updatedOn'
    ];
}
