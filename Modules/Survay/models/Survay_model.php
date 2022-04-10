<?php
namespace Modules\Survay\Models;
use CodeIgniter\Model;

class Survay_model extends Model
{
    protected $table = 'LH_interview_land';
    protected $primaryKey = 'interview_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'interview_id',
        'interview_user',
        'interview_date',
        'interview_code',
        'interview_year',
        'interview_project',
        'interview_area',
        'interview_house_id',
        'interview_person_id',
        'interview_land_holding'
                                ];

    public function getAllSurvay($id = ''){

        $builder = $this->db->table('LH_interview_land');
        $builder->select('*');
        // $builder->join('LH_interview_house', 'LH_house.house_id = LH_interview_house.interview_house');
        if ($id){
          $builder = $builder->where('interview_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function saveSurvayManage($data)
    {
      
      $builder = $this->db->table('LH_interview_land');
      if (!empty($data['interview_id'])){
        $interview_id = $data['interview_id'];
        $builder->where('interview_id',$data['interview_id']);
        unset($data['interview_id']);
        $builder->update($data);
      
      }else{
        unset($data['interview_id']);
        $builder->insert($data);
        $interview_id = $this->db->insertID();
      }

      return $interview_id;
      
    }

    public function getSurvayLand($interview_id){
        
        $builder = $this->db->table('LH_interview_land_detail');
        $builder->select('*');
        // $builder->join('LH_interview_house', 'LH_house.house_id = LH_interview_house.interview_house');
        // if ($interview_id){
        //   $builder = $builder->where('interview_id',$interview_id);
        //   $query = $builder->get()->getRowArray();
        //   return $query;
        // }
        
        $query = $builder->get()->getResultArray();
        return $query;

    }

    public function saveSurvayLand($data){

        $db = \Config\Database::connect();

        $data['cost_seed'] = $data['cost_seed'] ? $data['cost_seed'] : 0;
        $data['cost_fertilizer'] = $data['cost_fertilizer'] ? $data['cost_fertilizer'] : 0;
        $data['cost_drug'] = $data['cost_drug'] ? $data['cost_drug'] : 0;
        $data['cost_labor'] = $data['cost_labor'] ? $data['cost_labor'] : 0;
        $data['cost_oil'] = $data['cost_oil'] ? $data['cost_oil'] : 0;
        $data['cost_other'] = $data['cost_other'] ? $data['cost_other'] : 0;
        $data['detail_product'] = $data['detail_product'] ? $data['detail_product'] : 0;
        $data['detail_sell'] = $data['detail_sell'] ? $data['detail_sell'] : 0;
        $data['detail_price'] = $data['detail_price'] ? $data['detail_price'] : 0;
        $data['detail_price_year'] = $data['detail_price_year'] ? $data['detail_price_year'] : 0;

        $builder = $db->table('LH_interview_land_detail');
        if (!empty($data['detail_id'])){
          $detail_id = $data['detail_id'];
          $builder->where('detail_id',$data['detail_id']);
          unset($data['detail_id']);
          $builder->update($data);
        
        }else{
          unset($data['detail_id']);
          $builder->insert($data);
          $detail_id = $db->insertID();
        }
  
        return $detail_id;
  
    }

    public function saveSurvaySupport($data){

        $db = \Config\Database::connect();
        $builder = $db->table('LH_interview_land_support');
        if (!empty($data['supports'])){
            foreach ($data['supports'] as $key => $value) {

                $tmp = [];
                $tmp['interview_id'] = $data['interview_id'];
                $tmp['land_id'] = $data['land_id'];
                $tmp['support_id'] = $value['support_id'];
                $tmp['support_type'] = $value['support_type']?$value['support_type']:0;
                $tmp['support_detail'] = $value['support_detail'];

                if (!empty($tmp['support_id'])){                
                    $support_id = $tmp['support_id'];
                    $builder->where('support_id',$tmp['support_id']);
                    unset($tmp['support_id']);
                    $builder->update($tmp);
                    
                }else{
                    unset($tmp['support_id']);
                    $builder->insert($tmp);
                    $support_id = $db->insertID();
                }

            
            }
            return $support_id;
    
        }

        return null;

    }

    public function saveSurvaySupportOther($data){
        $db = \Config\Database::connect();
        $builder = $db->table('LH_interview_land_support_org');
        if (!empty($data['supports'])){
            foreach ($data['supports'] as $key => $value) {

                $tmp = [];
                $tmp['interview_id'] = $data['interview_id'];
                $tmp['land_id'] = $data['land_id'];
                $tmp['support_id'] = $value['support_id'];
                $tmp['org_id'] = $value['org_id']?$value['org_id']:0;
                $tmp['support_detail'] = $value['support_detail'];

                if (!empty($tmp['support_id'])){                
                    $support_id = $tmp['support_id'];
                    $builder->where('support_id',$tmp['support_id']);
                    unset($tmp['support_id']);
                    $builder->update($tmp);
                    
                }else{
                    unset($tmp['support_id']);
                    $builder->insert($tmp);
                    $support_id = $db->insertID();
                }

            
            }
            return $support_id;
    
        }

        return null;
    }

    public function saveSurvayProblem($data){

        $db = \Config\Database::connect();
        $builder = $db->table('LH_interview_land_problem');
        // if (!empty($data['income_id'])){
        //   $income_id = $data['income_id'];
        //   $builder->where('income_id',$data['income_id']);
        //   unset($data['income_id']);
        //   $builder->update($data);
        
        // }else{
        //   unset($data['income_id']);
          $tmp = [];
    
          foreach ($data['problem_type'] as $key => $value) {
            if (!empty($value['type'])){
                $tmp['interview_id'] = $data['interview_id'];
                $tmp['land_id'] = $data['land_id'];
                $tmp['problem_type'] = $key;
                $tmp['problem_detail'] = $value['detail'];
                $builder->insert($tmp);
                $problem_id = $db->insertID();
            }
          
          }
    
        // }
  
        return true;

    }

    public function saveNeed($data){
        $db = \Config\Database::connect();
        $builder = $db->table('LH_interview_land_need');
        if (!empty($data['needs'])){
            foreach ($data['needs'] as $key => $value) {

                $tmp = [];
                $tmp['interview_id'] = $data['interview_id'];
                $tmp['land_id'] = $data['land_id'];
                $tmp['need_id'] = $value['need_id'];
                $tmp['need_type'] = $value['need_type']?$value['need_type']:0;
                $tmp['need_detail'] = $value['need_detail'];

                if (!empty($tmp['need_id'])){                
                    $need_id = $tmp['need_id'];
                    $builder->where('need_id',$tmp['need_id']);
                    unset($tmp['need_id']);
                    $builder->update($tmp);
                    
                }else{
                    unset($tmp['need_id']);
                    $builder->insert($tmp);
                    $need_id = $db->insertID();
                }

            
            }
            return $need_id;
    
        }

        return null;
    }

 
}

 ?>
