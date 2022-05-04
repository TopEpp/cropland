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
        $data['lands'] = $model_land->getAllLand();
        $data['users']= $model_user->getSelectUsers();
        $data['projects'] = $this->model_api->getProject();
      
        $data['villages'] = $model_common->getVillage();
        $data['persons']= $model_common->getAllPersons();
        $data['basins'] = $model_common->getBasin();

        $data['data'] = $this->model_report->getAllSurvay($data['search']);
        
        return view('Modules\Report\Views\survay',$data);
    }

    public function survayDetail($land){
        
        $data['data'] = $this->model_report->getSurvayDetail($land);
        return view('Modules\Report\Views\survay_detail',$data);
    }

}