<?php

namespace App\Models\Admin;

use App\Models\Admin\AdminBaseModel;

class AdminProduct_model extends AdminBaseModel
{

    protected $table = 'products';
    protected $primaryKey = 'productID';
    protected $allowedFields = [
        'productTypeIDs', 'materialID', 'productTitle', 'productDescription', 'productImageUrl', 'productBannerImageUrl', 'menuProductImageUrl', 'showOrder', 'status', 'statusOn', 'createdOn', 'updatedOn'
    ];

    public function getGalleryImage($productID = null, $cnt = false, $page = 0, $limit = AdminPageSize, $conditions = array(), $sortby = null)
    {
        if (!empty($productID)) {
            $db = db_connect();
            $builder = $db->table('product_gallary_images PGI');
            $builder->join('products P', 'PGI.productID = P.productID');

            $builder->select('PGI.gallaryImageID, PGI.productID, PGI.gallaryImageUrl');

            $builder->where('PGI.productID', $productID);

            return $this->appendAllAndGetMyResult($builder, $conditions, $sortby,  $cnt, $page, $limit);
        } else {
            return [];
        }
    }

    public function insertGalleryImage($insertArray)
    {
        $db = db_connect();
        $builder = $db->table('product_gallary_images');
        $builder->insert($insertArray);
    }

    public function removeGalleryImage($galleryImageID, $productID)
    {
        $db = db_connect();
        $builder = $db->table('product_gallary_images');
        $builder->delete(['galleryImageID' => $galleryImageID, 'productID' => $productID]);
    }
}
