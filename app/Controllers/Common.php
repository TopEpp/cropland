<?php

namespace App\Controllers;

use App\Models\Common_model;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\InterViewHouse_model;
use Modules\House\Models\House_model;


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
           $data .= "<option value='".$value['amp_code']."'>".$value['amp_name_t']."</option>";
        }
        
        return   $this->respond($data);
    }

    public function tambon(){
        $amphur = $this->request->getVar('amphur');
        $tambon = $this->model_common->getTambon($amphur);
     
        $data = '';
        foreach ($tambon as $key => $value) {
           $data .= "<option value='".$value['tam_code']."'>".$value['tam_name_t']."</option>";
        }
        
        return   $this->respond($data);
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
}