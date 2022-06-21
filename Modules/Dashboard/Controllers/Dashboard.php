<?php

namespace Modules\Dashboard\Controllers;

use App\Models\Common_model;
use Modules\Api\Models\Api_model;
use App\Controllers\BaseController;
use Modules\Dashboard\Models\Dashboard_model;

class Dashboard extends BaseController
{
    protected $model_api;

    public function __construct()
    {
        $this->model_api = new Api_model();   
        $this->model_common = new Common_model();     
        $this->model_dashboard = new Dashboard_model();
    }

    public function survay(){
        $data['projects'] = $this->model_api->getProject();
        $data['landuse'] =  $this->model_api->getLandUse();
        $data['province'] = $this->model_common->getProvince();

        $data['income'] = $this->model_dashboard->getIncome();
        $outcome = $this->model_dashboard->getOutcome();
        $tmp = [];
        $label = ['drug'=>'ยา','dressing'=>'ปุ๋ย','hormone'=>'ฮอร์โมน','staff'=>'แรงงาน','other'=>'อื่นๆ'];
        foreach ($outcome as $key => $value) {
           $outcome[$key]['data_type'] = $label[$value['data_type']];
        }
        $data['outcome'] = $outcome;
   
        $income_label = array_column($data['income'], 'Name');
        $income_value = array_column($data['income'], 'product_sum');


        $outcome_value = array_column($data['outcome'], 'product_sum');
    
        //set label
        $data['chart']['product_value']['label'] = ['บุก','ข้าว','พริกกะเหรี่ยง','กล้วย','กาแฟ','ลิ้นจี่'];
        $data['chart']['product_price']['label'] = $income_label;
        $data['chart']['product_price']['data'] = $income_value;
        $data['chart']['product_pay']['label'] = ['ปุ๋ย','ยา','ฮอร์โมน','แรงงาน','อื่นๆ'];
        $data['chart']['product_pay']['data'] = $outcome_value;

        return view('Modules\Dashboard\Views\survay',$data);
    }

    public function house(){

        $data['projects_type'] = $this->model_api->getProjectType();
        $data['projects'] = $this->model_api->getProject();
        return view('Modules\Dashboard\Views\house',$data);
    }
    
    // public function houseType(){

    //     return view('Modules\Dashboard\Views\house_type');
    // }

    // public function houseEconomy(){

    //     return view('Modules\Dashboard\Views\house_economy');
    // }

    // public function houseHealth(){

    //     return view('Modules\Dashboard\Views\house_health');
    // }

    // public function houseSociety(){

    //     return view('Modules\Dashboard\Views\house_society');
    // }

    // public function houseLand(){

    //     return view('Modules\Dashboard\Views\house_land');
    // }

    // public function houseProblem(){

    //     return view('Modules\Dashboard\Views\house_problem');
    // }

    // public function houseActivity(){

    //     return view('Modules\Dashboard\Views\house_activity');
    // }

}