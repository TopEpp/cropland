<?php

namespace Modules\Report\Controllers;

use App\Models\Common_model;
use Modules\Api\Models\Api_model;
use App\Controllers\BaseController;
use Modules\Land\Models\Land_model;
use Modules\User\Models\User_model;
use Modules\Report\Models\Report_model;

class Report extends BaseController
{
    protected $model_api;

    public function __construct()
    {
        $this->model_api = new Api_model();   
        $this->model_report = new Report_model();     
    }

    public function survay(){
        $model_user = new User_model();
        $model_land = new Land_model();
        $model_common = new Common_model();


        $data['search'] = $this->request->getGet();
        // /search
        if (!empty($data['search'])){
                                  
            if (!empty($data['search']['interview_house_id'])){     
                $data['data_search']['house'] = $model_common->searchHouse('',$data['search']['interview_house_id']);      
            }
            if (!empty($data['search']['interview_person_id'])){            
                $data['data_search']['person'] = $model_common->searchPerson('',$data['search']['interview_person_id']);       
            }
            if (!empty($data['search']['interview_code'])){
                $data['data_search']['land'] = $model_common->searchLand('',$data['search']['interview_code']);  
            }
        }

        $data['projects'] = $this->model_api->getProject();
        $data['basins'] = $model_common->getBasin();

        $data['data'] = $this->model_report->getAllSurvay($data['search']);
        
        return view('Modules\Report\Views\survay',$data);
    }

    public function survayDetail($land){
        
        $data['data'] = $this->model_report->getSurvayDetail($land);
        return view('Modules\Report\Views\survay_detail',$data);
    }

    public function House($type = '')
    {
        $model_user = new User_model();
        $model_land = new Land_model();
        $model_common = new Common_model();
        $data = [];
        
        $data['search'] = $this->request->getGet();

        
        $data['type'] = $type;
        if ($type == 1 || $type == ''){
            $data['data'] = $this->model_report->getAllHouse(10,'page',$data['search']);
        }else if($type == 2){
            $data['data'] = $this->model_report->getAllJobs(10,'page',$data['search']);            
        }else if($type == 3){
            $data['data'] = $this->model_report->getAllLand(10,'page',$data['search']);   
        }else if($type == 4){
            $data['data'] = $this->model_report->getAllProduct(10,'page',$data['search']);   
        }
        
        
        $data['projects'] = $this->model_api->getProject();

        return view('Modules\Report\Views\house',$data);
    }

}