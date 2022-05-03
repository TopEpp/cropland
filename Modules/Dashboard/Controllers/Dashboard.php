<?php

namespace Modules\Dashboard\Controllers;

use App\Models\Common_model;
use Modules\Api\Models\Api_model;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    protected $model_api;

    public function __construct()
    {
        $this->model_api = new Api_model();   
        $this->model_common = new Common_model();     
    }

    public function survay(){
        $data['projects'] = $this->model_api->getProject();
        $data['landuse'] =  $this->model_api->getLandUse();
        $data['province'] = $this->model_common->getProvince();

        //set label
        $data['chart']['product_value']['label'] = ['บุก','ข้าว','พริกกะเหรี่ยง','กล้วย','กาแฟ','ลิ้นจี่'];
        $data['chart']['product_price']['label'] = ['ข้าว','กาแฟ','ข้าวโพด','ลำใย','สัก'];
        $data['chart']['product_pay']['label'] = ['ปุ๋ย','ยา','ฮอร์โมน','แรงงาน','อื่นๆ'];

        return view('Modules\Dashboard\Views\survay',$data);
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