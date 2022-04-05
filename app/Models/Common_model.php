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

    


}

 ?>
