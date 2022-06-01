<?php

namespace Modules\Api\Controllers;

use App\Controllers\BaseController;
use Modules\Api\Models\Api_model;
use Modules\User\Models\user_model;

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
        // if($type=='agriWork'){
        //     $data['label'] = 'ประเภทแรงงาน';
        //     $data['table'] = 'LH_agriwork';
        //     $data['input_id'] = 'agriwork_id';
        //     $data['input_name'] = 'name';
        // }else if($type=='diseaseGroup'){
        //     $data['label'] = 'ประเภทโรคประจำตัว';
        //     $data['table'] = 'LH_diseasegroup';
        //     $data['input_id'] = 'disease_group_id';
        //     $data['input_name'] = 'disease_group_name';
        // }else if($type=='education'){
        //     $data['label'] = 'ระดับการศึกษา';
        //     $data['table'] = 'LH_education';
        //     $data['input_id'] = 'education_id';
        //     $data['input_name'] = 'name';
        // }else if($type=='expenses'){
        //     $data['label'] = 'ประเภทรายจ่าย';
        //     $data['table'] = 'LH_expenses';
        //     $data['input_id'] = 'expenses_id';
        //     $data['input_name'] = 'name';
        // }else if($type=='hospital'){
        //     $data['label'] = 'สถานพยาบาล';
        //     $data['table'] = 'LH_hospital';
        //     $data['input_id'] = 'hospital_id';
        //     $data['input_name'] = 'name';
        // }else if($type=='jobsGroup'){
        //     $data['label'] = 'ประเภทกลุ่มอาชีพ';
        //     $data['table'] = 'LH_jobsgroup';
        //     $data['input_id'] = 'jobs_group_id';
        //     $data['input_name'] = 'jobs_group_name';
        // }else if($type=='landOwner'){
        //     $data['label'] = 'ประเภทที่พักอาศัย';
        //     $data['table'] = 'LH_landowner';
        //     $data['input_id'] = 'landowner_id';
        //     $data['input_name'] = 'name';
        // }else if($type=='problemType'){
        //     $data['label'] = 'ประเภทปัญหา';
        //     $data['table'] = 'LH_problemtype';
        //     $data['input_id'] = 'problemtype_id';
        //     $data['input_name'] = 'name';
        // }else if($type=='product'){
        //     $data['label'] = 'ประเภทผลผลิต';
        //     $data['table'] = 'LH_product';
        //     $data['input_id'] = 'product_id';
        //     $data['input_name'] = 'name';
        // }else if($type=='publicHealth'){
        //     $data['label'] = 'ประเภทสิทธิ์การรักษาพยาบาล';
        //     $data['table'] = 'LH_publichealth';
        //     $data['input_id'] = 'publichealth_id';
        //     $data['input_name'] = 'name';
        // }else if($type=='religion'){
        //     $data['label'] = 'ศาสนา';
        //     $data['table'] = 'LH_religion';
        //     $data['input_id'] = 'religion_id';
        //     $data['input_name'] = 'name';
        // }else if($type=='tribe'){
        //     $data['label'] = 'ชนเผ่า';
        //     $data['table'] = 'LH_tribe';
        //     $data['input_id'] = 'tribe_id';
        //     $data['input_name'] = 'name';
        // }else if($type=='landUse'){
        //     $data['label'] = 'ประเภทการใช้ประโยชน์ที่ดิน';
        //     $data['table'] = 'LH_landuse';
        //     $data['input_id'] = 'landuse_id';
        //     $data['input_name'] = 'name';
        // }else if($type=='landprivilege'){
        //     $data['label'] = 'ประเภทเอกสิทธิ์ที่ดิน';
        //     $data['table'] = 'LH_landprivilege';
        //     $data['input_id'] = 'landprivilege_id';
        //     $data['input_name'] = 'name';
        // }else if($type=='location'){
        //     $data['label'] = 'พื้นที่';
        //     $data['table'] = 'LH_location';
        //     $data['input_id'] = 'location_id';
        //     $data['input_name'] = 'name';
        // }

        if($type=='projectType'){
            $data['label'] = 'ประเภทโครงการ';
            $data['table'] = 'CODE_PROJECTTYPE';
            $data['input_id'] = 'Runno';
            $data['input_name'] = 'Name';
        }else if($type=='project'){
            $data['label'] = 'โครงการ';
            $data['table'] = 'CODE_PROJECT';
            $data['input_id'] = 'Runno';
            $data['input_name'] = 'Name';
        }else if($type=='productGroup'){
            $data['label'] = 'ประเภทการใช้ประโยชน์ที่ดิน';
            $data['table'] = 'CODE_PRODUCTGROUP';
            $data['input_id'] = 'Code';
            $data['input_name'] = 'Name';
        }else if($type=='productType'){
            $data['label'] = 'การใช้ที่ดิน';
            $data['table'] = 'CODE_PRODUCTTYPE';
            $data['input_id'] = 'Code';
            $data['input_name'] = 'Name';
        }else if($type=='product'){
            $data['label'] = 'พันธุ์';
            $data['table'] = 'CODE_PRODUCT';
            $data['input_id'] = 'Code';
            $data['input_name'] = 'Name';
        }else if($type=='chemicalType'){
            $data['label'] = 'ประเภทปุ๋ย';
            $data['table'] = 'CODE_CHEMICALTYPE';
            $data['input_id'] = 'Code';
            $data['input_name'] = 'Name';
        }else if($type=='chemicalBrand'){
            $data['label'] = 'ยี่ห้อปุ๋ย';
            $data['table'] = 'CODE_CHEMICALBRAND';
            $data['input_id'] = 'Code';
            $data['input_name'] = 'Name';
        }else if($type=='chemicalFormular'){
            $data['label'] = 'สูตรปุ๋ย';
            $data['table'] = 'CODE_CHEMICALFORMULAR';
            $data['input_id'] = 'Code';
            $data['input_name'] = 'Name';
        }else if($type=='medicalType'){
            $data['label'] = 'ประเภทยา';
            $data['table'] = 'CODE_MEDICALTYPE';
            $data['input_id'] = 'Code';
            $data['input_name'] = 'Name';
        }else if($type=='medicalBrand'){
            $data['label'] = 'ยี่ห้อยา';
            $data['table'] = 'CODE_MEDICALBRAND';
            $data['input_id'] = 'Code';
            $data['input_name'] = 'Name';
        }else if($type=='employType'){
            $data['label'] = 'ลักษณะการจ้าง';
            $data['table'] = 'CODE_EMPLOYTYPE';
            $data['input_id'] = 'Code';
            $data['input_name'] = 'Name';
        }else if($type=='laborType'){
            $data['label'] = 'การจ้างแรงงาน';
            $data['table'] = 'CODE_LABORTYPE';
            $data['input_id'] = 'Code';
            $data['input_name'] = 'Name';
        }else if($type=='productSale'){
            $data['label'] = 'ลักษณะการขาย';
            $data['table'] = 'CODE_PRODUCT_SALE';
            $data['input_id'] = 'Code';
            $data['input_name'] = 'Name';
        }else if($type=='possessRight'){
            $data['label'] = 'เอกสารสิทธิที่ดิน';
            $data['table'] = 'CODE_POSSESSRIGHT';
            $data['input_id'] = 'Code';
            $data['input_name'] = 'Name';
        }else if($type=='supportType'){
            $data['label'] = 'การสนับสนุน';
            $data['table'] = 'CODE_HRDI_SUPPORTTYPE';
            $data['input_id'] = 'Code';
            $data['input_name'] = 'Name';
        }else if($type=='wantSupportType'){
            $data['label'] = 'ความต้องการ การสนับสนุนจากหน่วยงาน';
            $data['table'] = 'CODE_SUPPORT_WANTEDTYPE';
            $data['input_id'] = 'Code';
            $data['input_name'] = 'Name';
        }else if($type=='problemType'){
            $data['label'] = 'ปัญหาทางด้านการเกษตร';
            $data['table'] = 'CODE_PROBLEMTYPE';
            $data['input_id'] = 'Code';
            $data['input_name'] = 'Name';
        }else if($type=='department'){
            $data['label'] = 'หน่วยงาน';
            $data['table'] = 'CODE_DEPARTMENT';
            $data['input_id'] = 'Code';
            $data['input_name'] = 'Name';
        }else if($type=='market'){
            $data['label'] = 'ตลาด';
            $data['table'] = 'CODE_MARKET';
            $data['input_id'] = 'Code';
            $data['input_name'] = 'Name';
        }else if($type=='unit'){
            $data['label'] = 'หน่วยนับ';
            $data['table'] = 'CODE_UNIT';
            $data['input_id'] = 'Code';
            $data['input_name'] = 'Name';
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
        }else if($type=='jobsGroup'){
            $data['label'] = 'ประเภทกลุ่มอาชีพ';
            $data['table'] = 'LH_jobsgroup';
            $data['input_id'] = 'jobs_group_id';
            $data['input_name'] = 'jobs_group_name';
        }else if($type=='diseaseGroup'){
            $data['label'] = 'ประเภทโรคประจำตัว';
            $data['table'] = 'LH_diseasegroup';
            $data['input_id'] = 'disease_group_id';
            $data['input_name'] = 'disease_group_name';
        }else if($type=='hospital'){
            $data['label'] = 'สถานพยาบาล';
            $data['table'] = 'LH_hospital';
            $data['input_id'] = 'hospital_id';
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

    public function importUsers(){
        $User = new User_model();
        $data = $User->getAllUsers();

        $this->model_api->importUsers($data);
    }

    public function importlands(){
        $User = new User_model();

        $this->model_api->importlands();
    }

    public function importHouse(){
        $User = new User_model();
        $this->model_api->importHouse();
    }

    public function importPersons(){
        $User = new User_model();
        // $this->model_api->importPersons();

        $this->model_api->updatePersonLand();
    }

    public function convUTMtoLL(){
        // $UTM_ZONE = '47';
        // $UTMY = '428821.88619601';
        // $UTMX = '1914526.84011716';

        // $latlng = $this->ToLL($UTM_ZONE, $UTMX, $UTMY);
        // print_r($latlng);

        $this->model_api->updateLandGeo();
    }


}