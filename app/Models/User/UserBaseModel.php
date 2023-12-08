<?php namespace App\Models\User;

use CodeIgniter\Model;

class UserBaseModel extends Model
{

    public function appendConditions($builder, $conditions){
        if (!empty($conditions)) {
            if (\is_array($conditions)) {
                foreach ($conditions as $key => $value) {
                    if (is_numeric($key)) {
                        $builder->where($value);
                    } else {
                        $builder->where($key, $value);
                    }
                }
            } else {
                $builder->where($conditions);
            }
        }
    }

    public function appendSort($builder, $sortby){
        if (!empty($sortby)) {
            $builder->orderBy($sortby);
        }
    }

    public function appendPagination($builder, $cnt, $page, $limit){
        if ((empty($cnt)) && (!empty($page))) {
            $builder->limit($limit, ($page - 1) * $limit);
        }
    }

    public function getMyResult($builder){
        $query = $builder->get();
        return $query->getResult();
    }
    
    public function appendAllAndGetMyResult($builder, $conditions, $sortby = NULL,  $cnt = FALSE, $page = FALSE, $limit = FALSE){
        $this->appendConditions($builder, $conditions);
        $this->appendSort($builder, $sortby);
        $this->appendPagination($builder, $cnt, $page, $limit);
        return $this->getMyResult($builder);
    }

}
