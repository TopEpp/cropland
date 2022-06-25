<?php
namespace Modules\Api\Models;
use CodeIgniter\Model;

class Api_model extends Model
{

    protected $useAutoIncrement = true;

    function importUsers($data){
      $builder_del = $this->db->table('LH_users');
      $builder_del->where('emp_id <>','');
      $builder_del->delete();

        foreach ($data as $key => $value) {
          $builder_set = $this->db->table('LH_users');
          $builder_set->set('emp_id',$value['emp_id']);
          $builder_set->set('usr',$value['usr']);
          $builder_set->set('fullname',$value['fullname']);
          $builder_set->set('department',$value['department']);
          $builder_set->set('prs_id',$value['prs_id']);
          $builder_set->set('eml',$value['eml']);
          $builder_set->set('phn',$value['mbl_phn']);
          $builder_set->insert();

        }
    }

    function importHouse(){
      set_time_limit(20000);
      ini_set('memory_limit','2048M'); // This also needs to be increased in some cases. Can be changed to a higher value as per need)
      ini_set('sqlsrv.ClientBufferMaxKBSize','524288'); // Setting to 512M
      ini_set('pdo_sqlsrv.client_buffer_max_kb_size','524288');
        $builder = $this->db->table('Person');
        $builder->select('address,moo,mooName,tambol,district,province');
        $builder->where('idcard <>',null);
        $builder->where('idcard <>','0000000000000');
        $builder->where('address <>',null);
        $builder->groupBy('address,moo,mooName,tambol,district,province');
        
        $count=0;
        $query = $builder->get()->getResultArray();
        foreach ($query as $key => $value) {
          $count++;
         
          // $data['house_province'] = $value['Province_idProvince'];
          // $data['house_district'] = $value['Amphur_idAmphur'];
          // $data['house_subdistrict'] = $value['districtName'];
        
          $prov_code = $this->getProvinceId($value['province']);
          $dis_code = $this->getDistrictId($prov_code,$value['district']);
          $subdis_code = $this->getSubDistrictId($dis_code,$value['tambol']);

          $builder_check = $this->db->table('LH_house');
          $builder_check->select('house_id');
          $builder_check->where('house_province',$prov_code);
          $builder_check->where('house_district',$dis_code);
          $builder_check->where('house_subdistrict',$subdis_code);
          $builder_check->where('house_number',$value['address']);
          $builder_check->where('house_moo',$value['moo']);
          $builder_check->where('house_moo_name',$value['mooName']);
          $query = $builder_check->get()->getRowArray();
          if(empty($query['house_id'])){
            $data['house_province'] = $prov_code;
            $data['house_district'] = $dis_code;
            $data['house_subdistrict'] = $subdis_code;
            $data['house_number'] = $value['address'];
            $data['house_moo'] = $value['moo'];
            $data['house_moo_name'] = $value['mooName'];
            // exit;
            $db = \Config\Database::connect();
            $builder_land = $this->db->table('LH_house');
            $builder_land->insert($data);
            $house_id = $db->insertID();

            $builder_person = $this->db->table('LH_house_person');
            $builder_person->select('LH_house_person.person_id');
            $builder_person->join('Person','Person.idcard = LH_house_person.person_number');
            $builder_person->where('province',$value['province']);
            $builder_person->where('district',$value['district']);
            $builder_person->where('tambol',$value['tambol']);
            $builder_person->where('address',$value['address']);
            $builder_person->where('moo',$value['moo']);
            $builder_person->where('mooName',$value['mooName']);
            $query_person = $builder_person->get()->getResultArray();
            foreach ($query_person as $key_p => $person) {
              $builder_person_set = $this->db->table('LH_house_person');
              $builder_person_set->where('person_id',$person['person_id']);
              $builder_person_set->set('house_id',$house_id);
              $builder_person_set->set('family_id',1);
              $builder_person_set->update();
            }
          }

         


        }

        echo $count;
    }

