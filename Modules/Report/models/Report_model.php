<?php
namespace Modules\Report\Models;
use CodeIgniter\Model;

class Report_model extends Model
{
  
    public function getAllSurvay($search = []){

        $builder = $this->db->table('LH_interview_land');
        $builder->select("LH_interview_land.*,
            LH_users.fullname as user_name,
            vLinkAreaDetail_growerCrops.target_name as project_area,
            vLinkAreaDetail_growerCrops.target_area_type_title as project_name,
            CODE_PROJECTVILLAGE.Name as project_village,
            CODE_PROJECTVILLAGE.BasinName,
            LH_land.land_address,
            LH_land.land_code,
            LH_landuse.name as land_use,
            CONCAT(LH_prefix.name,LH_house_person.person_name,' ',LH_house_person.person_lastname) as person_name,
            LH_house.house_label,
            LH_house.house_number,
            LH_house_person.person_type_number,
            LH_house_person.person_number,
            LH_house.house_moo,
            CODE_TAMBON.TAM_T as tam_name_t,
            CODE_AMPHUR.AMP_T as amp_name_t,
            CODE_PROVINCE.Name as pro_name_t,
            CODE_POSSESSRIGHT.name as land_possess,
            person_village.Name as person_village,

            STUFF((SELECT  ',' +CODE_PRODUCTTYPE.Name
            FROM LH_interview_land_detail
            join CODE_PRODUCTTYPE on CODE_PRODUCTTYPE.Code = LH_interview_land_detail.detail_use_type
            WHERE LH_interview_land_detail.interview_id = LH_interview_land.interview_id	
            			 
            FOR XML PATH, TYPE).value(N'.[1]', N'varchar(max)'), 1, 2, '') as land_detail,

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
        $builder->join('LH_land', 'LH_land.land_code = LH_interview_land.interview_code');
        $builder->join('LH_landuse', 'LH_landuse.landuse_id = LH_land.land_use');

        $builder->join('LH_house_person', 'LH_house_person.person_id = LH_interview_land.interview_person_id');
        $builder->join('LH_house', 'LH_house.house_id = LH_house_person.house_id');
        $builder->join('LH_prefix', 'LH_prefix.prefix_id = LH_house_person.person_prename');

        
        $builder->join('CODE_PROJECTVILLAGE as person_village', '
        person_village.Code = LH_house.house_label 
        and person_village.ProvinceId = LH_house.house_province 
        and person_village.AmphurId = LH_house.house_district
        and person_village.TamBonId = LH_house.house_subdistrict
        ','left');

        $builder->join('CODE_PROVINCE', 'CODE_PROVINCE.Code = LH_house.house_province','left');
        $builder->join('CODE_AMPHUR', 'CAST(CODE_AMPHUR.AMP_CODE as int) = LH_house.house_district and CODE_PROVINCE.Code = CODE_AMPHUR.PROV_CODE','left');      
        $builder->join('CODE_TAMBON', 'CAST(CODE_TAMBON.TAM_CODE as int) = LH_house.house_subdistrict and CODE_PROVINCE.Code = CODE_TAMBON.PROV_CODE and CODE_AMPHUR.AMP_CODE = CODE_TAMBON.AMP_CODE','left');      
        
        // $builder->join('CODE_PROJECT', 'CODE_PROJECT.Code = LH_interview_land.interview_project');
        $builder->join('vLinkAreaDetail_growerCrops', 'vLinkAreaDetail_growerCrops.target_code_gis = LH_interview_house.interview_project_name and 
        vLinkAreaDetail_growerCrops.target_area_type_id = LH_interview_house.interview_project and
        vLinkAreaDetail_growerCrops.VILLAGE_ID = LH_house.house_home');    

        $builder->join('CODE_PROJECTVILLAGE', 'CODE_PROJECTVILLAGE.Code = LH_interview_land.interview_house_id and CODE_PROJECTVILLAGE.projectId = LH_interview_land.interview_project');
        $builder->join('LH_users','LH_users.emp_id = LH_interview_land.interview_user','left');
        $builder->join('CODE_POSSESSRIGHT', 'CODE_POSSESSRIGHT.Code = LH_interview_land.interview_land_holding ','left');
        

        if (!empty($search)){
            if (!empty($search['interview_year'])){
                $builder->where('LH_interview_land.interview_year',$search['interview_year']);
            }
            if (!empty($search['interview_basin'])){
                $builder->where('CODE_PROJECTVILLAGE.BasinName',$search['interview_basin']);
            }
            if (!empty($search['interview_project'])){
                $builder->where('vLinkAreaDetail_growerCrops.target_code_gis',$search['interview_project']);
            }
            if (!empty($search['interview_type'])){
                $builder->where('vLinkAreaDetail_growerCrops.target_area_type_id',$search['interview_type']);
                // $builder->where('LH_interview_land.interview_area',$search['interview_area']);
            }
            // if (!empty($search['interview_house_id'])){
            //     $builder->where('LH_interview_land.interview_house_id',$search['interview_house_id']);
            // }
            // if (!empty($search['interview_person_id'])){
            //     $builder->where('LH_interview_land.interview_person_id',$search['interview_person_id']);
            // }
            // if (!empty($search['interview_code'])){
            //     $builder->where('LH_interview_land.interview_code',$search['interview_code']);
            // }
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
        CODE_TAMBON.TAM_T as tam_name_t,
        CODE_AMPHUR.AMP_T as amp_name_t,
        CODE_PROVINCE.Name as pro_name_t,
        LH_interview_land_detail.*,
        CODE_PRODUCT.name as product_name,
        CODE_PRODUCTTYPE.Name as product_type_name,
        CODE_PRODUCTGROUP.Name as product_group_name,
        person_village.Name as person_village,
        LH_interview_land_product.*");

        $builder->join('LH_land', 'LH_land.land_code = LH_interview_land.interview_code','left');
        $builder->join('LH_interview_land_detail','LH_interview_land_detail.interview_id = LH_interview_land.interview_id','left');
        $builder->join('LH_interview_land_product', 'LH_interview_land_product.detail_id = LH_interview_land_detail.detail_id','left');
        $builder->join('CODE_PRODUCT', 'CODE_PRODUCT.Code = LH_interview_land_detail.detail_type');

        $builder->join('CODE_PRODUCTTYPE', 'CODE_PRODUCTTYPE.Code = CODE_PRODUCT.TypeCode');
        $builder->join('CODE_PRODUCTGROUP', 'CODE_PRODUCTGROUP.Code = CODE_PRODUCT.GroupCode');

        $builder->join('LH_house_person', 'LH_house_person.person_id = LH_interview_land.interview_person_id');
        $builder->join('LH_house', 'LH_house.house_id = LH_house_person.house_id');
        $builder->join('LH_prefix', 'LH_prefix.prefix_id = LH_house_person.person_prename');

        $builder->join('CODE_PROJECTVILLAGE as person_village', '
        person_village.Code = LH_house.house_label 
        and person_village.ProvinceId = LH_house.house_province 
        and person_village.AmphurId = LH_house.house_district
        and person_village.TamBonId = LH_house.house_subdistrict
        ','left');

        $builder->join('CODE_PROVINCE', 'CODE_PROVINCE.Code = LH_house.house_province','left');
        $builder->join('CODE_AMPHUR', 'CAST(CODE_AMPHUR.AMP_CODE as int) = LH_house.house_district and CODE_PROVINCE.Code = CODE_AMPHUR.PROV_CODE','left');      
        $builder->join('CODE_TAMBON', 'CAST(CODE_TAMBON.TAM_CODE as int) = LH_house.house_subdistrict and CODE_PROVINCE.Code = CODE_TAMBON.PROV_CODE and CODE_AMPHUR.AMP_CODE = CODE_TAMBON.AMP_CODE','left');      

    
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
        if (!empty($data)){
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
       
        
      
        return [];

    }


    public function getAllHouse($page = '',$group = '',$search = []){
        
        $builder = $this->db->table('LH_house');
        $builder->select("
            max(LH_house.house_number) as house_number,
            max(LH_house.house_moo) as house_moo,
            max(LH_house.house_moo_name) as house_moo_name,
            max(CODE_TAMBON.TAM_T) as tam_name_t,
            max(CODE_AMPHUR.AMP_T) as amp_name_t,
            max(CODE_PROVINCE.Name) as pro_name_t,
            sum(LH_land.land_area) as land_area,
            count(LH_house_person.person_id)as person_count,
            max(vLinkAreaDetail_growerCrops.target_name)as area,
            (SELECT SUM(a.income_value * income_month) 
                FROM LH_person_income a
                WHERE a.person_id = max(LH_house_person.person_id)) as income_value,

            (SELECT SUM(a.outcome_value * outcome_month) 
                FROM LH_person_outcome a
                WHERE a.person_id = max(LH_house_person.person_id)) as outcome_value
        ");

        if (!empty($search['interview_project'])){
            $builder->where('vLinkAreaDetail_growerCrops.target_code_gis',$search['interview_project']);
        }
        if (!empty($search['interview_type'])){
            $builder->where('vLinkAreaDetail_growerCrops.target_area_type_id',$search['interview_type']);
        }

        $builder->join('LH_interview_house', 'LH_interview_house.interview_house = LH_house.house_id');
     
        // $builder->join('CODE_PROJECT', 'CODE_PROJECT.Code = LH_interview_house.interview_project_name');        
      
        $builder->join('LH_house_person', 'LH_house_person.house_id = LH_house.house_id','left');
        $builder->join('vLinkAreaDetail_growerCrops', 'vLinkAreaDetail_growerCrops.target_code_gis = LH_interview_house.interview_project_name and 
        vLinkAreaDetail_growerCrops.target_area_type_id = LH_interview_house.interview_project and
        vLinkAreaDetail_growerCrops.VILLAGE_ID = LH_house.house_home');  

        $builder->join('LH_house_land', 'LH_house_land.person_id = LH_house_person.person_id','left');
        $builder->join('LH_land', 'LH_land.land_id = LH_house_land.land_id','left');

        $builder->join('CODE_PROVINCE', 'CODE_PROVINCE.Code = LH_house.house_province','left');
        $builder->join('CODE_AMPHUR', 'CAST(CODE_AMPHUR.AMP_CODE as int) = LH_house.house_district and CODE_PROVINCE.Code = CODE_AMPHUR.PROV_CODE','left');      
        $builder->join('CODE_TAMBON', 'CAST(CODE_TAMBON.TAM_CODE as int) = LH_house.house_subdistrict and CODE_PROVINCE.Code = CODE_TAMBON.PROV_CODE and CODE_AMPHUR.AMP_CODE = CODE_TAMBON.AMP_CODE','left'); 
        $builder->groupBy('LH_house.house_id');
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getAllJobs($page = '',$group = '',$search = []){
        $builder = $this->db->table('LH_house');
        $builder->select("
            max(LH_house.house_number) as house_number,
            max(LH_house.house_moo) as house_moo,
            max(LH_house.house_moo_name) as house_moo_name,
            max(CODE_TAMBON.TAM_T) as tam_name_t,
            max(CODE_AMPHUR.AMP_T) as amp_name_t,
            max(CODE_PROVINCE.Name) as pro_name_t,
            sum(LH_land.land_area) as land_area,            
            CONCAT(max(LH_prefix.name),max(LH_house_person.person_name),' ',max(LH_house_person.person_lastname)) as person_name,
            max(LH_house_person.person_number) as person_number,
            max(vLinkAreaDetail_growerCrops.target_name)as area,

            STUFF((SELECT  ',' +LH_jobs.name
            FROM LH_person_job
            join LH_jobs on LH_jobs.jobs_id = LH_person_job.job_type
            WHERE LH_person_job.person_id = LH_house_person.person_id and LH_person_job.job_main = '1'	 
            FOR XML PATH, TYPE).value(N'.[1]', N'varchar(max)'), 1, 2, '') as job_main,

            STUFF((SELECT  ',' +LH_jobs.name
            FROM LH_person_job
            join LH_jobs on LH_jobs.jobs_id = LH_person_job.job_type
            WHERE LH_person_job.person_id = LH_house_person.person_id and LH_person_job.job_main is null 
            FOR XML PATH, TYPE).value(N'.[1]', N'varchar(max)'), 1, 2, '') as job_second,
        ");

        if (!empty($search['interview_project'])){
            $builder->where('vLinkAreaDetail_growerCrops.target_code_gis',$search['interview_project']);
        }
        if (!empty($search['interview_type'])){
            $builder->where('vLinkAreaDetail_growerCrops.target_area_type_id',$search['interview_type']);
        }

        $builder->join('LH_interview_house', 'LH_interview_house.interview_house = LH_house.house_id');
     
        // $builder->join('CODE_PROJECT', 'CODE_PROJECT.Code = LH_interview_house.interview_project_name');        
     
        $builder->join('LH_house_person', 'LH_house_person.house_id = LH_house.house_id','left');
        $builder->join('vLinkAreaDetail_growerCrops', 'vLinkAreaDetail_growerCrops.target_code_gis = LH_interview_house.interview_project_name and 
        vLinkAreaDetail_growerCrops.target_area_type_id = LH_interview_house.interview_project and
        vLinkAreaDetail_growerCrops.VILLAGE_ID = LH_house.house_home');  
        $builder->join('LH_prefix', 'LH_prefix.prefix_id = LH_house_person.person_prename');

        $builder->join('LH_house_land', 'LH_house_land.person_id = LH_house_person.person_id','left');
        $builder->join('LH_land', 'LH_land.land_id = LH_house_land.land_id','left');

        $builder->join('CODE_PROVINCE', 'CODE_PROVINCE.Code = LH_house.house_province','left');
        $builder->join('CODE_AMPHUR', 'CAST(CODE_AMPHUR.AMP_CODE as int) = LH_house.house_district and CODE_PROVINCE.Code = CODE_AMPHUR.PROV_CODE','left');      
        $builder->join('CODE_TAMBON', 'CAST(CODE_TAMBON.TAM_CODE as int) = LH_house.house_subdistrict and CODE_PROVINCE.Code = CODE_TAMBON.PROV_CODE and CODE_AMPHUR.AMP_CODE = CODE_TAMBON.AMP_CODE','left'); 
        $builder->groupBy('LH_house_person.person_id');
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getAllLand($page = '',$group = '',$search = []){
        $builder = $this->db->table('LH_house');
        $builder->select("
            max(LH_house.house_number) as house_number,
            max(LH_house.house_moo) as house_moo,
            max(LH_house.house_moo_name) as house_moo_name,
            max(CODE_TAMBON.TAM_T) as tam_name_t,
            max(CODE_AMPHUR.AMP_T) as amp_name_t,
            max(CODE_PROVINCE.Name) as pro_name_t,
            max(LH_land.land_area) as land_area,
            max(LH_land.land_number) as land_number,
            max(LH_landuse.name) as landuse,
            max(vLinkAreaDetail_growerCrops.target_name)as area,
            max(LH_landowner.name) as land_resource,
            max(CODE_POSSESSRIGHT.name) as land_holding
            
          
        ");

        if (!empty($search['interview_project'])){
            $builder->where('vLinkAreaDetail_growerCrops.target_code_gis',$search['interview_project']);
        }
        if (!empty($search['interview_type'])){
            $builder->where('vLinkAreaDetail_growerCrops.target_area_type_id',$search['interview_type']);
        }

        $builder->join('LH_interview_house', 'LH_interview_house.interview_house = LH_house.house_id');
     
        // $builder->join('CODE_PROJECT', 'CODE_PROJECT.Code = LH_interview_house.interview_project_name');        
        $builder->join('vLinkAreaDetail_growerCrops', 'vLinkAreaDetail_growerCrops.target_code_gis = LH_interview_house.interview_project_name');        
        $builder->join('LH_house_person', 'LH_house_person.house_id = LH_house.house_id','left');

        $builder->join('LH_house_land', 'LH_house_land.person_id = LH_house_person.person_id','left');
        $builder->join('LH_land', 'LH_land.land_id = LH_house_land.land_id','left');
        $builder->join('LH_landuse', 'LH_landuse.landuse_id = LH_land.land_use','left');
        $builder->join('CODE_POSSESSRIGHT', 'CODE_POSSESSRIGHT.Code = LH_land.land_holding','left');
        $builder->join('LH_landowner', 'LH_landowner.landowner_id = LH_land.land_resource','left');
        
        

        $builder->join('CODE_PROVINCE', 'CODE_PROVINCE.Code = LH_house.house_province','left');
        $builder->join('CODE_AMPHUR', 'CAST(CODE_AMPHUR.AMP_CODE as int) = LH_house.house_district and CODE_PROVINCE.Code = CODE_AMPHUR.PROV_CODE','left');      
        $builder->join('CODE_TAMBON', 'CAST(CODE_TAMBON.TAM_CODE as int) = LH_house.house_subdistrict and CODE_PROVINCE.Code = CODE_TAMBON.PROV_CODE and CODE_AMPHUR.AMP_CODE = CODE_TAMBON.AMP_CODE','left'); 
        $builder->groupBy('LH_house.house_id');
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getAllProduct($page = '',$group = '',$search = []){
        $builder = $this->db->table('LH_house');
        $builder->select("
            max(LH_house.house_number) as house_number,
            max(LH_house.house_moo) as house_moo,
            max(LH_house.house_moo_name) as house_moo_name,
            max(CODE_TAMBON.TAM_T) as tam_name_t,
            max(CODE_AMPHUR.AMP_T) as amp_name_t,
            max(CODE_PROVINCE.Name) as pro_name_t,
            max(LH_land.land_area) as land_area,
            max(LH_land.land_number) as land_number,
            max(vLinkAreaDetail_growerCrops.target_name)as area,
            max(CODE_PRODUCTTYPE.Name) as product_type,
            max(CODE_PRODUCT.Name) as product_name,
            
            (SELECT SUM(a.product_value * a.product_price) 
            FROM LH_interview_land_product a
            WHERE a.detail_id = LH_interview_land_detail.detail_id) as product_value,

            STUFF((SELECT  ',' +LH_interview_land_product.product_market_label
            FROM LH_interview_land_product
            WHERE LH_interview_land_product.detail_id = LH_interview_land_detail.detail_id					 
            FOR XML PATH, TYPE).value(N'.[1]', N'varchar(max)'), 1, 2, '') as markets,
            
        ");
        
        if (!empty($search['interview_project'])){
            $builder->where('vLinkAreaDetail_growerCrops.target_code_gis',$search['interview_project']);
        }
        if (!empty($search['interview_type'])){
            $builder->where('vLinkAreaDetail_growerCrops.target_area_type_id',$search['interview_type']);
        }

        $builder->join('LH_interview_house', 'LH_interview_house.interview_house = LH_house.house_id');      
     
        // $builder->join('CODE_PROJECT', 'CODE_PROJECT.Code = LH_interview_house.interview_project_name');        
          
        $builder->join('LH_house_person', 'LH_house_person.house_id = LH_house.house_id','left');
        $builder->join('vLinkAreaDetail_growerCrops', 'vLinkAreaDetail_growerCrops.target_code_gis = LH_interview_house.interview_project_name and 
        vLinkAreaDetail_growerCrops.target_area_type_id = LH_interview_house.interview_project and
        vLinkAreaDetail_growerCrops.VILLAGE_ID = LH_house.house_home');  

        $builder->join('LH_interview_land', 'LH_interview_land.interview_person_id = LH_house_person.person_id','left');
        $builder->join('LH_interview_land_detail', 'LH_interview_land_detail.interview_id = LH_interview_land.interview_id','left');
        $builder->join('CODE_PRODUCTTYPE', 'CODE_PRODUCTTYPE.Code = LH_interview_land_detail.detail_use_type','left');
        $builder->join('CODE_PRODUCT', 'CODE_PRODUCT.Code = LH_interview_land_detail.detail_type','left');


        
        $builder->join('LH_house_land', 'LH_house_land.person_id = LH_house_person.person_id','left');
        $builder->join('LH_land', 'LH_land.land_id = LH_house_land.land_id','left');
       
        

        $builder->join('CODE_PROVINCE', 'CODE_PROVINCE.Code = LH_house.house_province','left');
        $builder->join('CODE_AMPHUR', 'CAST(CODE_AMPHUR.AMP_CODE as int) = LH_house.house_district and CODE_PROVINCE.Code = CODE_AMPHUR.PROV_CODE','left');      
        $builder->join('CODE_TAMBON', 'CAST(CODE_TAMBON.TAM_CODE as int) = LH_house.house_subdistrict and CODE_PROVINCE.Code = CODE_TAMBON.PROV_CODE and CODE_AMPHUR.AMP_CODE = CODE_TAMBON.AMP_CODE','left'); 
        $builder->groupBy('LH_interview_land_detail.detail_id');
        
        $query = $builder->get()->getResultArray();
        return $query;
    }
}