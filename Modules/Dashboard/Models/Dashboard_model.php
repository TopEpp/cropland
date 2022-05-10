<?php
namespace Modules\Dashboard\Models;
use CodeIgniter\Model;

class Dashboard_model extends Model
{
  
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