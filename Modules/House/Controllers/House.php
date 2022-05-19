<?php

namespace Modules\House\Controllers;

use App\Models\Common_model;
use Modules\Api\Models\Api_model;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\InterViewHouse_model;
use Modules\House\Models\House_model;

class House extends BaseController
{
    use ResponseTrait;

    protected $model_house;
    protected $model_interview_house;
    protected $model_api;
    protected $model_common;

    public function __construct()
    {
        $this->model_house = new House_model();
        $this->model_api = new Api_model();
        $this->model_interview_house = new InterViewHouse_model();
        $this->model_common = new Common_model();
    }

    public function index(){
        $data = [];
        $data['data'] = $this->model_house->getAllHousePaginate(10,'page');
        $data['pager'] = $this->model_house->pager;

        
        
        
        return view('Modules\House\Views\index',$data);
    }
    
    public function manage($id = null){
        
        $data = [];
        $data['house_id'] = $id;
        $data['landomner'] = $this->model_api->getLandOwner();
        $data['province'] = $this->model_common->getProvince();
        $data['villages'] = $this->model_common->getVillage();
        $data['amphurs'] = [];
        $data['tambons'] = [];
       
        if ($id){
            $data['data'] = $this->model_house->getAllHouse($id);            
            $data['amphurs'] = $this->model_common->getAmphur($data['data']['house_province']);
            $data['tambons'] = $this->model_common->getTambon($data['data']['house_district']);
            
              
        }

        return view('Modules\House\Views\manage',$data);
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
     
        return redirect()->to('house/manage/'.$house_id);
    }

    public function members($house_id ,$id = null){
        $data = [];
        $data['house_id'] = $house_id;    
        

        $data['data'] = $this->model_house->getAllHouseMembers($house_id,$id);

        return view('Modules\House\Views\members', $data);
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

        return redirect()->to('house/members/'.$house_id);
        
    }

    public function jobs($house_id ,$id = null){
        $data['house_id'] = $house_id;        
        $data['data'] = $this->model_house->getAllHouseJob($house_id,$id);
  
        return view('Modules\House\Views\jobs', $data);
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

        return redirect()->to('house/jobs/'.$house_id);
        
    }

    public function income($house_id ,$id = null){
        $data['house_id'] = $house_id;
        $data['data'] = $this->model_house->getAllHouseIncome($house_id,$id);
        
        return view('Modules\House\Views\income', $data);
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

        return redirect()->to('house/income/'.$house_id);
        
    }

    public function outcome($house_id ,$id = null){
        $data['house_id'] = $house_id;

        $data['data'] = $this->model_house->getAllHouseOutcome($house_id,$id);

        return view('Modules\House\Views\outcome', $data);
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

        return redirect()->to('house/outcome/'.$house_id);
        
    }

    public function loadJobs($id){
        $data = [];
        
        $data['jobs'] = $this->model_api->getJobs();
        $data['products'] = $this->model_api->getproduct();
        $data['data'] = $this->model_house->getPersonJobs($id);
        $html =  view('Modules\House\Views\modal\jobs', $data);
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
        

        $html =  view('Modules\House\Views\modal\member', $data);
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


    //delete data 
    public function deleteHouse($id){
        $res = $this->model_house->deleteHouse($id);
        return   $this->respond($res);
    }

    public function deleteMember($id){
        $res = $this->model_house->deleteMember($id);
        return   $this->respond($res);
    }
    
    
}