    function importPersons(){
      set_time_limit(2000);
      ini_set('memory_limit', '2048M');
        $builder = $this->db->table('Person');
        $builder->select('idcard,Prefix_idPrefix,firstName,lastName');
        $builder->where('idcard <>',null);
        // $builder->limit(0,500);
        $count=0;
        $query = $builder->get()->getResultArray();
        foreach ($query as $key => $value) {
          $count++;
          $data = array();
          // $person_header = 0;
          // if($value['pos_family']=='หัวหน้าครัวเรือน'){
          //   $person_header = 1;
          // }

          $prename = 1;
          if($value['Prefix_idPrefix']=='นาย'){
            $prename = 1;
          }else if($value['Prefix_idPrefix']=='นาง'){
             $prename = 2;
          }else if($value['Prefix_idPrefix']=='นางสาว'){
             $prename = 3;
          }else if($value['Prefix_idPrefix']=='เด็กชาย'){
             $prename = 4;
          }else if($value['Prefix_idPrefix']=='เด็กหญิง'){
             $prename = 5;
          }

          $data['person_number'] = str_replace('-','',$value['idcard']);
          $data['person_prename'] = $prename;
          $data['person_name'] = $value['firstName'];
          $data['person_lastname'] = $value['lastName'];
          // $data['person_birthdate'] = $value['birthday'];
          // $data['person_religion'] = $value['religionName'];
          // $data['person_header'] = $person_header;
          // $data['person_tribe'] = $this->getTribeId($value['tribeName']);
          // $data['person_educate'] = $value['EduLevel_idEduLevel'];
          
          $builder_land = $this->db->table('LH_house_person');
          $builder_land->insert($data);
        }

        echo 'count :: '.$count;
    }

    function importlands(){
        set_time_limit(20000);
        ini_set('memory_limit','2048M'); // This also needs to be increased in some cases. Can be changed to a higher value as per need)
        ini_set('sqlsrv.ClientBufferMaxKBSize','524288'); // Setting to 512M
        ini_set('pdo_sqlsrv.client_buffer_max_kb_size','524288'); 

        $builder = $this->db->table('cropland_xtd');
        $builder->select('code_total,address,tambon,amphur,province,area_rai,basin,project,id_card,landuse_56');
        // $builder->groupBy('code_total');
        $builder->orderBy('code_total');
        // $builder->limit(1000,1000);
         $count=0;
        $query = $builder->get()->getResultArray();
        foreach ($query as $key => $value) {
           $count++;
          $data['land_code'] = $value['code_total'];
          $data['land_basin'] = $this->getBasinId($value['basin']);
          $prov_code = $this->getProvinceId($value['province']);
          $dis_code = $this->getDistrictId($prov_code,$value['amphur']);
          $subdis_code = $this->getSubDistrictId($dis_code,$value['tambon']);

          $data['land_province'] = $prov_code;
          $data['land_district'] = $dis_code;
          $data['land_subdistrcit'] = $subdis_code;
          $data['land_address'] = $value['address'];
          $data['land_project'] = $this->getProjectId($value['project']);
          $data['land_use'] = $this->getLandUseId($value['landuse_56']);
          $data['land_area'] = $value['area_rai'];
          // $data['land_geo'] = $value['ogr_geometry'];
          
          // echo '<pre>';
          // print_r($data); echo '<br>';

          $builder_land = $this->db->table('LH_land');
          $builder_land->insert($data);
        }

        echo 'count : '.$count;
    }

    function updatePersonLand(){
      set_time_limit(2000);
      // $builder = $this->db->table('LH_house_person');
      //   $builder->select('person_id,person_number');
      //   $query = $builder->get()->getResultArray();
      //   foreach ($query as $key => $value) {
      //      $builder_update = $this->db->table('LH_house_person');
      //      $builder_update->set('person_number',str_replace('-','',$value['person_number']));
      //      $builder_update->where('person_id',$value['person_id']);
      //      $builder_update->update();
      //   }

        $builder = $this->db->table('cropland_rak');
        $builder->select('id_card,code_total,LH_land.land_id,LH_house_person.person_id,LH_house_person.house_id');
        $builder->join('LH_land','LH_land.land_code = cropland_rak.code_total');
        $builder->join('LH_house_person','LH_house_person.person_number = cropland_rak.id_card');
        $builder->where('id_card <>',null);
        $builder->orderBy('code_total');
        $query = $builder->get()->getResultArray();
        foreach ($query as $key => $value) {
          // $builder_hl =  $this->db->table('LH_house_land');
          // $builder_hl->select('MAX(rec_id) as rec_id');
          // $row = $builder_hl->get()->getRowArray();

          // $data['rec_id'] = $row['rec_id']+1;
          // $data['person_id'] = $value['person_id'];
          // $data['land_id'] = $value['land_id'];
          // $data['house_id'] = $value['house_id'];
          // $builder_set = $this->db->table('LH_house_land');
          // $builder_set->insert($data);
        }
    }

