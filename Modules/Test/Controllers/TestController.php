<?php

namespace Modules\Test\Controllers;

use App\Controllers\BaseController;

class TestController extends BaseController
{
    public function index()
    {

        echo view('Modules\Test\Views\index');
    }
}
