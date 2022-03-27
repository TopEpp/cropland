<?php

namespace Modules\House\Controllers;

use App\Controllers\BaseController;

class House extends BaseController
{
    public function index(){

        return view('Modules\House\Views\index');
    }
    
    public function manage(){
        return view('Modules\House\Views\manage');
    }

    public function members(){
        
        return view('Modules\House\Views\members');
    }

    public function jobs(){
        
        return view('Modules\House\Views\jobs');
    }

    public function benefits(){
        
        return view('Modules\House\Views\benefits');
    }

    public function accounts(){
        
        return view('Modules\House\Views\accounts');
    }
}