    function updateLandGeo(){
      set_time_limit(20000);
        ini_set('memory_limit','2048M'); // This also needs to be increased in some cases. Can be changed to a higher value as per need)
        ini_set('sqlsrv.ClientBufferMaxKBSize','524288'); // Setting to 512M
        ini_set('pdo_sqlsrv.client_buffer_max_kb_size','524288'); 
        
      $builder = $this->db->table('LH_land');
        $builder->select('land_id, dbo.geomToGeoJSON(land_geo) as land_geo ');
        // $builder->limit(3);
        $query = $builder->get()->getResultArray();
        foreach ($query as $key => $value) {
          // echo '<pre>';

          $geo = json_decode($value['land_geo']);
          // print_r($geo); 
          $new_co = array();
          if(!empty($geo)){
            $coordinates = $geo->coordinates;
            
            foreach ($coordinates[0] as $key => $co) {
              $UTM_ZONE = 47;
              $latlng = $this->ToLL($UTM_ZONE, $co[1], $co[0]);

               $new_co[$key][0] = $latlng['lat'];
               $new_co[$key][1] = $latlng['lon'];
            }

            // print_r($new_co);

           $polygon = (object) ['type' => 'Polygon','coordinates'=>$new_co];
           // print_r(json_encode($polygon));

           $builder_update = $this->db->table('LH_land');
           $builder_update->set('land_gps',json_encode($polygon));
           $builder_update->where('land_id',$value['land_id']);
           $builder_update->update();

          }

          // $polygon = new stdClass();
          // $polygon->type = 'Polygon';
          // $polygon->coordinates = $new_co;
          
         
        }
    }

    function getLandUseId($name){
      $builder = $this->db->table('LH_landuse');
      $builder->select('*');
      $builder->where('name',$name);
      $row = $builder->get()->getRowArray();
      if(!empty($row['landuse_id'])){
        return $row['landuse_id'];
      }else{
        return null;
      } 
    }

    function getBasinId($name){
      $builder = $this->db->table('CODE_BASIN');
      $builder->select('*');
      $builder->where('Name',$name);
      $row = $builder->get()->getRowArray();
      if(!empty($row['Code'])){
        return $row['Code'];
      }else{
        return null;
      } 
    }

    function getProjectId($name){
      $builder = $this->db->table('CODE_PROJECT');
      $builder->select('*');
      $builder->where('Name',$name);
      $row = $builder->get()->getRowArray();
      if(!empty($row['Code'])){
        return $row['Code'];
      }else{
        return null;
      }
            
    }

    function getProvinceId($name){
      // $builder = $this->db->table('province');
      // $builder->select('*');
      // $builder->where('pro_name_t',$name);
      // $row = $builder->get()->getRowArray();  
      // if(!empty($row['prov_code'])){
      //   return $row['prov_code'];
      // }else{
      //   return null;
      // }  

      $builder = $this->db->table('CODE_PROVINCE');
      $builder->select('*');
      $builder->where('Name',$name);
      $row = $builder->get()->getRowArray();  
      if(!empty($row['Code'])){
        return $row['Code'];
      }else{
        return null;
      }   
    }

    function getDistrictId($code,$name){
      // $builder = $this->db->table('amphoe');
      // $builder->select('*');
      // $builder->where('prov_code',$code);
      // $builder->where('amp_name_t',$name);
      // $row = $builder->get()->getRowArray(); 
      // if(!empty($row['amp_code'])){
      //   return $row['amp_code'];
      // }else{
      //   return null;
      // }   
      
      $builder = $this->db->table('CODE_AMPHUR');
      $builder->select('*');
      $builder->where('AMP_T',trim($name));
      $builder->where('PROV_CODE',$code);
      $row = $builder->get()->getRowArray(); 

      if(!empty($row['AMP_CODE'])){
        return $row['AMP_CODE'];
      }else{
        return null;
      } 
    }

    function getSubDistrictId($code,$name){
      // $builder = $this->db->table('tambon');
      // $builder->select('*');
      // $builder->where('amp_code',$code);
      // $builder->where('tam_name_t',$name);
      // $row = $builder->get()->getRowArray();
      // if(!empty($row['tam_code'])){
      //   return $row['tam_code'];
      // }else{
      //   return null;
      // }    

      $builder = $this->db->table('CODE_TAMBON');
      $builder->select('*');
      $builder->where('TAM_T',trim($name));
      $builder->where('AMP_CODE',$code);
      $row = $builder->get()->getRowArray();  
      if(!empty($row['TAM_CODE'])){
        return $row['TAM_CODE'];
      }else{
        return null;
      } 
    }

    function getTribeId($name){
      $builder = $this->db->table('LH_tribe');
      $builder->select('*');
      $builder->where('name',$name);
      $row = $builder->get()->getRowArray();
      if(!empty($row['tribe_id'])){
        return $row['tribe_id'];
      }else{
        return null;
      }  
    }
    
