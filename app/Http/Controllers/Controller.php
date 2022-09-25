<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;


use App\Models\User;
use App\Models\Exam;

class Controller extends BaseController
{
        /**
     * First respond to get a requested page.
     *
     * @param  string  $page_url
     * @return \Illuminate\Support\Collection
     */

    public function index($page_url)
    {
        $page = new PageController();
        return $page->get_page($page_url);
    }

}
