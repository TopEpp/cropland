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
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function saveHouseManage($data)
    {
      $db = \Config\Database::connect();
      $builder = $db->table('LH_house');
      if (!empty($data['house_id'])){
        $house_id = $data['house_id'];
        $builder->where('house_id',$data['house_id']);
        unset($data['house_id']);
        $builder->update($data);
      
      }else{
        unset($data['house_id']);
        $builder->insert($data);
        $house_id = $db->insertID();
      }

      return $house_id;
      
    }

    public function getAllHouseMembers($house_id,$person_id,$data = array()){    
        $builder = $this->db->table('LH_house_person');
        $builder->select('*');
        $builder->where('house_id',$house_id);
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

}

 ?>
