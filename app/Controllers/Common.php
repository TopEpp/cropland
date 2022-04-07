<?php

namespace App\Controllers;

use App\Models\Common_model;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;


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
    
}