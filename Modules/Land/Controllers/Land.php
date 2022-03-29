<?php

namespace Modules\Land\Controllers;

use App\Controllers\BaseController;

class Land extends BaseController
{
    public function index(){

        return view('Modules\Land\Views\index');
    }

}