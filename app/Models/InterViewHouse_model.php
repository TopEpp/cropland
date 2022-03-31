<?php
namespace app\Models;
use CodeIgniter\Model;

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
      $builder->select('*');
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
