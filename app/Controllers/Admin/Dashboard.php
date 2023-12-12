<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminBaseResourceController;

use App\Models\Admin\AdminUser_model;


class Dashboard extends AdminBaseResourceController
{
    public function dashboard()
    {
        // echo "Dashboard";
        // die;
        $data = [
        	'title_meta' => view('partials/title-meta', ['title' => 'Dashboard']),
        	'page_title' => view('partials/page-title', ['title' => 'Dashboard', 'li_1' => 'Unilam', 'li_2' => 'Dashboard'])
        ];

        return view('dashboard', $data);
    }
}
