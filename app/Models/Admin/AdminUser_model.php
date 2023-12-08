<?php

namespace App\Models\Admin;

use App\Models\Admin\AdminBaseModel;

class AdminUser_model extends AdminBaseModel
{

    protected $table = 'users';
    protected $primaryKey = 'userID';
    protected $allowedFields = [
        'userTypeID', 'name',  'email', 'password', 'userName', 'phone', 'status', 'statusOn', 'lastLoggedOn', 'createdOn'
    ];

    public function getUsers($userID = null, $cnt = false, $page = 0, $limit = AdminPageSize, $conditions = array(), $sortby = null)
    {
        $db = db_connect();
        $builder = $db->table('users U');
        $builder->join('user_types UT', 'UT.userTypeID = U.userTypeID');

        if (empty($cnt)) {
            $builder->select('U.userID, U.userTypeID, U.name, U.email, U.userName, U.phone, U.status, U.statusOn, U.lastLoggedOn, U.createdOn, UT.userType');
        if(!empty($userID)){
            $builder->where('U.userID', $userID);
        }
        }else {
            $builder->select('count(U.userID) as numrows');
        }

        return $this->appendAllAndGetMyResult($builder, $conditions, $sortby,  $cnt, $page, $limit);
    }
}
