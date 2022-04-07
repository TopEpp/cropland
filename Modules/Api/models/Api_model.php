<?php
namespace Modules\Api\Models;
use CodeIgniter\Model;

class Api_model extends Model
{
    
    public function getAgriWork($id = '')
    { 
        
        $builder = $this->db->table('LH_agriwork');
        $builder->select('*');
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
        $builder->select('*');
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

    public function getProblemType($id = '')
    { 
        
        $builder = $this->db->table('LH_problemtype');
        $builder->select('*');
        if ($id){
          $builder = $builder->where('problemtype_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getProduct($id = '')
    { 
        
        $builder = $this->db->table('LH_product');
        $builder->select('*');
        if ($id){
          $builder = $builder->where('product_id',$id);
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
        if ($id){
          $builder = $builder->where('landuse_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getLandprivilege($id = '')
    { 
        
        $builder = $this->db->table('LH_landprivilege');
        $builder->select('*');
        if ($id){
          $builder = $builder->where('landprivilege_id',$id);
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
        if ($id){
          $builder = $builder->where('location_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }


  
}

 ?>
