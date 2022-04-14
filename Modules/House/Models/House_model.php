<?php
namespace Modules\House\Models;
use CodeIgniter\Model;

class House_model extends Model
{
    protected $table = 'LH_house';
    protected $primaryKey = 'house_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
                                  'house_id',
                                  'house_number',
                                  'house_moo',
                                  'house_province',
                                  'house_district',
                                  'house_subdistrict',
                                  'house_home',
                                  'house_label',
                                  'house_type',
                                ];

    public function getAllHouse($id = '')
    { 
        
        $builder = $this->db->table('LH_house');
        $builder->select('*');
        $builder->join('LH_interview_house', 'LH_house.house_id = LH_interview_house.interview_house');
        if ($id){
          $builder = $builder->where('house_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        // $builder->groupBy('LH_house.house_id');
        $query = $builder->get()->getResultArray();
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
        $builder = $this->db->table('LH_house_person');
        $builder->select('LH_house_person.*,LH_prefix.name,LH_education.name as education_name');
        $builder->where('house_id',$house_id);
        $builder->join('LH_prefix', 'LH_prefix.prefix_id = LH_house_person.person_prename','left');
        $builder->join('LH_education', 'LH_education.education_id = LH_house_person.person_educate','left');
        $query = $builder->get()->getResultArray();
        
        foreach ($query as $key => $value) {
          $data[$value['family_id']][$value['person_id']] = $value;          
        }
        return $data;
      
    }

    public function saveHouseMember($data){

      $db = \Config\Database::connect();
      $builder = $db->table('LH_house_person');
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

    public function getAllHouseJob($house_id,$person_id,$data = array()){

      $builder = $this->db->table('LH_house_person');
      $builder->select('LH_person_job.*,LH_jobs.name,LH_house_person.person_id,LH_house_person.person_name,LH_house_person.person_lastname');
      $builder->where('LH_house_person.house_id',$house_id);
      $builder->join('LH_person_job', 'LH_person_job.person_id = LH_house_person.person_id');
      $builder->join('LH_jobs', 'LH_jobs.jobs_id = LH_person_job.job_type');
      $query = $builder->get()->getResultArray();
      
      return $query;
    }

    public function saveHouseJobs($data){
      $db = \Config\Database::connect();
      $builder = $db->table('LH_person_job');
      if (!empty($data['job_id'])){
        $job_id = $data['job_id'];
        $builder->where('job_id',$data['job_id']);
        unset($data['job_id']);
        $builder->update($data);
      
      }else{
        
        unset($data['job_id']);
        if (!empty($data['jobs'])){
          $jobs = $data['jobs'];
          foreach ($jobs as $key => $job) {
            $data_set = [
              'interview_id'=>$data['interview_id'],
              'person_id '=>$data['person_id'],
              'job_type' => $job['job_type'],
              'job_main' => !empty($job['job_main'][0]) ? $job['job_main'][0]:null,
              'job_cal_type' => $job['job_cal_type'],
              'job_salary' => $job['job_salary'],
              'job_salary_month' => $job['job_salary_month'],
              'job_address' => $job['job_address'],
              'job_descript'=> $job['job_descript'],
            ];
            
            $builder->insert($data_set);
            $job_id = $db->insertID();

            // insert detail
            if (!empty($job['job-detail'])){
              $job_detail = $job['job-detail'];
              foreach ($job_detail as $key => $detail) {

                $data_detail = [
                  'interview_id'=>$data['interview_id'],
                  'person_id '=>$data['person_id'],
                  'job_id '=>$job_id,
                  'type_id' => $detail['type_id'],
                  'detail_value' => $detail['detail_value'],
                  'detail_unit' => $detail['detail_unit'],
                  'detail_cost' => $detail['detail_cost'],
                  'detail_income' => $detail['detail_income'],
                  'detail_remark'=> $detail['detail_remark'],
                ];
                
                $builder_detail = $db->table('LH_person_job_detail');
                $builder_detail->insert($data_detail);
              }
            }
          }

        }
     
      }

      return $job_id;
    }
    

    public function getAllHouseIncome($house_id,$person_id,$data = array()){

      $builder = $this->db->table('LH_house_person');
      $builder->select('LH_person_income.*,LH_house_person.person_id as person,LH_house_person.person_name,LH_house_person.person_lastname');
      $builder->where('LH_house_person.house_id',$house_id);
      $builder->join('LH_person_income', 'LH_person_income.person_id = LH_house_person.person_id','left');
      $query = $builder->get()->getResultArray();
        // dd($query);
      $tmp = [];
      foreach ($query as $key => $value) {
        $tmp[$value['person']]['person_id'] = $value['person_id'];
        $tmp[$value['person']]['person_name'] = $value['person_name'];
        $tmp[$value['person']]['person_lastname'] = $value['person_lastname'];
        $tmp[$value['person']][$value['income_type']]['income_value'] = $value['income_value'];
        $tmp[$value['person']][$value['income_type']]['income_month'] = $value['income_month'];
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
          $tmp['income_month'] = $value['income_month'];
          
          $builder->insert($tmp);
          $income_id = $db->insertID();
        }
  
      }

      return $income_id;

    }


    public function getAllHouseOutcome($house_id,$person_id,$data = array()){

      $builder = $this->db->table('LH_house_person');
      $builder->select('LH_person_outcome.*,LH_house_person.person_id as person,LH_house_person.person_name,LH_house_person.person_lastname');
      $builder->where('house_id',$house_id);
      $builder->join('LH_person_outcome', 'LH_person_outcome.person_id = LH_house_person.person_id','left');
      $query = $builder->get()->getResultArray();
        
      $tmp = [];
      foreach ($query as $key => $value) {
        
        $tmp[$value['person']]['person_id'] = $value['person_id'];
        $tmp[$value['person']]['person_name'] = $value['person_name'];
        $tmp[$value['person']]['person_lastname'] = $value['person_lastname'];
        $tmp[$value['person']][$value['outcome_type']]['outcome_value'] = $value['outcome_value'];
        $tmp[$value['person']][$value['outcome_type']]['outcome_month'] = $value['outcome_month'];
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
          $tmp['outcome_month'] = $value['outcome_month'];
          
          $builder->insert($tmp);
          $outcome_id = $db->insertID();
        }
  
      }

      return $outcome_id;

    }

    public function getPersonJobs($person_id){
      $builder = $this->db->table('LH_person_job');
      $builder->select('*');
      $builder->where('person_id',$person_id);
      $query = $builder->get()->getResultArray();

      return $query;
    }

    public function getPersonIncome($person_id){

      $builder = $this->db->table('LH_person_income');
      $builder->select('*');
      $builder->where('person_id',$person_id);
      $query = $builder->get()->getResultArray();

      return $query;
    }

    public function getPersonOutcome($person_id){

      $builder = $this->db->table('LH_person_outcome');
      $builder->select('*');
      $builder->where('person_id',$person_id);
      $query = $builder->get()->getResultArray();

      return $query;
    }

}

 ?>