    public function getAgriWork($id = '')
    { 
        
        $builder = $this->db->table('LH_agriwork');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('agriwork_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getAreaTarget($id = '')
    { 
        
        $builder = $this->db->table('LH_area_target');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('target_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getDiseaseGroup($id = '')
    { 
        
        $builder = $this->db->table('LH_diseasegroup');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('disease_group_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getDope($id = '')
    { 
        
        $builder = $this->db->table('LH_dope');
        $builder->select('*');
        if ($id){
          $builder = $builder->where('dope_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getEducation($id = '')
    { 
        
        $builder = $this->db->table('LH_education');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('education_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getExpenses($id = '')
    { 
        
        $builder = $this->db->table('LH_expenses');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('expenses_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getHospital($id = '')
    { 
        
        $builder = $this->db->table('LH_hospital');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('hospital_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getJobs($id = '')
    { 
        
        $builder = $this->db->table('LH_jobs');
        $builder->select('LH_jobs.*, LH_jobsgroup.jobs_group_name ');
        $builder->where('LH_jobs.active',1);
        $builder->join('LH_jobsgroup','LH_jobsgroup.jobs_group_id = LH_jobs.jobs_group_id ');
        $builder->orderBy('jobs_group_id,name');
        if ($id){
          $builder = $builder->where('jobs_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getJobsGroup($id = '')
    { 
        
        $builder = $this->db->table('LH_jobsgroup');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('jobs_group_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getLandOwner($id = '')
    { 
        
        $builder = $this->db->table('LH_landowner');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('landowner_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getPrefix($id = '')
    { 
        
        $builder = $this->db->table('LH_prefix');
        $builder->select('*');
        if ($id){
          $builder = $builder->where('prefix_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getProblemType($id = '') #ปัญหาทางด้านการเกษตร
    { 
        
        $builder = $this->db->table('CODE_PROBLEMTYPE');
        $builder->select('*');
        // $builder->where('active',1);
        if ($id){
          $builder = $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

   

    public function getPublicHealth($id = '')
    { 
        
        $builder = $this->db->table('LH_publichealth');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('publichealth_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getReligion($id = '')
    { 
        
        $builder = $this->db->table('LH_religion');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('religion_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getTherapy($id = '')
    { 
        
        $builder = $this->db->table('LH_therapy');
        $builder->select('*');
        if ($id){
          $builder = $builder->where('therapy_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getTribe($id = '')
    { 
        
        $builder = $this->db->table('LH_tribe');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('tribe_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getLandUse($id = '')
    { 
        
        $builder = $this->db->table('LH_landuse');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('landuse_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getLandprivilege($id = '') #เอกสิทธิที่ดิน
    { 
        
        $builder = $this->db->table('CODE_POSSESSRIGHT');
        $builder->select('*');
        // $builder->where('active',1);
        if ($id){
          $builder = $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getLocation($id = '')
    { 
        
        $builder = $this->db->table('LH_location');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('location_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getData($table,$key,$id = '')
    { 
        
        $builder = $this->db->table($table);
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where($key,$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        $data = array();
        foreach ($query as $value) {
          $data[$value[$key]] = $value;
        }
        return $data;
    }

    public function saveData($data){

      if($data['table']=='CODE_PROJECT'){
        $builder = $this->db->table($data['table']);
        $builder->select('*');
        $builder->where('Code',$data['Code']);
        $query = $builder->get()->getRowArray();
        if(!empty($query['Code'])){
          $builder_set = $this->db->table($data['table']);
          $builder_set->where('Code',$data['Code']);
          $builder_set->set('Name',$data['Name']);
          $builder_set->set('TypeCode',$data['TypeCode']);
          $builder_set->update();
           $id = $data[$data['key']];
        }else{
          $builder_set = $this->db->table($data['table']);
          $builder_set->set('Code',$data['Code']);
          $builder_set->set('Name',$data['Name']);
          $builder_set->set('TypeCode',$data['TypeCode']);
          $builder_set->insert();
           $id = $this->db->insertID();
        }

        return $id;

      }

      $builder = $this->db->table($data['table']);
      unset($data['table']);

      if (!empty($data[$data['key']])){
        $id = $data[$data['key']];
        $builder->where($data['key'],$data[$data['key']]);
        unset($data[$data['key']]);
        unset($data['key']);
        $builder->update($data);
      }else{
        unset($data[$data['key']]);
        unset($data['key']);
        $builder->insert($data);
        $id = $this->db->insertID();
      }

      return $id;
    }

    public function deleteData($table,$key,$id){
      $builder = $this->db->table($table);
      $builder->set('active',0);
      if($id){
        $builder->where($key,$id);
        $builder->update();
      }

      return true;
    }

    public function getProjectType($id = '')  #ประเภทโครงการ
    { 
        
        $builder = $this->db->table('CODE_PROJECTTYPE');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder->where('Runno',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getProject($type = '',$id = '') #โครงการ , พื้นที่
    { 
        
        $builder = $this->db->table('CODE_PROJECT');
        $builder->select('*');
        $builder->where('active',1);
        if ($type != ''){
          $builder->where('TypeCode',$type);
        }
      
   
        if ($id){
          $builder->where('Runno',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

   

    public function getDepartment($id = '') #หน่วยงาน
    { 
        
        $builder = $this->db->table('CODE_DEPARTMENT');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getChemicalType($id = '') #ประเภทปุ๋ย
    { 
        
        $builder = $this->db->table('CODE_CHEMICALTYPE');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getChemical($type='',$id = '') #ยี่ห้อปุ๋ย
    { 
        
        $builder = $this->db->table('CODE_CHEMICALBRAND');
        $builder->select('*');
        $builder->where('active',1);
        if($type){
          $builder->where('Type_id',$type);
        }
   
        if ($id){
          $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getChemicalFormula($chem_id='',$id = '') #สูตรปุ๋ย
    { 
        
        $builder = $this->db->table('CODE_CHEMICALFORMULAR');
        $builder->select('*');
        $builder->where('active',1);
        if($chem_id){
          $builder->where('Chem_id',$chem_id);
        }

        if ($id){
          $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getMedicalType($id = '') #ประเภทยา
    { 
        
        $builder = $this->db->table('CODE_MEDICALTYPE');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getMedica($type='',$id = '') #ยี่ห้อยา
    { 
        
        $builder = $this->db->table('CODE_MEDICALBRAND');
        $builder->select('*');
        $builder->where('active',1);
        if($type){
          $builder->where('Description',$type);
        }
   
        if ($id){
          $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getUnit($id = '') #หน่วยนับ
    { 
        
        $builder = $this->db->table('CODE_UNIT');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getEmployType($id = '') #ลักษณะการจ้าง
    { 
        
        $builder = $this->db->table('CODE_EMPLOYTYPE');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getLaborType($id = '') #การจ้างแรงงาน
    { 
        
        $builder = $this->db->table('CODE_LABORTYPE');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getMarket($id = '') #ตลาด
    { 
        
        $builder = $this->db->table('CODE_MARKET');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getVillage($provice,$district,$subdistrict,$id = '') #กลุ่มบ้าน
    { 
        
        $builder = $this->db->table('CODE_PROJECTVILLAGE');
        $builder->select('*');
        $builder->where('ProvinceId',$provice);
        $builder->where('AmphurId',$district);
        $builder->where('TamBonId',$subdistrict);
   
        if ($id){
          $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getHrdiSupport($id = '') #การสนับสนุนของ สวพส
    { 
        
        $builder = $this->db->table('CODE_HRDI_SUPPORTTYPE');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getWantSupport($id = '') #ความต้องการ การสนับสนุนจากหน่วยงาน
    { 
        
        $builder = $this->db->table('CODE_SUPPORT_WANTEDTYPE');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getProductGroup($id = '') #ประเภทการใช้ประโยชน์ที่ดิน
    { 
        
        $builder = $this->db->table('CODE_PRODUCTGROUP');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getProductType($id = '') #การใช้ประโยชน์ที่ดิน
    { 
        
        $builder = $this->db->table('CODE_PRODUCTTYPE');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getProduct($type = '',$id = '') #พันธุ์
    { 
        
        $builder = $this->db->table('CODE_PRODUCT');
        $builder->select('*');
        $builder->where('active',1);
        if ($type != ''){
          $builder->where('Type_Code',$type);
        }
    
        if ($id){
          $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    function saveDataPermission($input){
      $emp_id = $input['emp_id'];
      $builder_del = $this->db->table('LH_users_permission');
      $builder_del->where('emp_id',$emp_id);
      $builder_del->delete();

      foreach ($input['permission'] as $key => $value) {
        $builder_set = $this->db->table('LH_users_permission');
        $builder_set->set('emp_id',$emp_id);
        $builder_set->set('permission_id',$value);
        $builder_set->insert();
      }

      return true;
    }

    function getPermission($emp_id){
       $builder = $this->db->table('LH_users_permission');
        $builder->select('*');
        $builder = $builder->where('emp_id',$emp_id);
        $query = $builder->get()->getResultArray();
        return $query;
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

 ?>
