<?php

namespace Modules\Dashboard\Controllers;

use Modules\Api\Models\Api_model;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    protected $model_api;

    public function __construct()
    {
        $this->model_api = new Api_model();        
    }

    public function index(){
        $data['prefix'] = $this->model_api->getPrefix();
        return view('Modules\Dashboard\Views\index',$data);
    }

    public function houseType(){

        return view('Modules\Dashboard\Views\house_type');
    }

    public function houseEconomy(){

        return view('Modules\Dashboard\Views\house_economy');
    }

    public function houseHealth(){

        return view('Modules\Dashboard\Views\house_health');
    }

    public function houseSociety(){

        return view('Modules\Dashboard\Views\house_society');
    }

    public function houseLand(){

        return view('Modules\Dashboard\Views\house_land');
    }

    public function houseProblem(){

        return view('Modules\Dashboard\Views\house_problem');
    }

    public function houseActivity(){

        return view('Modules\Dashboard\Views\house_activity');
    }

}