<?php
namespace app\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\BaseBuilder;

class InterViewHouse_model extends Model
{
    protected $table = 'LH_interview_house';
    protected $primaryKey = 'interview_id';
    protected $allowedFields = [
                                  'interview_id',
                                  'interview_project',
                                  'interview_project_name',
                                  'interview_year',
                                  'interview_house',
                                ];

    public function getAllInterViewHouse()
    {


      $builder = $this->db->table('LH_interview_house');
      $builder->select("    
      LH_house.house_id,  
      LH_house_person.family_id,
      max(LH_house_person.person_name) as person_name,
      max(LH_house_person.person_lastname) as person_lastname,
      ");
      $builder->join('LH_house', 'LH_house.house_id = LH_interview_house.interview_house');
      $builder->join('LH_house_person', 'LH_house_person.house_id = LH_house.house_id and person_header = 1','left');
      $builder->groupBy('LH_house.house_id,LH_house_person.family_id');
     
      $query = $builder->get()->getResultArray();
      return $query;
      
    }

    public function saveInterViewHouse($data)
    {
      $builder = $this->db->table('LH_interview_house');
      if (!empty($data['interview_id'])){
        // $interview_id = $data['interview_id'];
        $builder->where('interview_id',$data['interview_id']);
        unset($data['interview_id']);
        $query = $builder->update($data);
      
      }else{
        unset($data['interview_id']);
        $query = $builder->insert($data);
      }
      return $query;
      
    }

}

 ?>
