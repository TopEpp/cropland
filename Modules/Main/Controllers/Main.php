<?php

namespace Modules\Main\Controllers;

use App\Controllers\BaseController;

class Main extends BaseController
{
    public function index(){
        return view('Modules\Main\Views\index');
    }
}