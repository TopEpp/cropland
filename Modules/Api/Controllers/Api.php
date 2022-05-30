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
        $UTM_ZONE = '47';
        $UTMY = '428821.88619601';
        $UTMX = '1914526.84011716';

        $latlng = $this->ToLL($UTM_ZONE, $UTMX, $UTMY);
        print_r($latlng);
    }

    function ToLL($utmZone,$north, $east){ 
      // This is the lambda knot value in the reference
      $LngOrigin = Deg2Rad($utmZone * 6 - 183);

      // The following set of class constants define characteristics of the
      // ellipsoid, as defined my the WGS84 datum.  These values need to be
      // changed if a different dataum is used.    

      $FalseNorth = 0;   // South or North?
      //if (lat < 0.) FalseNorth = 10000000.  // South or North?
      //else          FalseNorth = 0.   

      $Ecc = 0.081819190842622;       // Eccentricity
      $EccSq = $Ecc * $Ecc;
      $Ecc2Sq = $EccSq / (1. - $EccSq);
      $Ecc2 = sqrt($Ecc2Sq);      // Secondary eccentricity
      $E1 = ( 1 - sqrt(1-$EccSq) ) / ( 1 + sqrt(1-$EccSq) );
      $E12 = $E1 * $E1;
      $E13 = $E12 * $E1;
      $E14 = $E13 * $E1;

      $SemiMajor = 6378137.0;         // Ellipsoidal semi-major axis (Meters)
      $FalseEast = 500000.0;          // UTM East bias (Meters)
      $ScaleFactor = 0.9996;          // Scale at natural origin

      // Calculate the Cassini projection parameters

      $M1 = ($north - $FalseNorth) / $ScaleFactor;
      $Mu1 = $M1 / ( $SemiMajor * (1 - $EccSq/4.0 - 3.0*$EccSq*$EccSq/64.0 - 5.0*$EccSq*$EccSq*$EccSq/256.0) );

      $Phi1 = $Mu1 + (3.0*$E1/2.0 - 27.0*$E13/32.0) * sin(2.0*$Mu1);
        + (21.0*$E12/16.0 - 55.0*$E14/32.0)           * sin(4.0*$Mu1);
        + (151.0*$E13/96.0)                          * sin(6.0*$Mu1);
        + (1097.0*$E14/512.0)                        * sin(8.0*$Mu1);

      $sin2phi1 = sin($Phi1) * sin($Phi1);
      $Rho1 = ($SemiMajor * (1.0-$EccSq) ) / pow(1.0-$EccSq*$sin2phi1,1.5);
      $Nu1 = $SemiMajor / sqrt(1.0-$EccSq*$sin2phi1);

      // Compute parameters as defined in the POSC specification.  T, C and D

      $T1 = tan($Phi1) * tan($Phi1);
      $T12 = $T1 * $T1;
      $C1 = $Ecc2Sq * cos($Phi1) * cos($Phi1);
      $C12 = $C1 * $C1;
      $D  = ($east - $FalseEast) / ($ScaleFactor * $Nu1);
      $D2 = $D * $D;
      $D3 = $D2 * $D;
      $D4 = $D3 * $D;
      $D5 = $D4 * $D;
      $D6 = $D5 * $D;

      // Compute the Latitude and Longitude and convert to degrees
      $lat = $Phi1 - $Nu1*tan($Phi1)/$Rho1 * ( $D2/2.0 - (5.0 + 3.0*$T1 + 10.0*$C1 - 4.0*$C12 - 9.0*$Ecc2Sq)*$D4/24.0 + (61.0 + 90.0*$T1 + 298.0*$C1 + 45.0*$T12 - 252.0*$Ecc2Sq - 3.0*$C12)*$D6/720.0 );

      $lat = Rad2Deg($lat);

      $lon = $LngOrigin + ($D - (1.0 + 2.0*$T1 + $C1)*$D3/6.0 + (5.0 - 2.0*$C1 + 28.0*$T1 - 3.0*$C12 + 8.0*$Ecc2Sq + 24.0*$T12)*$D5/120.0) / cos($Phi1);

      $lon = Rad2Deg($lon);

      // Create a object to store the calculated Latitude and Longitude values
      $PC_LatLon['lat'] = $lat;
      $PC_LatLon['lon'] = $lon;

      // Returns a PC_LatLon object
      return $PC_LatLon;
    }

}