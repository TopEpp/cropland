<?php

namespace App\Controllers;

use CodeIgniter\Files\File;
use App\Models\Common_model;
use Modules\Api\Models\Api_model;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;

use App\Models\InterViewHouse_model;
use Modules\House\Models\House_model;

// ini_set('memory_limit','256M'); // This also needs to be increased in some cases. Can be changed to a higher value as per need)
ini_set('sqlsrv.ClientBufferMaxKBSize','524288'); // Setting to 512M
ini_set('pdo_sqlsrv.client_buffer_max_kb_size','524288'); // Setting to 512M - for pdo_sqlsrv

class Common extends BaseController
{
    use ResponseTrait;

    protected $model_common;
    

    public function __construct()
    {
        $this->model_common = new Common_model();
    }


    public function amphur(){
        $province = $this->request->getVar('province');
        
        $amphur = $this->model_common->getAmphur($province);
     
        $data = '';
        foreach ($amphur as $key => $value) {
           $data .= "<option value='".$value['AMP_CODE']."'>".$value['AMP_T']."</option>";
        }
        
        return   $this->respond($data);
    }

    public function tambon(){
        $amphur = $this->request->getVar('amphur');
        $province = $this->request->getVar('province');
        
        $tambon = $this->model_common->getTambon($amphur,$province);
     
        $data = '';
        foreach ($tambon as $key => $value) {
           $data .= "<option value='".$value['TAM_CODE']."'>".$value['TAM_T']."</option>";
        }
        
        return   $this->respond($data);
    }

    public function villages(){
        $tambon = $this->request->getVar('tambon');
        $amphur = $this->request->getVar('amphur');
        $province = $this->request->getVar('province');
        
        $village = $this->model_common->getVillages($tambon,$amphur,$province);
     
        $data = '';
        foreach ($village as $key => $value) {
           $data .= "<option value='".$value['VILL_CODE']."'>".$value['VILL_T']."</option>";
        }
        
        return   $this->respond($data);
    }

    //new load house tamplate 
    public function Projects(){
        $project_type = $this->request->getVar('project_type');
        $result = $this->model_common->getProject($project_type);
     
        $data = '';
        $data .= "<option value=''>เลือก</option>";
        foreach ($result as $key => $value) {
           $data .= "<option value='".$value['Code']."'>".$value['Name']."</option>";
        }
        
        return   $this->respond($data);
    }

    public function projectVillages(){
        $project = $this->request->getVar('project');
        
        $village = $this->model_common->getProjectVillages($project);
     
        $data = '';
        $data .= "<option value=''>เลือก</option>";
        foreach ($village as $key => $value) {
           $data .= "<option value='".$value['Code']."'>".$value['Name']."</option>";
        }
        
        return   $this->respond($data);
    }

    public function projectAddress(){
        $village = $this->request->getVar('village');
        $project = $this->request->getVar('project');
        $type = $this->request->getVar('type'); 
        
        
        $address = $this->model_common->getProjectAddress($village,$project,$type);
        return   $this->respond($address);
    }

    
    
    public function House(){
        $interview = $this->request->getVar('interview');
        $model_house = new InterViewHouse_model();
        $houses = $model_house->getAllInterViewsProject($interview);
        $data ='';
        foreach ($houses as $key => $value) {
            $data .= "<option value='".$value['house_id']."'>".$value['house_number']."</option>";
         }
         
         return   $this->respond($data);

    }

    public function Person(){
        $house = $this->request->getVar('house');
   
        $data ='';
        if ($house){            
            $persons = $this->model_common->getAllPersons($house);
            foreach ($persons as $key => $person) {
                foreach ($person as $key => $value) {
                    // if ($value['person_header'] == 1){
                        $data .= "<option value='".$value['person_id']."'>".$value['name'].$value['person_name'].' '.$value['person_lastname']."</option>";
                    // }s 
                }
            }
            
            return   $this->respond($data);
        }
        return   $this->respond($data);
        
      

    }

    public function Village(){
        $project = $this->request->getVar('project');
        $village = $this->model_common->getVillage('',$project);
        
        $data = '';
        foreach ($village as $key => $value) {
           $data .= "<option value='".$value['Code']."'>".$value['Name']."</option>";
        }
        
        return   $this->respond($data);
    }

    public function Land(){
        $land = $this->request->getVar('land');
        $lands = $this->model_common->getLand($land);
        $result = [];
        
        $result['status'] = false;
        if (!empty($lands)){
            $data = '<option value="">เลือก</option>';
            foreach ($lands as $key => $value) {
               $data .= "<option value='".$value['Code']."'>".$value['Description'].'/'.$value['Name']."</option>";        
            }
            $result['options'] = $data;
            $result['status'] = true ;
        }
        
        return   $this->respond($result);
    }


    public function personAddress(){
        $person = $this->request->getVar('person');
        $data = $this->model_common->personAddress($person);
        return   $this->respond($data);
    }

    public function getProductType(){
        $group = $this->request->getVar('group');
        
        $product = $this->model_common->getProductType($group);
        
        $data = '';
        foreach ($product as $key => $value) {
           $data .= "<option value='".$value['Code']."'>".$value['Name']."</option>";
        }
        
        return   $this->respond($data);
    }

    public function getProduct(){
        $group = $this->request->getVar('type');
        
        $product = $this->model_common->getProduct($group);
        
        $data = '';
        foreach ($product as $key => $value) {
           $data .= "<option value='".$value['Code']."'>".$value['Name']."</option>";
        }
        
        return   $this->respond($data);
    }

    public function getDressing(){
        $group = $this->request->getVar('id');
        
        $product = $this->model_common->getDressing($group);
        
        $data = '';
        foreach ($product as $key => $value) {
           $data .= "<option value='".$value['Code']."'>".$value['Name']."</option>";
        }
        
        return   $this->respond($data);
    }


    //select2 load ajax
    public function searchPerson(){
        $search = $this->request->getVar('q');
        $data = $this->model_common->searchPerson($search);
        return   $this->respond($data);
    }

    public function searchLand(){
        $search = $this->request->getVar('q');
        $data = $this->model_common->searchLand($search);
        return   $this->respond($data);
    }

    public function searchUser(){
        $search = $this->request->getVar('q');
        $data = $this->model_common->searchUser($search);
        return   $this->respond($data);
    }

    public function searchHouse(){
        $search = $this->request->getVar('q');
        $data = $this->model_common->searchHouse($search);
        return   $this->respond($data);
    }

    public function searchProvince(){
        $search = $this->request->getVar('q');
        $data = $this->model_common->searchProvince($search);
        return   $this->respond($data);
    }

    public function searchAmphur(){
        $search = $this->request->getVar('q');
        $data = $this->model_common->searchAmphur($search);
        return   $this->respond($data);
    }

    public function searchTambon(){
        $search = $this->request->getVar('q');
        $data = $this->model_common->searchTambon($search);
        return   $this->respond($data);
    }

    public function searchVillage(){
        $search = $this->request->getVar('q');
        $data = $this->model_common->searchVillage($search);
        return   $this->respond($data);
    }

    

    

    
}