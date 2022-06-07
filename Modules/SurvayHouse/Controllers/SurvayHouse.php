<?php

namespace Modules\SurvayHouse\Controllers;

use App\Models\Common_model;
use Modules\Api\Models\Api_model;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use Modules\Land\Models\Land_model;
use Modules\User\Models\User_model;
use App\Models\InterViewHouse_model;
use Modules\SurvayHouse\Models\Interview_house_model;


class SurvayHouse extends BaseController
{
    use ResponseTrait;

    protected $model_house;
    protected $model_interview_house;
    protected $model_api;
    protected $model_common;

    public function __construct()
    {
        $this->model_house = new Interview_house_model();
        $this->model_api = new Api_model();
        $this->model_interview_house = new InterViewHouse_model();
        $this->model_common = new Common_model();
    }

    public function index(){
        $data = [];
        $model_user = new User_model();
        $model_land = new Land_model();
        
        $data['amphur'] = [];
        $data['tambon'] = [];
        $data['village'] = [];

        // /search
        $data['search'] = $this->request->getGet();
        if (!empty($data['search'])){
          
            if (!empty($data['search']['interview_user'])){                
                $data['data_search']['user'] = $this->model_common->searchUser('',$data['search']['interview_user']);       
            }
            if (!empty($data['search']['interview_project'])){
                // $builder->where('LH_interview_land.interview_project',$data['search']['interview_project']);
            }          
            if (!empty($data['search']['interview_house_id'])){        
                $data['data_search']['house'] = $this->model_common->searchHouse('',$data['search']['interview_house_id']);               
            }
            if (!empty($data['search']['interview_person_id'])){            
                $data['data_search']['person'] = $this->model_common->searchPerson('',$data['search']['interview_person_id']);       
            }
            if (!empty($data['search']['interview_code'])){
                $data['data_search']['land'] = $this->model_common->searchLand('',$data['search']['interview_code']);  
            }

            if (!empty($data['search']['province'])){                
                $data['amphur'] = $this->model_common->getAmphur($data['search']['province']);       
            }      
            if (!empty($data['search']['amphur'])){                
                $data['tambon'] = $this->model_common->getTambon($data['search']['amphur'],$data['search']['province']);      
            }      
            if (!empty($data['search']['tambon'])){                
                $data['village'] = $this->model_common->getVillages($data['search']['tambon'],$data['search']['amphur'],$data['search']['province']);      
            }         
        }

        $data['province'] = $this->model_common->getProvince();
        $data['projects'] = $this->model_api->getProject();
        
        $data['data'] = $this->model_house->getAllInterviewHousePaginate(10,'page',$data['search']);
        $data['pager'] = $this->model_house->pager;
        return view('Modules\SurvayHouse\Views\index',$data);
    }
    
    public function manage($id = null){
        
        $data = [];
        $data['house_id'] = $id;
        $data['landomner'] = $this->model_api->getLandOwner();
        $data['projects'] = $this->model_api->getProject();
        $data['projects_type'] = $this->model_api->getProjectType();
        
        $data['province'] = $this->model_common->getProvince();
        $data['village'] = $this->model_common->getVillage();
        $data['amphurs'] = [];
        $data['tambons'] = [];
        $data['villages'] = [];
       
        if ($id){
            $data['data'] = $this->model_house->getAllHouse($id);            
            $data['amphurs'] = $this->model_common->getAmphur($data['data']['house_province']);
            $data['tambons'] = $this->model_common->getTambon($data['data']['house_district'],$data['data']['house_province']);
            $data['villages'] = $this->model_common->getVillages($data['data']['house_subdistrict'],$data['data']['house_district'],$data['data']['house_province']);
            
              
        }

        return view('Modules\SurvayHouse\Views\manage',$data);
    }

    public function saveManage(){
        $input = $this->request->getPost();
           
        $session = session();
        
        if (!empty($input)){
            // insert house
            $data_house = $input;
            unset($data_house['interview_project']);
            unset($data_house['interview_project_name']);
            unset($data_house['interview_year']);
            unset($data_house['interview_id']);
            $house_id = $this->model_house->saveHouseManage($data_house);
        
            //insert interview house
            if ($house_id){
                $data_interview = [
                    'interview_id' => $input['interview_id'],
                    'interview_project' => $input['interview_project'],
                    'interview_project_name' => $input['interview_project_name'],
                    'interview_year' => $input['interview_year'],
                    'interview_house' => $house_id,
                ];
                $this->model_interview_house->saveInterViewHouse($data_interview);
            }

            if (!empty($input['house_id'])){
                $session->setFlashdata("message", "แก้ไขข้อมูลเรียบร้อย");
            }else{
                $session->setFlashdata("message", "บันทึกข้อมูลเรียบร้อย");
            }
            
        }
     
        return redirect()->to('survay_house/manage/'.$house_id);
    }

    public function members($house_id ,$id = null){
        $data = [];
        $data['house_id'] = $house_id;    
        

        $data['data'] = $this->model_house->getAllHouseMembers($house_id,$id);

        return view('Modules\SurvayHouse\Views\members', $data);
    }

