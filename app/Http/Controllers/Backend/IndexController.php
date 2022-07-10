<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends BaseController
{
    /**
     * show the management page index
     * @return View
     */
    public function index() :View
    {
        return view('backend.index');
    }   
}
