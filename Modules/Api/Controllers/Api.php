<?php

namespace Modules\Api\Controllers;

use App\Controllers\BaseController;
use Modules\Api\Models\Api_model;

class Api extends BaseController
{
    protected $model_api;

    public function __construct()
    {
        $this->model_api = new Api_model();        
    }

    public function index(){
        return view('Modules\Api\Views\index');
    }

    public function agriWork(){
        $data['data'] =  $this->model_api->getAgriWork();
        return view('Modules\Api\Views\agriWork',$data);
    }


}