    public function saveMembers($house_id){
        $input = $this->request->getPost();
        $session = session();
        $input['house_id'] = $house_id;
        $input['person_birthdate'] = $this->date_thai->date_thai2eng($input['person_birthdate'],-543);
        $person_id = $this->model_house->saveHouseMember($input);

        if (!empty($input['person_id'])){
            $session->setFlashdata("message", "แก้ไขข้อมูลเรียบร้อย");
        }else{
            $session->setFlashdata("message", "บันทึกข้อมูลเรียบร้อย");
        }

        return redirect()->to('survay_house/members/'.$house_id);
        
    }

    public function jobs($house_id ,$id = null){
        $data['house_id'] = $house_id;        
        $data['data'] = $this->model_house->getAllHouseJob($house_id,$id);
  
        return view('Modules\SurvayHouse\Views\jobs', $data);
    }
    
    public function saveJobs($house_id){
        $input = $this->request->getPost();
        
        $session = session();
        $input['house_id'] = $house_id;
        
        $person_id = $this->model_house->saveHouseJobs($input);

        if (!empty($input['job_id'])){
            $session->setFlashdata("message", "แก้ไขข้อมูลเรียบร้อย");
        }else{
            $session->setFlashdata("message", "บันทึกข้อมูลเรียบร้อย");
        }

        return redirect()->to('survay_house/jobs/'.$house_id);
        
    }

    public function income($house_id ,$id = null){
        $data['house_id'] = $house_id;
        $data['data'] = $this->model_house->getAllHouseIncome($house_id,$id);
        
        return view('Modules\SurvayHouse\Views\income', $data);
    }

    public function saveIncome($house_id){
        $input = $this->request->getPost();
        $session = session();
        $input['house_id'] = $house_id;
        
        $person_id = $this->model_house->saveHouseIncome($input);

        if (!empty($input['person_id'])){
            $session->setFlashdata("message", "แก้ไขข้อมูลเรียบร้อย");
        }else{
            $session->setFlashdata("message", "บันทึกข้อมูลเรียบร้อย");
        }

        return redirect()->to('survay_house/income/'.$house_id);
        
    }

    public function outcome($house_id ,$id = null){
        $data['house_id'] = $house_id;

        $data['data'] = $this->model_house->getAllHouseOutcome($house_id,$id);

        return view('Modules\SurvayHouse\Views\outcome', $data);
    }

    public function saveOutcome($house_id){
        $input = $this->request->getPost();
        $session = session();
        $input['house_id'] = $house_id;
       
        $person_id = $this->model_house->saveHouseOutcome($input);

        if (!empty($input['person_id'])){
            $session->setFlashdata("message", "แก้ไขข้อมูลเรียบร้อย");
        }else{
            $session->setFlashdata("message", "บันทึกข้อมูลเรียบร้อย");
        }

        return redirect()->to('survay_house/outcome/'.$house_id);
        
    }

    public function loadJobs($id){
        $data = [];
        
        $data['jobs'] = $this->model_api->getJobs();
        $data['product_type'] = $this->model_api->getProductType();
        $data['products'] = $this->model_api->getproduct();
        $data['data'] = $this->model_house->getPersonJobs($id);
        
        $html =  view('Modules\SurvayHouse\Views\modal\jobs', $data);
        return $this->respond($html);
    }

    public function loadmembers($house_id,$id = ''){
        $data = [];
        
        $data['tribes'] = $this->model_api->getTribe();
        $data['educations'] = $this->model_api->getEducation();
        $data['religion'] = $this->model_api->getReligion();
        $data['publichealth'] = $this->model_api->getPublicHealth();
        $data['hospital'] = $this->model_api->getHospital();
        $data['prename'] = $this->model_api->getPrefix();
        
        if ($id != ''){
            $data['data'] = $this->model_house->getHouseMembers($id);
            $data['data']['person_birthdate'] = $this->date_thai->date_eng2thai($data['data']['person_birthdate'],543,'','','/');            
        }
        

        $html =  view('Modules\SurvayHouse\Views\modal\member', $data);
        return $this->respond($html);
    }

    public function loadIncome($id){
        $data['data'] = $this->model_house->getPersonIncome($id);
        return $this->respond($data);
    }

    public function loadOutcome($id){
        $data['data'] = $this->model_house->getPersonOutcome($id);
        return $this->respond($data);
    }

    public function jobdetails($id){
        $data['data'] = $this->model_house->getJobdetails($id);
        return $this->respond($data);
    }

    //delete data 
    public function deleteHouse($id){
        $res = $this->model_house->deleteHouse($id);
        return   $this->respond($res);
    }

    public function deleteMember($id){
        $res = $this->model_house->deleteMember($id);
        return   $this->respond($res);
    }

    public function deleteJobs($id){
        $res = $this->model_house->deleteJobs($id);
        return   $this->respond($res);
    }

    
    
    
}