<?php
namespace Modules\Dashboard\Models;
use CodeIgniter\Model;

class Dashboard_model extends Model
{
    function getSumGender($search){
        $builder = $this->db->table('LH_house_person');
        $builder->select('SUM(CASE WHEN LH_house_person.person_prename=1 OR LH_house_person.person_prename=4 THEN 1 ELSE 0 END) as sum_m,
                          SUM(CASE WHEN LH_house_person.person_prename=2 OR LH_house_person.person_prename=3 OR LH_house_person.person_prename=5 THEN 1 ELSE 0 END) as sum_f,
                          SUM(CASE WHEN LH_house_person.person_prename=6 THEN 1 ELSE 0 END) as sum_o');
        $builder->join('LH_house', 'LH_house.house_id = LH_house_person.house_id','left');
        $builder->join('LH_interview_house', 'LH_house.house_id = LH_interview_house.interview_house');
        $builder->where('LH_interview_house.interview_year',$search['year']);
        if(!empty($search['project_type'])){
            $builder->where('LH_interview_house.interview_project',$search['project_type']);
        }

        if(!empty($search['project_name'])){
            $builder->where('LH_interview_house.interview_project_name',$search['project_name']);
        }

        $query = $builder->get()->getRowArray();
        
        return $query;
    }

    function getSumIncome($search){
        $data = array();
        $builder = $this->db->table('LH_house_person');
        $builder->select('LH_person_income.income_type, SUM(LH_person_income.income_value*LH_person_income.income_month) AS income_value');
        $builder->join('LH_house', 'LH_house.house_id = LH_house_person.house_id','left');
        $builder->join('LH_interview_house', 'LH_house.house_id = LH_interview_house.interview_house');
        $builder->join('LH_person_income', 'LH_person_income.person_id = LH_house_person.person_id','left');
        $builder->where('LH_interview_house.interview_year',$search['year']);
        if(!empty($search['project_type'])){
            $builder->where('LH_interview_house.interview_project',$search['project_type']);
        }

        if(!empty($search['project_name'])){
            $builder->where('LH_interview_house.interview_project_name',$search['project_name']);
        }
        $builder->groupBy('income_type');
        $query = $builder->get()->getResultArray();
        foreach($query as $row){
            $data[$row['income_type']] = $row['income_value'];
        }

        return $data;
    }

    function getSumOutcome($search){
        $data = array();
        $builder = $this->db->table('LH_house_person');
        $builder->select('LH_person_outcome.outcome_type, 
                            SUM(LH_person_outcome.outcome_value*LH_person_outcome.outcome_month) AS outcome_value');
        $builder->join('LH_house', 'LH_house.house_id = LH_house_person.house_id','left');
        $builder->join('LH_interview_house', 'LH_house.house_id = LH_interview_house.interview_house');
        $builder->join('LH_person_outcome', 'LH_person_outcome.person_id = LH_house_person.person_id','left');
        $builder->where('LH_interview_house.interview_year',$search['year']);
        if(!empty($search['project_type'])){
            $builder->where('LH_interview_house.interview_project',$search['project_type']);
        }

        if(!empty($search['project_name'])){
            $builder->where('LH_interview_house.interview_project_name',$search['project_name']);
        }
        $builder->groupBy('outcome_type');
        $query = $builder->get()->getResultArray();
        foreach($query as $row){
            $data[$row['outcome_type']] = $row['outcome_value'];
        }

        return $data;
    }
  
    public function getIncome(){

        $db = db_connect();
        $query = $db->query('
            select 
            TOP 10
            max(CODE_PRODUCTTYPE.Name) as Name,
            LH_interview_land_detail.detail_use_type,
            sum(product.product_sum) as product_sum
                from (
                    select  
                  
                    LH_interview_land_detail.detail_use_type,
                    (sum(LH_interview_land_product.product_value) *  sum(LH_interview_land_product.product_price)) as product_sum
                    from LH_interview_land_detail                  
                    JOIN LH_interview_land_product ON LH_interview_land_product.detail_id = LH_interview_land_detail.detail_id and data_type=\'product\'
                    where LH_interview_land_detail.detail_use_type != 0
                    GROUP BY  LH_interview_land_detail.detail_use_type,LH_interview_land_product.rec_id
                ) as product
            left join LH_interview_land_detail ON LH_interview_land_detail.detail_use_type = product.detail_use_type
            join LH_interview_land ON LH_interview_land_detail.interview_id = LH_interview_land.interview_id        
            join CODE_PRODUCTTYPE ON CODE_PRODUCTTYPE.Code = LH_interview_land_detail.detail_use_type
            GROUP BY  LH_interview_land_detail.detail_use_type
            order by product_sum desc 
        ');       
        $query = $query->getResultArray();
        
        return $query;
    }

    public function getOutcome(){

        $db = db_connect();
        $query = $db->query('
            select 
                TOP 10
                product.data_type,
                sum( product.product_sum) as product_sum
                    from (
                        select  
                            LH_interview_land_product.detail_id,
                            LH_interview_land_product.data_type,
                            (sum(LH_interview_land_product.product_value) *  sum(LH_interview_land_product.product_price)) as product_sum
                            from LH_interview_land_detail                  
                            JOIN LH_interview_land_product ON LH_interview_land_product.detail_id = LH_interview_land_detail.detail_id 
                            where LH_interview_land_product.data_type != \'product\'
                            and LH_interview_land_detail.detail_use_type != 0
                            GROUP BY  LH_interview_land_product.detail_id,LH_interview_land_product.data_type
                        ) as product
                left join LH_interview_land_detail ON LH_interview_land_detail.detail_id = product.detail_id
                join LH_interview_land ON LH_interview_land_detail.interview_id = LH_interview_land.interview_id 
                GROUP BY  product.data_type
        ');       
        $query = $query->getResultArray();
        
        return $query;
    }

   
}