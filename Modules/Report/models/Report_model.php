<?php
namespace Modules\Report\Models;
use CodeIgniter\Model;

class Report_model extends Model
{
  
    public function getAllSurvay($search = []){

        $builder = $this->db->table('LH_interview_land');
        $builder->select("LH_interview_land.*,
            VIEW_agriculturist_name.name as user_name,
            CODE_PROJECT.name as project_area,
            CODE_PROJECT.Description as project_name,
            CODE_PROJECTVILLAGE.Name as project_village,
            CODE_PROJECTVILLAGE.BasinName,
            LH_land.land_address,
            LH_land.land_code,
            LH_landuse.name as land_use,
            CONCAT(LH_prefix.name,LH_house_person.person_name,' ',LH_house_person.person_lastname) as person_name,
            LH_house.house_label,
            LH_house.house_number,
            LH_house_person.person_type_number,
            LH_house.house_moo,
            tambon.tam_name_t,
            amphoe.amp_name_t,
            province.pro_name_t,
            CODE_POSSESSRIGHT.name as land_possess,
            person_village.Name as person_village,

            STUFF((SELECT  ',' +LH_interview_land_support.support_detail
            FROM LH_interview_land_support
            WHERE LH_interview_land_support.interview_id = LH_interview_land.interview_id					 
            FOR XML PATH, TYPE).value(N'.[1]', N'varchar(max)'), 1, 2, '') as land_supports,

            STUFF((SELECT  ',' +LH_interview_land_support_org.support_detail
            FROM LH_interview_land_support_org
            WHERE LH_interview_land_support_org.interview_id = LH_interview_land.interview_id					 
            FOR XML PATH, TYPE).value(N'.[1]', N'varchar(max)'), 1, 2, '') as land_support_org,

            STUFF((SELECT  ',' +LH_interview_land_need.need_detail
            FROM LH_interview_land_need
            WHERE LH_interview_land_need.interview_id = LH_interview_land.interview_id					 
            FOR XML PATH, TYPE).value(N'.[1]', N'varchar(max)'), 1, 2, '') as land_needs,

            STUFF((SELECT  ',' +LH_interview_land_problem.problem_detail
            FROM LH_interview_land_problem
            WHERE LH_interview_land_problem.interview_id = LH_interview_land.interview_id order by 	LH_interview_land_problem.problem_id	 
            FOR XML PATH, TYPE).value(N'.[1]', N'varchar(max)'), 1, 2, '') as land_problems,
        ");
        $builder->join('LH_land', 'LH_land.land_id = LH_interview_land.interview_code');
        $builder->join('LH_landuse', 'LH_landuse.landuse_id = LH_land.land_use');

        $builder->join('LH_house_person', 'LH_house_person.person_id = LH_interview_land.interview_person_id');
        $builder->join('LH_house', 'LH_house.house_id = LH_house_person.house_id');
        $builder->join('LH_prefix', 'LH_prefix.prefix_id = LH_house_person.person_prename');

        
        $builder->join('CODE_PROJECTVILLAGE as person_village', 'person_village.Code = LH_house.house_label 
        and person_village.ProvinceId = LH_house.house_province 
        and CONCAT(person_village.ProvinceId,\'\',person_village.AmphurId) = LH_house.house_district
        and CONCAT(person_village.ProvinceId,\'\',person_village.AmphurId,\'\',person_village.TamBonId) = LH_house.house_subdistrict
        ','left');

        $builder->join('amphoe', 'amphoe.amp_code = LH_house.house_district');
        $builder->join('province', 'province.prov_code = LH_house.house_province');
        $builder->join('tambon', 'tambon.tam_code = LH_house.house_subdistrict');
        
        $builder->join('CODE_PROJECT', 'CODE_PROJECT.Code = LH_interview_land.interview_project');
        $builder->join('CODE_PROJECTVILLAGE', 'CODE_PROJECTVILLAGE.Code = LH_interview_land.interview_house_id and CODE_PROJECTVILLAGE.projectId = LH_interview_land.interview_project');
        $builder->join('VIEW_agriculturist_name','VIEW_agriculturist_name.id_card = LH_interview_land.interview_user','left');
        $builder->join('CODE_POSSESSRIGHT', 'CODE_POSSESSRIGHT.Code = LH_interview_land.interview_land_holding ','left');
        

        if (!empty($search)){
            if (!empty($search['interview_year'])){
                $builder->where('LH_interview_land.interview_year',$search['interview_year']);
            }
            if (!empty($search['interview_basin'])){
                $builder->where('CODE_PROJECTVILLAGE.BasinName',$search['interview_basin']);
            }
            if (!empty($search['interview_project'])){
                $builder->where('LH_interview_land.interview_project',$search['interview_project']);
            }
            if (!empty($search['interview_area'])){
                $builder->where('LH_interview_land.interview_area',$search['interview_area']);
            }
            if (!empty($search['interview_house_id'])){
                $builder->where('LH_interview_land.interview_house_id',$search['interview_house_id']);
            }
            if (!empty($search['interview_person_id'])){
                $builder->where('LH_interview_land.interview_person_id',$search['interview_person_id']);
            }
            if (!empty($search['interview_code'])){
                $builder->where('LH_interview_land.interview_code',$search['interview_code']);
            }
        }


        $query = $builder->get()->getResultArray();
        
        return $query;
    }

    public function getSurvayDetail($land){

        $builder = $this->db->table('LH_interview_land');
        $builder->select("LH_interview_land.*,
        CODE_PROJECT.name as project_area,
        CODE_PROJECT.Description as project_name,
        CODE_PROJECTVILLAGE.Name as project_village, 
        CONCAT(LH_prefix.name,LH_house_person.person_name,' ',LH_house_person.person_lastname) as person_name,
        LH_house.house_label,
        LH_house.house_number,
        LH_land.land_code,
        LH_house_person.person_type_number,   
        LH_house.house_moo,
        tambon.tam_name_t,
        amphoe.amp_name_t,
        province.pro_name_t,
        LH_interview_land_detail.*,
        CODE_PRODUCT.name as product_name,
        CODE_PRODUCTTYPE.Name as product_type_name,
        CODE_PRODUCTGROUP.Name as product_group_name,
        person_village.Name as person_village,
        LH_interview_land_product.*");

        $builder->join('LH_land', 'LH_land.land_id = LH_interview_land.interview_code','left');
        $builder->join('LH_interview_land_detail','LH_interview_land_detail.interview_id = LH_interview_land.interview_id');
        $builder->join('LH_interview_land_product', 'LH_interview_land_product.detail_id = LH_interview_land_detail.detail_id');
        $builder->join('CODE_PRODUCT', 'CODE_PRODUCT.Code = LH_interview_land_detail.detail_type');

        $builder->join('CODE_PRODUCTTYPE', 'CODE_PRODUCTTYPE.Code = CODE_PRODUCT.TypeCode');
        $builder->join('CODE_PRODUCTGROUP', 'CODE_PRODUCTGROUP.Code = CODE_PRODUCT.GroupCode');

        $builder->join('LH_house_person', 'LH_house_person.person_id = LH_interview_land.interview_person_id');
        $builder->join('LH_house', 'LH_house.house_id = LH_house_person.house_id');
        $builder->join('LH_prefix', 'LH_prefix.prefix_id = LH_house_person.person_prename');

        $builder->join('CODE_PROJECTVILLAGE as person_village', 'person_village.Code = LH_house.house_label 
        and person_village.ProvinceId = LH_house.house_province 
        and CONCAT(person_village.ProvinceId,\'\',person_village.AmphurId) = LH_house.house_district
        and CONCAT(person_village.ProvinceId,\'\',person_village.AmphurId,\'\',person_village.TamBonId) = LH_house.house_subdistrict
        ','left');

        $builder->join('amphoe', 'amphoe.amp_code = LH_house.house_district');
        $builder->join('province', 'province.prov_code = LH_house.house_province');
        $builder->join('tambon', 'tambon.tam_code = LH_house.house_subdistrict');

    
        $builder->join('CODE_PROJECT', 'CODE_PROJECT.Code = LH_interview_land.interview_project');
        $builder->join('CODE_PROJECTVILLAGE', 'CODE_PROJECTVILLAGE.Code = LH_interview_land.interview_house_id and CODE_PROJECTVILLAGE.projectId = LH_interview_land.interview_project');
      
        $builder->where('LH_interview_land.interview_code',$land);
        $query = $builder->get()->getResultArray();
        
        
        $data  = [];
        $product  = [];
        foreach ($query as $key => $value) {    
          $data['data'][$value['interview_id']][$value['detail_id']] = $value;
          $data[$value['data_type']][$value['interview_id']][$value['detail_id']][] = $value;

        }
        // หา ผลรวม
        foreach ($data['dressing'] as $interview => $val) {  
            foreach ($val as $key => $value) {                      
                $data['data'][$interview][$key]['dressing'] = array_sum(array_column($value, 'product_value')) *  array_sum(array_column($value, 'product_price'));  
            }
        }
        foreach ($data['drug'] as $interview => $val) {  
            foreach ($val as $key => $value) {                      
                $data['data'][$interview][$key]['drug'] = array_sum(array_column($value, 'product_value')) *  array_sum(array_column($value, 'product_price'));  
            }
        }
        foreach ($data['hormone'] as $interview => $val) {  
            foreach ($val as $key => $value) {                      
                $data['data'][$interview][$key]['hormone'] = array_sum(array_column($value, 'product_value')) *  array_sum(array_column($value, 'product_price'));  
            }
        }
        foreach ($data['staff'] as $interview => $val) {  
            foreach ($val as $key => $value) {                      
                $data['data'][$interview][$key]['staff'] = array_sum(array_column($value, 'product_value')) *  array_sum(array_column($value, 'product_price'));  
            }
        }
        //ลักษณะ query
        foreach ($data['product'] as $interview => $item) {    
            foreach ($item as $keys => $product) {          
                foreach ($product as $key => $value) {                               
                    $data['data'][$interview][$keys]['product'][$value['rec_id']]['product_value'] = $value['product_value'];
                    $data['data'][$interview][$keys]['product'][$value['rec_id']]['product_price'] = $value['product_price']; 
                    $data['data'][$interview][$keys]['product'][$value['rec_id']]['product_market'] = $value['product_market_label'];
                    $data['data'][$interview][$keys]['product'][$value['rec_id']]['product_type'] = $value['product_type_label'];
                }
            }
            
        } 
        
      
        return $data['data'];

    }
}