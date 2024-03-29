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
        $model_common = new Common_model();
        // /search
        $data['search'] = $this->request->getGet();
        if (!empty($data['search'])){
          
            if (!empty($data['search']['interview_user'])){
                // $builder->where('LH_interview_land.interview_user',$data['search']['interview_year']);
                $data['data_search']['user'] = $model_common->searchUser('',$data['search']['interview_user']);       
            }
            if (!empty($data['search']['interview_project'])){
                // $builder->where('LH_interview_land.interview_project',$data['search']['interview_project']);
            }          
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

        $data['projects_type'] = $this->model_api->getProjectType();
        $data['projects'] = $model_common->getProject();

        $data['data'] = $this->model_survay->getAllSurvay('',$data['search']);
        return view('Modules\Survay\Views\index',$data);
    }
    
    public function manage($interview_id = ''){

        $model_user = new User_model();
        $model_land = new Land_model();
        $model_house = new House_model();
        $model_interview = new InterViewHouse_model();
        $model_common = new Common_model();
          
        // find land code
        $data['land_code'] = $this->request->getGet('land_code');

        $data['interview_id'] = $interview_id;
        
        $data['projects_type'] = $this->model_api->getProjectType();
        $data['projects'] = $model_common->getProject();

        $data['privileges'] = $this->model_api->getLandprivilege();
        // $data['persons']= $model_common->getAllPersons();
      
        $data['villages'] = [];
        $data['persons'] = [];
        
        // auto load
        if (!empty($data['land_code'])){            
            $projects = $model_common->getLand('',$data['land_code']);            
            if (!empty($projects)){
                $data['projects'] = $projects;
                if (!empty($projects[0]['land_holding'])){
                    $data['privileges'] = $this->model_api->getLandprivilege($projects[0]['land_holding']);
                }
                
                if (!empty($projects[0]['person_id'])){                    
                    $data['persons'] = $model_common->searchPerson([],$projects[0]['person_id']);                    
                }
                
            }

            
           
        }
      
  
        if ($interview_id){
            
            $data['data'] = $this->model_survay->getSurvay($interview_id);
            
            $data['data']['interview_date'] = $this->date_thai->date_eng2thai($data['data']['interview_date'],543,'','','/');
            $data['villages'] = $model_common->getVillage('',$data['data']['interview_project']);            
            // $data['persons']= $model_common->getAllPersons($data['data']['interview_house_id']);
            $data['users']= $model_common->searchUser('',$data['data']['interview_user']);
    
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

        $data['support'] = $this->model_api->getHrdiSupport();

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

        // $data['org'] = $this->model_api->getHrdiSupport();
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
        $data['support'] = $this->model_api->getDepartment();
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
        $data['product_type'] = $this->model_api->getProductType();
        $data['product_group'] =  $this->model_api->getProductGroup();
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
        $model_common = new Common_model();
        $data['product_sale'] = $model_common->getProductSale();
        

        
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
        
        try {
            $name =   $img->getName();
            $filepath = FCPATH.'public/' .'/uploads/owners/'; 
            $img->move($filepath,$name);
            $data = [
                'interview_id'=> $id,
                'photo_path'=> '/public/uploads/owners/'.$name,
                'photo'=> $name,
                'photo_type' =>"owner"
                
            ];  
            $res = $this->model_survay->savePicture($data);
            return   $this->respond($data);
        } catch (\Throwable $th) {
            $data = ['errors' => 'The file has already been moved.'];
            return   $this->respond($data);
        }
       
    }

    public function uploadArea($id = ''){
        $img = $this->request->getFile('file');
        
        // print_r($img->hasMoved());die();
        try {
            $name =   $img->getName();
            $filepath = FCPATH.'public/' .'/uploads/area/'; 
            $img->move($filepath,$name);
            $data = [
                'interview_id'=> $id,
                'photo_path'=> '/public/uploads/area/'.$name,
                'photo'=> $name,
                'photo_type' =>"area"
                
            ];  
            $res = $this->model_survay->savePicture($data);
            return   $this->respond($data);
        } catch (\Throwable $th) {
            $data = ['errors' => 'The file has already been moved.'];
            return   $this->respond($data);
        }
    
  
        // if ($img->isValid()) {
        //     $name =   $img->getName();
        //     $filepath = PUBLIC_PATH .'/uploads/area/'; 
        //     $img->move($filepath,$name);
        //     $data = [
        //         'interview_id'=> $id,
        //         'photo_path'=> '/public/uploads/area/'.$name,
        //         'photo'=> $name,
        //         'photo_type' =>"area"
                
        //     ];  
        //     $res = $this->model_survay->savePicture($data);
        //     return   $this->respond($data);
        // } else {     
        //     print_r($file->getErrorString());die();   
        //     $data = ['errors' => 'The file has already been moved.'];
        //     return   $this->respond($data);
        // }
    }


    public function deleteSurvay($id){
        
        $res = $this->model_survay->deleteSurvay($id);
        return   $this->respond($res);
    }

    public function deleteSupport($id){
        
        $res = $this->model_survay->deleteSupport($id);
        return   $this->respond($res);
    }

    public function deleteSupportOther($id){
        
        $res = $this->model_survay->deleteSupportOther($id);
        return   $this->respond($res);
    }

    public function deleteProblem($id){
        
        $res = $this->model_survay->deleteProblem($id);
        return   $this->respond($res);
    }

    public function deleteNeed($id){
        
        $res = $this->model_survay->deleteNeed($id);
        return   $this->respond($res);
    }


    //remove item land
    public function deleteLandProduct($id){
        $res = $this->model_survay->deleteLandProduct($id);
        return   $this->respond($res);
    }

    public function deleteImage($id){
        $filename = $this->request->getVar('filename');
        $res = $this->model_survay->deleteImage($filename);
        return   $this->respond($res);
    }
    

    

    
}