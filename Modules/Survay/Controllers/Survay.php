<?php

namespace Modules\Survay\Controllers;

use App\Controllers\BaseController;

class Survay extends BaseController
{
    public function index(){

        return view('Modules\Survay\Views\index');
    }
    
    public function manage(){
        return view('Modules\Survay\Views\manage');
    }

    public function land(){
        
        return view('Modules\Survay\Views\land');
    }

    public function promote(){
        
        return view('Modules\Survay\Views\promote');
    }

    public function promoteOther(){
        
        return view('Modules\Survay\Views\promote_other');
    }

    public function problem(){
        
        return view('Modules\Survay\Views\problem');
    }

    public function need(){
        
        return view('Modules\Survay\Views\need');
    }
}