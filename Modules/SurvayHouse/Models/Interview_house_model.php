<?php
namespace Modules\SurvayHouse\Models;
use CodeIgniter\Model;

class Interview_house_model extends Model
{
    protected $table = 'LH_interview_house';
    protected $primaryKey = 'interview_id';
    protected $useAutoIncrement = true;
    // protected $allowedFields = [
    //                               'house_id',
    //                               'house_number',
    //                               'house_moo',
    //                               'house_province',
    //                               'house_district',
    //                               'house_subdistrict',
    //                               'house_home',
    //                               'house_label',
    //                               'house_type',
    //                             ];

    public function getAllHouse($id = '')
    { 
        
        $builder = $this->db->table('LH_house');
        $builder->select('*');
        $builder->join('LH_interview_house', 'LH_house.house_id = LH_interview_house.interview_house','left');
        if ($id){
          $builder = $builder->where('interview_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        // $builder->groupBy('LH_house.house_id');
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getAllInterviewHousePaginate($page = '',$group = '',$search = [])
    { 
        
      $builder =  $this->table('LH_interview_house');
      // max( CODE_PROJECT.Description) as interview_project_name,
      $builder->select("
        LH_interview_house.interview_id,
        max( vLinkAreaDetail_growerCrops.target_area_type_title) as interview_project,
        max( vLinkAreaDetail_growerCrops.target_name) as interview_project_name,
        max( LH_interview_house.interview_year) as interview_year,
        max( LH_house.house_id) as house_id,
          (
            count(LH_house_person.person_id)
          ) as total_person,
        max(LH_house_person.person_name) as person_name,
        max(LH_house_person.person_lastname) as person_lastname,
        CONCAT('บ้านเลขที่ ', max(LH_house.house_number),' หมู่ที่ ',
        max(LH_house.house_moo),' ',max(CODE_VILLAGE.VILL_T),' ตำบล ',max(CODE_TAMBON.TAM_T),' อำเภอ ',max(CODE_AMPHUR.AMP_T),' จังหวัด ',max(CODE_PROVINCE.Name)) as person_address
    ");

      // $builder->join('CODE_PROJECT', 'CODE_PROJECT.Code = LH_interview_house.interview_project_name','left');
    

      $builder->join('LH_house', 'LH_house.house_id = LH_interview_house.interview_house','left');
      $builder->join('LH_house_person', 'LH_house.house_id = LH_house_person.house_id','left');

      $builder->join('vLinkAreaDetail_growerCrops', 'vLinkAreaDetail_growerCrops.target_code_gis = LH_interview_house.interview_project_name and 
      vLinkAreaDetail_growerCrops.target_area_type_id = LH_interview_house.interview_project and
      vLinkAreaDetail_growerCrops.VILLAGE_ID = LH_house.house_home');

      $builder->join('CODE_PROVINCE', 'CODE_PROVINCE.Code = LH_house.house_province','left');
      $builder->join('CODE_AMPHUR', 'CAST(CODE_AMPHUR.AMP_CODE as int) = LH_house.house_district and CODE_PROVINCE.Code = CODE_AMPHUR.PROV_CODE','left');      
      $builder->join('CODE_TAMBON', 'CAST(CODE_TAMBON.TAM_CODE as int) = LH_house.house_subdistrict and CODE_PROVINCE.Code = CODE_TAMBON.PROV_CODE and CODE_AMPHUR.AMP_CODE = CODE_TAMBON.AMP_CODE','left');      
      $builder->join('CODE_VILLAGE', 'CAST(CODE_VILLAGE.VILL_CODE as varchar(50)) = LH_house.house_home and CODE_PROVINCE.Code = CODE_VILLAGE.PROV_CODE 
      and CODE_AMPHUR.AMP_CODE = CODE_VILLAGE.AMP_CODE
      and CODE_TAMBON.TAM_CODE = CODE_VILLAGE.TAM_CODE','left');   
  
     

        if (!empty($search)){
          if (!empty($search['interview_year'])){
              $builder->where('LH_interview_house.interview_year',$search['interview_year']);
          }
          if (!empty($search['interview_user'])){
              $builder->where('LH_interview_house.interview_user',$search['interview_year']);
          }
          if (!empty($search['interview_project'])){
              $builder->where('vLinkAreaDetail_growerCrops.target_area_type_id',$search['interview_project']);
          }
          if (!empty($search['interview_project_name'])){
              
              $builder->where('vLinkAreaDetail_growerCrops.target_code_gis',$search['interview_project_name']);
          }

          if (!empty($search['province'])){
            $builder->where('LH_house.house_province',intval($search['province']));
          }
          if (!empty($search['amphur'])){
            $builder->where('LH_house.house_district',intval($search['amphur']));
          }
          if (!empty($search['tambon'])){
            $builder->where('LH_house.house_subdistrict',intval($search['tambon']));
          }
          if (!empty($search['village'])){
            $builder->where('LH_house.house_home',intval($search['village']));
          }
         
      }
      
      $builder->groupBy('LH_interview_house.interview_id');
      $query = $builder->paginate($page,$group);     
      
      return $query;
    }


    public function saveHouseManage($data)
    {
      
      $builder = $this->db->table('LH_house');
      if (!empty($data['house_id'])){
        $house_id = $data['house_id'];
        $builder->where('house_id',$data['house_id']);
        unset($data['house_id']);
        $builder->update($data);
      
      }else{
        unset($data['house_id']);
        $builder->insert($data);
        $house_id = $this->db->insertID();
      }

      return $house_id;
      
    }

    public function getAllHouseMembers($house_id,$person_id = '',$data = array()){

        $builder = $this->db->table('LH_interview_house');
        $builder->select('LH_house_person.*,LH_prefix.name,LH_tribe.name as tribe_name');
        $builder->where('LH_interview_house.interview_id',$house_id);
        $builder->join('LH_house', 'LH_house.house_id = LH_interview_house.interview_house','left');
        $builder->join('LH_house_person', 'LH_house_person.house_id = LH_house.house_id','left');
        $builder->join('LH_prefix', 'LH_prefix.prefix_id = LH_house_person.person_prename','left');
        $builder->join('LH_tribe', 'LH_tribe.tribe_id = LH_house_person.person_tribe','left');
        $query = $builder->get()->getResultArray();
        
        $data = [];
        foreach ($query as $key => $value) {
          if (!empty($value['house_id'])){
            $data['house_id'] = $value['house_id'];
            $data['data'][$value['family_id']][$value['person_id']] = $value;     
          }              
        }                
        return $data;
      
    }

    public function getHouseMembers($person_id = '',$data = array()){    
      $builder = $this->db->table('LH_house_person');
      $builder->select('LH_house_person.*');
      $builder->where('person_id',$person_id);    
      $query = $builder->get()->getRowArray();
      return $query;
    
  }

    public function saveHouseMember($data){

      $db = \Config\Database::connect();

      $builder = $db->table('LH_house_person');
      $data['person_read'] = !empty($data['person_read']) ? implode(',',$data['person_read']) : '';
      $data['person_medical'] = !empty($data['person_medical']) ? implode(',',$data['person_medical']) : '';
      $data['person_hospital'] = !empty($data['person_hospital']) ? implode(',',$data['person_hospital']) : '';
      if (!empty($data['person_id'])){
        $person_id = $data['person_id'];
        $builder->where('person_id',$data['person_id']);
        unset($data['person_id']);
        $builder->update($data);
      
      }else{
        unset($data['person_id']);
        $builder->insert($data);
        $person_id = $db->insertID();
      }

      return $person_id;

    }

    public function getAllHouseJob($interview_id,$person_id,$data = array()){


      $builder = $this->db->table('LH_interview_house');
      $builder->select('      
      sum(LH_person_job.job_salary) as job_salary,
      count(LH_person_job.job_id) as job_count,
      max(LH_house_person.family_id) as family_id,      
      max(LH_house_person.person_id) as person_id,
      max(LH_person_job.job_salary_year) as job_salary_year,
      max(LH_house_person.person_name) as person_name,
      max(LH_house_person.person_lastname) as person_lastname');
      $builder->where('LH_interview_house.interview_id',$interview_id);
      $builder->join('LH_house', 'LH_house.house_id = LH_interview_house.interview_house','left');
      $builder->join('LH_house_person', 'LH_house_person.house_id = LH_house.house_id','left');     
      $builder->join('LH_person_job', 'LH_person_job.person_id = LH_house_person.person_id','left');      
      $builder->groupBy('LH_house_person.house_id, LH_house_person.person_id');
      $query = $builder->get()->getResultArray();
      $tmp = [];
      
      foreach ($query as $key => $value) {
        if (!empty($value['person_id'])){

          $tmp[$value['family_id']][$value['person_id']] = $value;

        }
       
      }

      return $tmp;
    }

    public function saveHouseJobs($data,$type = ''){
      
      $db = \Config\Database::connect();
      $builder = $db->table('LH_person_job');
      // if (!empty($data['job_id'])){
      //   $job_id = $data['job_id'];
      //   $builder->where('job_id',$data['job_id']);
      //   unset($data['job_id']);
      //   $builder->update($data);
      
      // }else{
        
        
        if (!empty($data)){
          if ($type =='create'){
            $job = $data['jobs'][0];  
          }else{
            $job = $data;
          }
                 

            $data_set = [
              'interview_id'=>$data['interview_id'],
              'person_id '=>$data['person_id'],
              'job_type' => $job['job_type'],
              'job_main' => !empty($job['job_main'][0]) ? $job['job_main'][0]:null,
              'job_cal_type' => $job['job_cal_type'],
              'job_salary' => $job['job_salary'],
              'job_salary_month' => $job['job_salary_month'],
              'job_salary_year' => $job['job_salary_year'],          
              'job_address' => $job['job_address'],
              'job_remark'=> $job['job_remark'],
            ];
            

            if (!empty($job['job_id'])) {
              $builder->where('job_id',$job['job_id']);
              $builder->update($data_set);
              $job_id = $job['job_id'];
            }else{
              $builder->insert($data_set);
              $job_id = $db->insertID();
            }
            
          

            // insert detail
            if (!empty($job['job-detail'])){
              $job_detail = $job['job-detail'];
              foreach ($job_detail as $key => $detail) {

                $data_detail = [
                  'interview_id'=>$data['interview_id'],
                  'person_id '=>$data['person_id'],
                  'job_id '=>$job_id,
                  'type_id' => $detail['type_id'],
                  'type_group' => $detail['type_group'],                  
                  'detail_value' => $detail['detail_value'],
                  'detail_unit' => $detail['detail_unit'],
                  'detail_cost' => $detail['detail_cost'],
                  'detail_income' => $detail['detail_income'],
                  'detail_remark'=> $detail['detail_remark'],
                ];
                $builder_detail = $db->table('LH_person_job_detail');
                if (!empty($detail['detail_id'])){
                  $builder_detail->where('detail_id',$detail['detail_id']);
                  $builder_detail->update($data_detail);
                }else{                 
                  $builder_detail->insert($data_detail);
                }
               
              }
            }
          

        // }
     
      }

      return $job_id;
    }
    

    public function getAllHouseIncome($house_id,$person_id,$data = array()){

      $builder = $this->db->table('LH_interview_house');
      $builder->select('
          LH_person_income.*,
          LH_house_person.person_id as person,
          LH_house_person.family_id,
          LH_house_person.person_name,LH_house_person.person_lastname
      ');
      $builder->where('LH_interview_house.interview_house',$house_id);
      $builder->join('LH_house', 'LH_house.house_id = LH_interview_house.interview_house','left');
      $builder->join('LH_house_person', 'LH_house_person.house_id = LH_house.house_id','left');
      $builder->join('LH_person_income', 'LH_person_income.person_id = LH_house_person.person_id','left');
      $query = $builder->get()->getResultArray();
      
      $tmp = [];
      foreach ($query as $key => $value) {
        if (!empty($value['person'])){
          $tmp[$value['family_id']][$value['person']]['person_id'] = $value['person'];
          $tmp[$value['family_id']][$value['person']]['person_name'] = $value['person_name'];
          $tmp[$value['family_id']][$value['person']]['person_lastname'] = $value['person_lastname'];
          $tmp[$value['family_id']][$value['person']][$value['income_type']]['income_value'] = $value['income_value'];
          $tmp[$value['family_id']][$value['person']][$value['income_type']]['income_month'] = $value['income_month'];
        }
      
      }
      
      return $tmp;
    }

    public function saveHouseIncome($data){

      $db = \Config\Database::connect();
      $builder = $db->table('LH_person_income');
      if (!empty($data['income_id'])){
        $income_id = $data['income_id'];
        $builder->where('income_id',$data['income_id']);
        unset($data['income_id']);
        $builder->update($data);
      
      }else{
        unset($data['income_id']);
        $tmp = [];
  
        foreach ($data['income'] as $key => $value) {
          
          $tmp['person_id'] = $data['person_id'];
          $tmp['interview_id'] = $data['interview_id'];
          $tmp['income_type'] = $key;
          $tmp['income_value'] = $value['income_value']?$value['income_value']:0;
          $tmp['income_month'] = @$value['income_month'];
          
          $builder->insert($tmp);
          $income_id = $db->insertID();
        }
  
      }

      return $income_id;

    }


    public function getAllHouseOutcome($house_id,$person_id,$data = array()){


      $builder = $this->db->table('LH_interview_house');
      $builder->select('LH_person_outcome.*,LH_house_person.person_id as person,
          LH_house_person.person_name,
          LH_house_person.family_id,
          LH_house_person.person_lastname');
      $builder->where('LH_interview_house.interview_house',$house_id);
      $builder->join('LH_house', 'LH_house.house_id = LH_interview_house.interview_house','left');
      $builder->join('LH_house_person', 'LH_house_person.house_id = LH_house.house_id','left');
      $builder->join('LH_person_outcome', 'LH_person_outcome.person_id = LH_house_person.person_id','left');
      $query = $builder->get()->getResultArray();
        
      $tmp = [];
      foreach ($query as $key => $value) {
        if (!empty($value['person'])){
          $tmp[$value['family_id']][$value['person']]['person_id'] = $value['person'];
          $tmp[$value['family_id']][$value['person']]['person_name'] = $value['person_name'];
          $tmp[$value['family_id']][$value['person']]['person_lastname'] = $value['person_lastname'];
          $tmp[$value['family_id']][$value['person']][$value['outcome_type']]['outcome_value'] = $value['outcome_value'];
          $tmp[$value['family_id']][$value['person']][$value['outcome_type']]['outcome_month'] = $value['outcome_month'];
        }
      }
    
      return $tmp;
      // $query = $builder->get()->getResultArray();

      // return $query;
    }

    public function saveHouseOutcome($data){

      $db = \Config\Database::connect();
      $builder = $db->table('LH_person_outcome');
      if (!empty($data['outcome_id'])){
        $outcome_id = $data['outcome_id'];
        $builder->where('outcome_id',$data['outcome_id']);
        unset($data['outcome_id']);
        $builder->update($data);
      
      }else{
        unset($data['outcome_id']);
        $tmp = [];
  
        foreach ($data['outcome'] as $key => $value) {
          
          $tmp['person_id'] = $data['person_id'];
          $tmp['interview_id'] = $data['interview_id'];
          $tmp['outcome_type'] = $key;
          $tmp['outcome_value'] = $value['outcome_value']?$value['outcome_value']:0;
          $tmp['outcome_month'] = @$value['outcome_month'];
          
          $builder->insert($tmp);
          $outcome_id = $db->insertID();
        }
  
      }

      return $outcome_id;

    }

    public function getPersonJobs($person_id){
      $builder = $this->db->table('LH_house_person');
      $builder->select('LH_jobs.*,LH_person_job.*,LH_house_person.person_name,LH_house_person.person_lastname');
      $builder->where('LH_house_person.person_id',$person_id);    
      $builder->join('LH_person_job', 'LH_house_person.person_id = LH_person_job.person_id','left');
      $builder->join('LH_jobs', 'LH_jobs.jobs_id = LH_person_job.job_type','left');
      $query = $builder->get()->getResultArray();
      
      return $query;
    }

    public function getPersonIncome($person_id){

      $builder = $this->db->table('LH_house_person');
      $builder->select('LH_person_income.*,LH_house_person.person_id,LH_house_person.person_name,LH_house_person.person_lastname');
      $builder->where('LH_house_person.person_id',$person_id);
      $builder->join('LH_person_income', 'LH_house_person.person_id = LH_person_income.person_id','left');
      $query = $builder->get()->getResultArray();

      return $query;
    }

    public function getPersonOutcome($person_id){

      $builder = $this->db->table('LH_house_person');
      $builder->select('LH_person_outcome.*,LH_house_person.person_id,LH_house_person.person_name,LH_house_person.person_lastname');
      $builder->where('LH_house_person.person_id',$person_id);
      $builder->join('LH_person_outcome', 'LH_house_person.person_id = LH_person_outcome.person_id','left');
      $query = $builder->get()->getResultArray();

      return $query;
    }


    public function deleteInterview($id){

      $builder = $this->db->table('LH_interview_house');
      $builder->where('interview_id', $id);
      $query = $builder->delete();

      return $query;
    }

    public function deleteMember($id){

      $builder = $this->db->table('LH_house_person');
      $builder->where('person_id', $id);
      $query = $builder->delete();

      return $query;
    }

    public function deleteJobs($id){

      $builder = $this->db->table('LH_person_job');
      $builder->where('job_id', $id);
      $query = $builder->delete();

      return $query;
    }

    public function getJobdetails($id){
      $builder = $this->db->table('LH_person_job');
      $builder->where('job_id', $id);
      $query = $builder->get()->getRowArray();
      return $query;
    }

    public function DuplicateHouse($data){
        
      $builder = $this->db->table('LH_house');
      $builder->where('house_home',$data['house_home']);
      $builder->where('house_number',$data['house_number']);
      $builder->where('house_province',$data['house_province']);
      $builder->where('house_district',$data['house_district']);
      $builder->where('house_subdistrict',$data['house_subdistrict']);
      return $query = $builder->countAllResults();
    }

    

}

 ?>
