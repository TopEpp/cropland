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
        $builder->select("LH_interview_land.*,
            VIEW_agriculturist_name.name as user_name,
            CODE_PROJECT.name as project_area,
            CODE_PROJECT.Description as project_name,
            CODE_PROJECTVILLAGE.Name as project_village,
            LH_land.land_address,
            LH_landuse.name as land_use,
            CONCAT(LH_prefix.name,LH_house_person.person_name,' ',LH_house_person.person_lastname) as person_name,
            LH_house.house_label,
            CONCAT('บ้านเลขที่ ',LH_house.house_number,' หมู่ที่ ',
                    LH_house.house_moo,' ตำบล ',tambon.tam_name_t,' อำเภอ ',amphoe.amp_name_t,' จังหวัด ',province.pro_name_t
                    ) 
                as person_address,
        ");
        $builder->join('LH_land', 'LH_land.land_code = LH_interview_land.interview_code');
        $builder->join('LH_landuse', 'LH_landuse.landuse_id = LH_land.land_use');

        $builder->join('LH_house_person', 'LH_house_person.person_id = LH_interview_land.interview_person_id');
        $builder->join('LH_house', 'LH_house.house_id = LH_house_person.house_id');
        $builder->join('LH_prefix', 'LH_prefix.prefix_id = LH_house_person.person_prename');

        $builder->join('amphoe', 'amphoe.amp_code = LH_house.house_district');
        $builder->join('province', 'province.prov_code = LH_house.house_province');
        $builder->join('tambon', 'tambon.tam_code = LH_house.house_subdistrict');
        
        $builder->join('CODE_PROJECT', 'CODE_PROJECT.Code = LH_interview_land.interview_project');
        $builder->join('CODE_PROJECTVILLAGE', 'CODE_PROJECTVILLAGE.Code = LH_interview_land.interview_house_id and CODE_PROJECTVILLAGE.projectId = LH_interview_land.interview_project');
        $builder->join('VIEW_agriculturist_name','VIEW_agriculturist_name.id_card = LH_interview_land.interview_user','left');
        if ($id){
          $builder = $builder->where('LH_interview_land.interview_id',$id);
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

    public function getSurvayLand($interview_id,$detail_id = ''){
        
        $builder = $this->db->table('LH_interview_land_detail');
        $builder->select('LH_interview_land_detail.*,
                        LH_landuse.name as landuse,
                        CODE_PRODUCT.name as product_name,
                        LH_interview_land_product.*');
        $builder->join('LH_interview_land_product', 'LH_interview_land_product.detail_id = LH_interview_land_detail.detail_id');
        $builder->join('LH_landuse', 'LH_landuse.landuse_id = LH_interview_land_detail.detail_use');
        $builder->join('CODE_PRODUCT', 'CODE_PRODUCT.Code = LH_interview_land_detail.detail_type');
        $builder = $builder->where('LH_interview_land_detail.interview_id',$interview_id);

        if ($detail_id != ''){
            $builder = $builder->where('LH_interview_land_detail.detail_id',$detail_id);           
            $query = $builder->get()->getResultArray();
            
            $data  = [];
            $product  = [];
            foreach ($query as $key => $value) {
                $data['data'] = $value;
                $data[$value['data_type']][] = $value;
            }
        //   dd($data);

            return $data;
       
        }
        
        $query = $builder->get()->getResultArray();
        $data  = [];
        $product  = [];
        foreach ($query as $key => $value) {
          
          $data['data'][$value['detail_id']] = $value;
          $data[$value['data_type']][$value['detail_id']][] = $value;

        }
        
        foreach ($data['dressing'] as $key => $value) {            
            $data['data'][$key]['dressing'] = array_sum(array_column($value, 'product_value')) *  array_sum(array_column($value, 'product_price'));  
        }

        foreach ($data['drug'] as $key => $value) {            
            $data['data'][$key]['drug'] = array_sum(array_column($value, 'product_value')) *  array_sum(array_column($value, 'product_price'));  
        } 

        foreach ($data['hormone'] as $key => $value) {            
            $data['data'][$key]['hormone'] = array_sum(array_column($value, 'product_value')) *  array_sum(array_column($value, 'product_price'));  
        } 

        foreach ($data['staff'] as $key => $value) {            
            $data['data'][$key]['staff'] = array_sum(array_column($value, 'product_value')) *  array_sum(array_column($value, 'product_price'));  
        } 

        foreach ($data['product'] as $key => $value) {            
            $data['data'][$key]['product_value'] = array_sum(array_column($value, 'product_value')); 
            $data['data'][$key]['product_price'] = array_sum(array_column($value, 'product_price'));  
            $data['data'][$key]['product_market'] = implode(', ',array_column($value, 'product_market_label'));
            $data['data'][$key]['product_type'] = implode(', ',array_column($value, 'product_type_label'));  
            
        } 
        
     

        return $data;
        

    }

    public function saveSurvayLand($data){

        $db = \Config\Database::connect();

        $tmp = $data;

        unset($data['dressing']);
        unset($data['drug']);
        unset($data['hormone']);
        unset($data['staff']);
        unset($data['product']);
         
        $data['seed_value'] = $data['seed_value'] ? $data['seed_value'] : 0;
        // $data['cost_fertilizer'] = $data['cost_fertilizer'] ? $data['cost_fertilizer'] : 0;
        // $data['cost_drug'] = $data['cost_drug'] ? $data['cost_drug'] : 0;
        // $data['cost_labor'] = $data['cost_labor'] ? $data['cost_labor'] : 0;
        // $data['cost_oil'] = $data['cost_oil'] ? $data['cost_oil'] : 0;
        // $data['cost_other'] = $data['cost_other'] ? $data['cost_other'] : 0;
        // $data['detail_product'] = $data['detail_product'] ? $data['detail_product'] : 0;
        // $data['detail_sell'] = $data['detail_sell'] ? $data['detail_sell'] : 0;
        // $data['detail_price'] = $data['detail_price'] ? $data['detail_price'] : 0;
        // $data['detail_price_year'] = $data['detail_price_year'] ? $data['detail_price_year'] : 0;

        $builder = $db->table('LH_interview_land_detail');
        if (!empty($data['detail_id'])){
          $detail_id = $data['detail_id'];
          $builder->where('detail_id',$data['detail_id']);
          unset($data['detail_id']);
          $res= $builder->update($data);

          //edit detail product
          if ($detail_id){
            $builder = $db->table('LH_interview_land_product');
            // dressing ปุ๋ย
            if (!empty($tmp['dressing'])){
                foreach ($tmp['dressing'] as $key => $value) {
                    $tmp_product = [];
                    $tmp_product['data_type'] = 'dressing';
                    $tmp_product['interview_id'] = $data['interview_id'];
                    $tmp_product['land_id'] = $data['land_id'];
                    $tmp_product['detail_id'] = $detail_id;                    
                    $tmp_product['rec_id'] = @$value['rec_id'];
                    $tmp_product['product_type'] = $value['product_type'];
                    $tmp_product['product_value'] = $value['product_value']?$value['product_value']:0;
                    $tmp_product['product_unit'] = $value['product_unit'];
                    $tmp_product['product_price'] = $value['product_price']?$value['product_price']:0;
                    $tmp_product['product_branch'] = $value['product_branch'];
                    $tmp_product['product_branch_label'] = $value['product_branch_label'];
                    $tmp_product['product_type_label'] = $value['product_type_label'];
                    $tmp_product['product_unit_label'] = $value['product_unit_label'];

                    if (!empty($tmp_product['rec_id'])){                
                        
                        $builder->where('rec_id',$tmp_product['rec_id']);
                        unset($tmp_product['rec_id']);
                        $builder->update($tmp_product);
                        
                    }else{
                        unset($tmp_product['rec_id']);
                        $builder->insert($tmp_product);
                        $db->insertID();
                    }
    
                
                }
            }

            // drug ยา
            if (!empty($tmp['drug'])){
                foreach ($tmp['drug'] as $key => $value) {
                    $tmp_product = [];
                    $tmp_product['data_type'] = 'drug';
                    $tmp_product['interview_id'] = $data['interview_id'];
                    $tmp_product['land_id'] = $data['land_id'];
                    $tmp_product['detail_id'] = $detail_id;                    
                    $tmp_product['rec_id'] = @$value['rec_id'];
                    $tmp_product['product_type'] = $value['product_type'];
                    $tmp_product['product_value'] = $value['product_value']?$value['product_value']:0;
                    $tmp_product['product_unit'] = $value['product_unit'];
                    $tmp_product['product_price'] = $value['product_price']?$value['product_price']:0;                    
                    $tmp_product['product_branch'] = $value['product_branch'];
                    $tmp_product['product_branch_label'] = $value['product_branch_label'];
                    $tmp_product['product_type_label'] = $value['product_type_label'];
                    $tmp_product['product_unit_label'] = $value['product_unit_label'];

                    if (!empty($tmp_product['rec_id'])){                
                        
                        $builder->where('rec_id',$tmp_product['rec_id']);
                        unset($tmp_product['rec_id']);
                        $builder->update($tmp_product);
                        
                    }else{
                        unset($tmp_product['rec_id']);
                        $builder->insert($tmp_product);
                        $db->insertID();
                    }
    
                
                }
            }

            // hormone  ฮอร์โมน
            if (!empty($tmp['hormone'])){
                foreach ($tmp['hormone'] as $key => $value) {
                    $tmp_product = [];
                    $tmp_product['data_type'] = 'hormone';
                    $tmp_product['interview_id'] = $data['interview_id'];
                    $tmp_product['land_id'] = $data['land_id'];
                    $tmp_product['detail_id'] = $detail_id;                    
                    $tmp_product['rec_id'] = @$value['rec_id'];
                    $tmp_product['product_type'] = @$value['product_type'];
                    $tmp_product['product_value'] = $value['product_value']?$value['product_value']:0;
                    $tmp_product['product_unit'] = $value['product_unit'];
                    $tmp_product['product_price'] = $value['product_price']?$value['product_price']:0;                                                
                    $tmp_product['product_type_label'] = $value['product_type_label'];
                    $tmp_product['product_unit_label'] = $value['product_unit_label'];

                    if (!empty($tmp_product['rec_id'])){                
                        
                        $builder->where('rec_id',$tmp_product['rec_id']);
                        unset($tmp_product['rec_id']);
                        $builder->update($tmp_product);
                        
                    }else{
                        unset($tmp_product['rec_id']);
                        $builder->insert($tmp_product);
                        $db->insertID();
                    }
    
                
                }
            }

            // staff  พนักงาน
            if (!empty($tmp['staff'])){
                foreach ($tmp['staff'] as $key => $value) {
                    $tmp_product = [];
                    $tmp_product['data_type'] = 'staff';
                    $tmp_product['interview_id'] = $data['interview_id'];
                    $tmp_product['land_id'] = $data['land_id'];
                    $tmp_product['detail_id'] = $detail_id;                    
                    $tmp_product['rec_id'] = @$value['rec_id'];
                    $tmp_product['product_type'] = $value['product_type'];
                    $tmp_product['product_value'] = $value['product_value']?$value['product_value']:0;
                    $tmp_product['product_unit'] = $value['product_unit'];
                    $tmp_product['product_price'] = $value['product_price']?$value['product_price']:0;                    
                    $tmp_product['product_branch'] = $value['product_branch'];
                    $tmp_product['product_branch_label'] = $value['product_branch_label'];
                    $tmp_product['product_type_label'] = $value['product_type_label'];
                    

                    if (!empty($tmp_product['rec_id'])){                
                        
                        $builder->where('rec_id',$tmp_product['rec_id']);
                        unset($tmp_product['rec_id']);
                        $builder->update($tmp_product);
                        
                    }else{
                        unset($tmp_product['rec_id']);
                        $builder->insert($tmp_product);
                        $db->insertID();
                    }
    
                
                }
            }

            // product  ผลผลิต
            if (!empty($tmp['product'])){
                foreach ($tmp['product'] as $key => $value) {
                    $tmp_product = [];
                    $tmp_product['data_type'] = 'product';
                    $tmp_product['interview_id'] = $data['interview_id'];
                    $tmp_product['land_id'] = $data['land_id'];
                    $tmp_product['detail_id'] = $detail_id;                    
                    $tmp_product['rec_id'] = @$value['rec_id'];
                    $tmp_product['product_type'] = $value['product_type'];
                    $tmp_product['product_value'] = $value['product_value']?$value['product_value']:0;
                    $tmp_product['product_unit'] = $value['product_unit'];
                    $tmp_product['product_price'] = $value['product_price']?$value['product_price']:0;
                    $tmp_product['product_market'] = $value['product_market'];
                    $tmp_product['product_market_label'] = $value['product_market_label'];
                    $tmp_product['product_type_label'] = $value['product_type_label'];
                    $tmp_product['product_unit_label'] = $value['product_unit_label'];                

                    if (!empty($tmp_product['rec_id'])){                
                        
                        $builder->where('rec_id',$tmp_product['rec_id']);
                        unset($tmp_product['rec_id']);
                        $builder->update($tmp_product);
                        
                    }else{
                        unset($tmp_product['rec_id']);
                        $builder->insert($tmp_product);
                        $db->insertID();
                    }
    
                
                }
            }

          }
          
        
        }else{
          unset($data['detail_id']);
          $builder->insert($data);
          $detail_id = $db->insertID();

          //insert detail product
          if ($detail_id){
            $builder = $db->table('LH_interview_land_product');
            // dressing ปุ๋ย
            if (!empty($tmp['dressing'])){
                foreach ($tmp['dressing'] as $key => $value) {
                    $tmp_product = [];
                    $tmp_product['data_type'] = 'dressing';
                    $tmp_product['interview_id'] = $data['interview_id'];
                    $tmp_product['land_id'] = $data['land_id'];
                    $tmp_product['detail_id'] = $detail_id;                    
                    $tmp_product['rec_id'] = @$value['rec_id'];
                    $tmp_product['product_type'] = $value['product_type'];
                    $tmp_product['product_value'] = $value['product_value']?$value['product_value']:0;
                    $tmp_product['product_unit'] = $value['product_unit'];
                    $tmp_product['product_price'] = $value['product_price']?$value['product_price']:0;
                    $tmp_product['product_branch'] = $value['product_branch'];
                    $tmp_product['product_branch_label'] = $value['product_branch_label'];
                    $tmp_product['product_type_label'] = $value['product_type_label'];
                    $tmp_product['product_unit_label'] = $value['product_unit_label'];

                    if (!empty($tmp_product['rec_id'])){                
                        
                        $builder->where('rec_id',$tmp_product['rec_id']);
                        unset($tmp_product['rec_id']);
                        $builder->update($tmp_product);
                        
                    }else{
                        unset($tmp_product['rec_id']);
                        $builder->insert($tmp_product);
                        $db->insertID();
                    }
    
                
                }
            }

            // drug ยา
            if (!empty($tmp['drug'])){
                foreach ($tmp['drug'] as $key => $value) {
                    $tmp_product = [];
                    $tmp_product['data_type'] = 'drug';
                    $tmp_product['interview_id'] = $data['interview_id'];
                    $tmp_product['land_id'] = $data['land_id'];
                    $tmp_product['detail_id'] = $detail_id;                    
                    $tmp_product['rec_id'] = @$value['rec_id'];
                    $tmp_product['product_type'] = $value['product_type'];
                    $tmp_product['product_value'] = $value['product_value']?$value['product_value']:0;
                    $tmp_product['product_unit'] = $value['product_unit'];
                    $tmp_product['product_price'] = $value['product_price']?$value['product_price']:0;                    
                    $tmp_product['product_branch'] = $value['product_branch'];
                    $tmp_product['product_branch_label'] = $value['product_branch_label'];
                    $tmp_product['product_type_label'] = $value['product_type_label'];
                    $tmp_product['product_unit_label'] = $value['product_unit_label'];

                    if (!empty($tmp_product['rec_id'])){                
                        
                        $builder->where('rec_id',$tmp_product['rec_id']);
                        unset($tmp_product['rec_id']);
                        $builder->update($tmp_product);
                        
                    }else{
                        unset($tmp_product['rec_id']);
                        $builder->insert($tmp_product);
                        $db->insertID();
                    }
                
                }
            }

            // hormone  ฮอร์โมน
            if (!empty($tmp['hormone'])){
                foreach ($tmp['hormone'] as $key => $value) {
                    $tmp_product = [];
                    $tmp_product['data_type'] = 'hormone';
                    $tmp_product['interview_id'] = $data['interview_id'];
                    $tmp_product['land_id'] = $data['land_id'];
                    $tmp_product['detail_id'] = $detail_id;                    
                    $tmp_product['rec_id'] = @$value['rec_id'];
                    $tmp_product['product_type'] = @$value['product_type'];
                    $tmp_product['product_value'] = $value['product_value']?$value['product_value']:0;
                    $tmp_product['product_unit'] = $value['product_unit'];
                    $tmp_product['product_price'] = $value['product_price']?$value['product_price']:0;                                      
                    $tmp_product['product_type_label'] = $value['product_type_label'];
                    $tmp_product['product_unit_label'] = $value['product_unit_label'];

                    if (!empty($tmp_product['rec_id'])){                
                        
                        $builder->where('rec_id',$tmp_product['rec_id']);
                        unset($tmp_product['rec_id']);
                        $builder->update($tmp_product);
                        
                    }else{
                        unset($tmp_product['rec_id']);
                        $builder->insert($tmp_product);
                        $db->insertID();
                    }
    
                
                }
            }

            // staff  พนักงาน
            if (!empty($tmp['staff'])){
                foreach ($tmp['staff'] as $key => $value) {
                    $tmp_product = [];
                    $tmp_product['data_type'] = 'staff';
                    $tmp_product['interview_id'] = $data['interview_id'];
                    $tmp_product['land_id'] = $data['land_id'];
                    $tmp_product['detail_id'] = $detail_id;                    
                    $tmp_product['rec_id'] = @$value['rec_id'];
                    $tmp_product['product_type'] = $value['product_type'];
                    $tmp_product['product_value'] = $value['product_value']?$value['product_value']:0;
                    $tmp_product['product_unit'] = $value['product_unit'];
                    $tmp_product['product_price'] = $value['product_price']?$value['product_price']:0;                    
                    $tmp_product['product_branch'] = $value['product_branch'];
                    $tmp_product['product_branch_label'] = $value['product_branch_label'];
                    $tmp_product['product_type_label'] = $value['product_type_label'];
                    

                    if (!empty($tmp_product['rec_id'])){                
                        
                        $builder->where('rec_id',$tmp_product['rec_id']);
                        unset($tmp_product['rec_id']);
                        $builder->update($tmp_product);
                        
                    }else{
                        unset($tmp_product['rec_id']);
                        $builder->insert($tmp_product);
                        $db->insertID();
                    }
    
                
                }
            }

            // product  ผลผลิต
            if (!empty($tmp['product'])){
                foreach ($tmp['product'] as $key => $value) {
                    $tmp_product = [];
                    $tmp_product['data_type'] = 'product';
                    $tmp_product['interview_id'] = $data['interview_id'];
                    $tmp_product['land_id'] = $data['land_id'];
                    $tmp_product['detail_id'] = $detail_id;                    
                    $tmp_product['rec_id'] = @$value['rec_id'];
                    $tmp_product['product_type'] = $value['product_type'];
                    $tmp_product['product_value'] = $value['product_value']?$value['product_value']:0;
                    $tmp_product['product_unit'] = $value['product_unit'];
                    $tmp_product['product_price'] = $value['product_price']?$value['product_price']:0;
                    $tmp_product['product_market'] = $value['product_market'];
                    $tmp_product['product_market_label'] = $value['product_market_label'];
                    $tmp_product['product_type_label'] = $value['product_type_label'];
                    $tmp_product['product_unit_label'] = $value['product_unit_label'];                

                    if (!empty($tmp_product['rec_id'])){                
                        
                        $builder->where('rec_id',$tmp_product['rec_id']);
                        unset($tmp_product['rec_id']);
                        $builder->update($tmp_product);
                        
                    }else{
                        unset($tmp_product['rec_id']);
                        $builder->insert($tmp_product);
                        $db->insertID();
                    }
    
                
                }
            }

          }
          
        }
  
        return $detail_id;
  
    }

    public function getSupports($interview_id){    
        $builder = $this->db->table('LH_interview_land_support');
        $builder->select('*');    
        $builder->where('interview_id',$interview_id);
        $query = $builder->get()->getResultArray();
        return $query;

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

    public function getSupportsOther($interview_id){    
        $builder = $this->db->table('LH_interview_land_support_org');
        $builder->select('*');    
        $builder->where('interview_id',$interview_id);
        $query = $builder->get()->getResultArray();
        return $query;

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

    public function getProblem($interview_id){
        $builder = $this->db->table('LH_interview_land_problem');
        $builder->select('*');    
        $builder->where('interview_id',$interview_id);
        $query = $builder->get()->getResultArray();
        
        // $tmp = [];
        // foreach ($query as $key => $value) {
        //     $tmp[$value['problem_type']] = $value;
        // }
        return $query;
    }

    public function saveSurvayProblem($data){

        $db = \Config\Database::connect();
        $builder = $db->table('LH_interview_land_problem');
       
        if (!empty($data['problems'])){
            foreach ($data['problems'] as $key => $value) {

                $tmp = [];
                $tmp['interview_id'] = $data['interview_id'];
                $tmp['land_id'] = $data['land_id'];
                $tmp['problem_id'] = $value['problem_id'];
                $tmp['problem_type'] = $value['problem_type']?$value['problem_type']:0;
                $tmp['problem_detail'] = $value['problem_detail'];

                if (!empty($tmp['problem_id'])){                
                    $problem_id = $tmp['problem_id'];
                    $builder->where('problem_id',$tmp['problem_id']);
                    unset($tmp['problem_id']);
                    $builder->update($tmp);
                    
                }else{
                    unset($tmp['problem_id']);
                    $builder->insert($tmp);
                    $need_id = $db->insertID();
                }

            
            }
            return $need_id;
    
        }

        return null;
        
    }

    public function getNeed($interview_id){    
        $builder = $this->db->table('LH_interview_land_need');
        $builder->select('*');    
        $builder->where('interview_id',$interview_id);
        $query = $builder->get()->getResultArray();
        return $query;

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
