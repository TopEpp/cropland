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
        $data['persons']= $model_common->getAllPersons();
        if ($interview_id){
            
            $data['data'] = $this->model_survay->getAllSurvay($interview_id);
            $data['data']['interview_date'] = $this->date_thai->date_eng2thai($data['data']['interview_date'],543,'','','/');            
            $data['villages'] = $model_common->getVillage('',$data['data']['interview_project']);            
            $data['persons']= $model_common->getAllPersons($data['data']['interview_house_id']);
    
        }
        
        return view('Modules\Survay\Views\manage',$data);
    }

    public function saveManage(){
        $input = $this->request->getPost();
    
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
        $result = $this->model_survay->getSurvayLand($interview_id);
        if (!empty($result['data'])){     
            foreach ($result['data'] as $key => $value) {                
                $result['data'][$value['detail_id']]['detail_start_date'] = $this->date_thai->date_eng2thai($value['detail_start_date'],543,'','','/');            
            }
            $data['data'] =$result['data'];
        }else{
            $data['data'] =[];
        }
       
        
        return view('Modules\Survay\Views\land',$data);
    }

    public function saveLand($interview_id){
        $input = $this->request->getPost();
        
        $session = session();
        $input['interview_id'] = $interview_id;
        $input['detail_start_date'] = !empty($input['detail_start_date']) ?  $this->date_thai->date_thai2eng($input['detail_start_date'],-543) :'';
        $input['detail_finish_date'] = !empty($input['detail_finish_date']) ? $this->date_thai->date_thai2eng($input['detail_finish_date'],-543) : '';
        $input['detail_keep_start_date'] = !empty($input['detail_keep_start_date']) ?  $this->date_thai->date_thai2eng($input['detail_keep_start_date'],-543) : '';
        $input['detail_keep_finish_date'] = !empty($input['detail_keep_finish_date'])  ? $this->date_thai->date_thai2eng($input['detail_keep_finish_date'],-543) : '';
       
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

        $data['support'] = $this->model_api->getWantSupport();

        $data['data'] = $this->model_survay->getSupports($interview_id);
        return view('Modules\Survay\Views\support',$data);
    }

    public function saveSupport($interview_id){
        $input = $this->request->getPost();

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

        $data['org'] = $this->model_api->getDepartment();
        
        $data['data'] = $this->model_survay->getSupportsOther($interview_id);
        return view('Modules\Survay\Views\support_other',$data);
    }


    public function saveSupportOther($interview_id){
        $input = $this->request->getPost();
      
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

        $data['problem'] = $this->model_api->getProblemType();

        $data['data'] = $this->model_survay->getProblem($interview_id);
        
        
        return view('Modules\Survay\Views\problem',$data);
    }

    public function saveSurvayProblem($interview_id){
        $input = $this->request->getPost();
      
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
        $data['support'] = $this->model_api->getWantSupport();
        $data['data'] = $this->model_survay->getNeed($interview_id);
        return view('Modules\Survay\Views\need',$data);
    }

    public function saveSurvayNeed($interview_id){
        $input = $this->request->getPost();
      
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

    public function loadland($interview_id = '',$id = ''){
        $data = [];

        if ($id != ''){
            $data['result']  = $this->model_survay->getSurvayLand($interview_id,$id);            
            $data['result']['data']['detail_start_date'] =  $data['result']['data']['detail_start_date'] != '' ? $this->date_thai->date_eng2thai($data['result']['data']['detail_start_date'],543,'','','/') : ''; 
            $data['result']['data']['detail_finish_date'] = $data['result']['data']['detail_finish_date'] != '' ? $this->date_thai->date_eng2thai($data['result']['data']['detail_finish_date'],543,'','','/') : ''; 
            $data['result']['data']['detail_keep_start_date'] = $data['result']['data']['detail_keep_start_date'] != '' ?  $this->date_thai->date_eng2thai($data['result']['data']['detail_keep_start_date'],543,'','','/') : ''; 
            $data['result']['data']['detail_keep_finish_date'] = $data['result']['data']['detail_keep_finish_date'] != '' ?  $this->date_thai->date_eng2thai($data['result']['data']['detail_keep_finish_date'],543,'','','/') : ''; 
            

        }
        $data['landuse'] =  $this->model_api->getLandUse();
        $data['products'] = $this->model_api->getproduct();
        $data['units'] = $this->model_api->getUnit();

        $data['chemical_formula'] = $this->model_api->getChemicalFormula();
        $data['chemical'] = $this->model_api->getChemical();

        $data['medical_type'] = $this->model_api->getMedicalType();
        $data['medical'] = $this->model_api->getMedica(1); //1,2,3

        $data['hormone'] = $this->model_api->getMedica(4);

        $data['employ_type'] = $this->model_api->getEmployType();
        $data['labor_type'] = $this->model_api->getLaborType();

        $data['markets'] = $this->model_api->getMarket();

        
        // $data['data'] = $this->model_house->getPersonJobs($id);
        $html =  view('Modules\Survay\Views\modal\land', $data);
        return $this->respond($html);
    }

    public function loadImage(){
        $interview = $this->request->getVar('interview');
        $type = $this->request->getVar('type');

        $data = [];
        if ($interview){
            $data = $this->model_survay->getPicture($interview,$type);     
            $tmp = [];
            foreach ($data as $key => $value) {
                
                $tmp[$key]['path'] = base_url($value['photo_path']);
                $tmp[$key]['name'] = $value['photo'];
                $tmp[$key]['size'] =  filesize( ROOTPATH.$value['photo_path']);
            }
            
        }

        return   $this->respond($tmp);

    }
    public function uploadOwnerArea($id = ''){
        $img = $this->request->getFile('file');
        
        if ($img->isValid() && ! $img->hasMoved()) {
            $name =   $img->getName();
            $filepath = PUBLIC_PATH .'/uploads/owners/'; 
            $img->move($filepath,$name);
            $data = [
                'interview_id'=> $id,
                'photo_path'=> '/public/uploads/area/'.$name,
                'photo'=> $name,
                'photo_type' =>"owner"
                
            ];  

            $res = $this->model_survay->savePicture($data);
            return   $this->respond($data);
        } else {        
            $data = ['errors' => 'The file has already been moved.'];
            return   $this->respond($data);
        }     
       
    }

    public function uploadArea($id = ''){
        $img = $this->request->getFile('file');
        
        if ($img->isValid() && ! $img->hasMoved()) {
            $name =   $img->getName();
            $filepath = PUBLIC_PATH .'/uploads/area/'; 
            $img->move($filepath,$name);
            $data = [
                'interview_id'=> $id,
                'photo_path'=> '/public/uploads/area/'.$name,
                'photo'=> $name,
                'photo_type' =>"area"
                
            ];  
            $res = $this->model_survay->savePicture($data);
            return   $this->respond($data);
        } else {        
            $data = ['errors' => 'The file has already been moved.'];
            return   $this->respond($data);
        }
    }
}