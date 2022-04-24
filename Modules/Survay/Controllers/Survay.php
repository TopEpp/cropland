<?php

namespace Modules\Survay\Controllers;

use App\Models\Common_model;
use Modules\Api\Models\Api_model;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use Modules\Land\Models\Land_model;
use Modules\User\Models\User_model;
use App\Models\InterViewHouse_model;
use Modules\House\Models\House_model;
use Modules\Survay\Models\Survay_model;

class Survay extends BaseController
{
    
    use ResponseTrait;

    protected $model_survay;
    protected $model_api;
    public function __construct()
    {
        $this->model_api = new Api_model();
        $this->model_survay = new Survay_model();
        
    }

    public function index(){
        $model_user = new User_model();
        $model_land = new Land_model();
        // /search

        $data['lands'] = $model_land->getAllLand();
        $data['users']= $model_user->getSelectUsers();
        $data['projects'] = $this->model_api->getProject();

        $data['data'] = $this->model_survay->getAllSurvay();
        return view('Modules\Survay\Views\index',$data);
    }
    
    public function manage($interview_id = ''){

        $model_user = new User_model();
        $model_land = new Land_model();
        $model_house = new House_model();
        $model_interview = new InterViewHouse_model();
        $model_common = new Common_model();
          


        $data['interview_id'] = $interview_id;
    
        $data['lands'] = $model_land->getAllLand();
        $data['users']= $model_user->getSelectUsers();
        $data['projects'] = $this->model_api->getProject();
        $data['privileges'] = $this->model_api->getLandprivilege();
        
        $data['villages'] = [];
        $data['persons'] = [];
       
        if ($interview_id){
            
            $data['data'] = $this->model_survay->getAllSurvay($interview_id);
            
            $data['data']['interview_date'] = $this->date_thai->date_eng2thai($data['data']['interview_date'],543,'','','/');            
            $data['villages'] = $model_common->getVillage('',$data['data']['interview_project']);            
            $data['persons']= $model_common->getAllPersons($data['data']['interview_house_id']);
    
        }
        
        return view('Modules\Survay\Views\manage',$data);
    }

    public function saveManage(){
        $input = $this->request->getVar();
           
        $session = session();
        
        if (!empty($input)){
            // insert house
            $data_survay = $input;
            $data_survay['interview_date'] = $this->date_thai->date_thai2eng($input['interview_date'],-543);
            
            // unset($data_survay['interview_project']);
            // unset($data_survay['interview_project_name']);
            // unset($data_survay['interview_year']);
            // unset($data_survay['interview_id']);
            $interview_id = $this->model_survay->saveSurvayManage($data_survay);
        
            // //insert interview house
            // if ($house_id){
            //     $data_interview = [
            //         'interview_id' => $input['interview_id'],
            //         'interview_project' => $input['interview_project'],
            //         'interview_project_name' => $input['interview_project_name'],
            //         'interview_year' => $input['interview_year'],
            //         'interview_house' => $house_id,
            //     ];
            //     $this->model_interview_house->saveInterViewHouse($data_interview);
            // }

            if (!empty($input['interview_id'])){
                $session->setFlashdata("message", "แก้ไขข้อมูลเรียบร้อย");
            }else{
                $session->setFlashdata("message", "บันทึกข้อมูลเรียบร้อย");
            }
            
        }
     
        return redirect()->to('survay/manage/'.$interview_id);
    }

    public function land($interview_id,$id = ''){
        $data['interview_id'] = $interview_id;
        $data['landuse'] =  $this->model_api->getLandUse();
        $data['data'] = $this->model_survay->getSurvayLand($interview_id);
        
        return view('Modules\Survay\Views\land',$data);
    }

    public function saveLand($interview_id){
        $input = $this->request->getVar();
        
        $session = session();
        $input['interview_id'] = $interview_id;
        $detail_id = $this->model_survay->saveSurvayLand($input);

        if (!empty($input['detail_id'])){
            $session->setFlashdata("message", "แก้ไขข้อมูลเรียบร้อย");
        }else{
            $session->setFlashdata("message", "บันทึกข้อมูลเรียบร้อย");
        }

        return redirect()->to('survay/land/'.$interview_id);
        
    }

    public function support($interview_id,$id = ''){
        $data['interview_id'] = $interview_id;
        $data['data'] = $this->model_survay->getSupports($interview_id);
        return view('Modules\Survay\Views\support',$data);
    }

    public function saveSupport($interview_id){
        $input = $this->request->getVar();

        $session = session();
        $input['interview_id'] = $interview_id;
        
        $person_id = $this->model_survay->saveSurvaySupport($input);

        if (!empty($input['job_id'])){
            $session->setFlashdata("message", "แก้ไขข้อมูลเรียบร้อย");
        }else{
            $session->setFlashdata("message", "บันทึกข้อมูลเรียบร้อย");
        }

        return redirect()->to('survay/support/'.$interview_id);
    }

    public function supportOther($interview_id,$id = ''){
        $data['interview_id'] = $interview_id;
        $data['data'] = $this->model_survay->getSupportsOther($interview_id);
        return view('Modules\Survay\Views\support_other',$data);
    }


    public function saveSupportOther($interview_id){
        $input = $this->request->getVar();
      
        $session = session();
        $input['interview_id'] = $interview_id;
        
        $person_id = $this->model_survay->saveSurvaySupportOther($input);

        if (!empty($input['job_id'])){
            $session->setFlashdata("message", "แก้ไขข้อมูลเรียบร้อย");
        }else{
            $session->setFlashdata("message", "บันทึกข้อมูลเรียบร้อย");
        }

        return redirect()->to('survay/support-other/'.$interview_id);
    }

    public function problem($interview_id,$id = ''){
        $data['interview_id'] = $interview_id;
        $data['data'] = $this->model_survay->getProblem($interview_id);
        
        return view('Modules\Survay\Views\problem',$data);
    }

    public function saveSurvayProblem($interview_id){
        $input = $this->request->getVar();
      
        $session = session();
        $input['interview_id'] = $interview_id;
        
        $person_id = $this->model_survay->saveSurvayProblem($input);

        if (!empty($input['job_id'])){
            $session->setFlashdata("message", "แก้ไขข้อมูลเรียบร้อย");
        }else{
            $session->setFlashdata("message", "บันทึกข้อมูลเรียบร้อย");
        }

        return redirect()->to('survay/problem/'.$interview_id);
    }

    public function need($interview_id,$id = ''){
        $data['interview_id'] = $interview_id;
        $data['data'] = $this->model_survay->getNeed($interview_id);
        return view('Modules\Survay\Views\need',$data);
    }

    public function saveSurvayNeed($interview_id){
        $input = $this->request->getVar();
      
        $session = session();
        $input['interview_id'] = $interview_id;
        
        $person_id = $this->model_survay->saveNeed($input);

        if (!empty($input['job_id'])){
            $session->setFlashdata("message", "แก้ไขข้อมูลเรียบร้อย");
        }else{
            $session->setFlashdata("message", "บันทึกข้อมูลเรียบร้อย");
        }

        return redirect()->to('survay/need/'.$interview_id);
    }

    public function picture($interview_id){
        $data['interview_id'] = $interview_id;
        // $data['data'] = $this->model_survay->getNeed($interview_id);
        return view('Modules\Survay\Views\picture',$data);
    }
}