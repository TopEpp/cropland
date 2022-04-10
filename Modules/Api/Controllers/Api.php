<?php

namespace Modules\Api\Controllers;

use App\Controllers\BaseController;
use Modules\Api\Models\Api_model;

class Api extends BaseController
{
    protected $model_api;

    public function __construct()
    {
        $this->model_api = new Api_model();        
    }

    public function index(){
        return view('Modules\Api\Views\index');
    }

    public function manage($type){
        if($type=='agriWork'){
            $data['label'] = 'ประเภทแรงงาน';
            $data['table'] = 'LH_agriwork';
            $data['input_id'] = 'agriwork_id';
            $data['input_name'] = 'name';
        }else if($type=='diseaseGroup'){
            $data['label'] = 'ประเภทโรคประจำตัว';
            $data['table'] = 'LH_diseasegroup';
            $data['input_id'] = 'disease_group_id';
            $data['input_name'] = 'disease_group_name';
        }else if($type=='education'){
            $data['label'] = 'ระดับการศึกษา';
            $data['table'] = 'LH_education';
            $data['input_id'] = 'education_id';
            $data['input_name'] = 'name';
        }else if($type=='expenses'){
            $data['label'] = 'ประเภทรายจ่าย';
            $data['table'] = 'LH_expenses';
            $data['input_id'] = 'expenses_id';
            $data['input_name'] = 'name';
        }else if($type=='hospital'){
            $data['label'] = 'สถานพยาบาล';
            $data['table'] = 'LH_hospital';
            $data['input_id'] = 'hospital_id';
            $data['input_name'] = 'name';
        }else if($type=='jobsGroup'){
            $data['label'] = 'ประเภทกลุ่มอาชีพ';
            $data['table'] = 'LH_jobsgroup';
            $data['input_id'] = 'jobs_group_id';
            $data['input_name'] = 'jobs_group_name';
        }else if($type=='landOwner'){
            $data['label'] = 'ประเภทที่พักอาศัย';
            $data['table'] = 'LH_landowner';
            $data['input_id'] = 'landowner_id';
            $data['input_name'] = 'name';
        }else if($type=='problemType'){
            $data['label'] = 'ประเภทปัญหา';
            $data['table'] = 'LH_problemtype';
            $data['input_id'] = 'problemtype_id';
            $data['input_name'] = 'name';
        }else if($type=='product'){
            $data['label'] = 'ประเภทผลผลิต';
            $data['table'] = 'LH_product';
            $data['input_id'] = 'product_id';
            $data['input_name'] = 'name';
        }else if($type=='publicHealth'){
            $data['label'] = 'ประเภทสิทธิ์การรักษาพยาบาล';
            $data['table'] = 'LH_publichealth';
            $data['input_id'] = 'publichealth_id';
            $data['input_name'] = 'name';
        }else if($type=='religion'){
            $data['label'] = 'ศาสนา';
            $data['table'] = 'LH_religion';
            $data['input_id'] = 'religion_id';
            $data['input_name'] = 'name';
        }else if($type=='tribe'){
            $data['label'] = 'ชนเผ่า';
            $data['table'] = 'LH_tribe';
            $data['input_id'] = 'tribe_id';
            $data['input_name'] = 'name';
        }else if($type=='landUse'){
            $data['label'] = 'ประเภทการใช้ประโยชน์ที่ดิน';
            $data['table'] = 'LH_landuse';
            $data['input_id'] = 'landuse_id';
            $data['input_name'] = 'name';
        }else if($type=='landprivilege'){
            $data['label'] = 'ประเภทเอกสิทธิ์ที่ดิน';
            $data['table'] = 'LH_landprivilege';
            $data['input_id'] = 'landprivilege_id';
            $data['input_name'] = 'name';
        }else if($type=='location'){
            $data['label'] = 'พื้นที่';
            $data['table'] = 'LH_location';
            $data['input_id'] = 'location_id';
            $data['input_name'] = 'name';
        }

         $data['data'] =  $this->model_api->getData( $data['table'],$data['input_id']);

        
        return view('Modules\Api\Views\manage',$data);
    }

    public function saveData(){
        $input = $this->request->getVar();
        $res =  $this->model_api->saveData($input);
        return $res;
    }

    public function deleteData($table,$key,$id){
        $res =  $this->model_api->deleteData($table,$key,$id);
        return $res;
    }


    public function areaTarget(){
        $data['data'] =  $this->model_api->getAreaTarget();
        return view('Modules\Api\Views\areaTarget',$data);
    }

    public function jobs(){
        $data['data'] =  $this->model_api->getJobs();
        $data['group'] =  $this->model_api->getJobsGroup();
        $data['label'] = 'ประเภทอาชีพ';
        $data['table'] = 'LH_jobs';
        $data['input_id'] = 'jobs_id';
        $data['input_name'] = 'name';
        
        return view('Modules\Api\Views\jobs',$data);
    }



}