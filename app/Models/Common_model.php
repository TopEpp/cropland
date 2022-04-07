<?php
namespace app\Models;
use CodeIgniter\Model;

class Common_model extends Model
{
   
    public function getProvince()
    {

      $builder = $this->db->table('province');
      $builder->select('prov_code,pro_name_t');
      $query = $builder->get()->getResultArray();
      return $query;
      
    }

    public function getAmphur($province)
    {

      $builder = $this->db->table('amphoe');
      $builder->select('amp_code,amp_name_t');
      $builder->where('prov_code',$province);
      $query = $builder->get()->getResultArray();
      return $query;
      
    }

    public function getTambon($amphor)
    {

      $builder = $this->db->table('tambon');
      $builder->select('tam_code,tam_name_t');
      $builder->where('amp_code',$amphor);
      $query = $builder->get()->getResultArray();
      return $query;
      
    }

    public function getEducation(){
      $builder = $this->db->table('LH_education');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;

    }

    public function getAgriproduct(){
      $builder = $this->db->table('LH_agriproduct');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;

    }

    public function getAgriwork(){
      $builder = $this->db->table('LH_agriwork');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;

    }

    public function getArea_target(){
      $builder = $this->db->table('LH_area_target');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;

    }

    public function getDiseasegroup(){
      $builder = $this->db->table('LH_diseasegroup');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;

    }

    public function getDope(){
      $builder = $this->db->table('LH_dope');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;

    }

    public function getExpenses(){
      $builder = $this->db->table('LH_expenses');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;

    }

    public function getHospital(){
      $builder = $this->db->table('LH_hospital');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;

    }

    public function getJobs(){
      $builder = $this->db->table('LH_jobs');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;

    }

    public function getJobsgroup(){
      $builder = $this->db->table('LH_jobsgroup');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;

    }

    public function getLandowner(){
      $builder = $this->db->table('LH_landowner');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;
    }

    public function getPrefix(){
      $builder = $this->db->table('LH_prefix');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;
    }

    public function getProblemtype(){
      $builder = $this->db->table('LH_problemtype');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;
    }

    public function getPublichealth(){
      $builder = $this->db->table('LH_publichealth');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;
    }

    public function getReligion(){
      $builder = $this->db->table('LH_religion');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;
    }

    public function getTherapy(){
      $builder = $this->db->table('LH_therapy');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;
    }

    public function getTribe(){
      $builder = $this->db->table('LH_Tribe');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;
    }

}

 ?>
