<?php
namespace Modules\Land\Models;
use CodeIgniter\Model;

class Land_model extends Model
{
    protected $table = 'LH_land';
    protected $primaryKey = 'land_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
                                  'land_id',
                                  'land_number',
                                  'land_no',
                                  'land_area',
                                  'land_use',
                                  'land_address',
                                  'land_ownership',
                                  'land_holiding',                                 
                                ];

    public function getAllLand($id = '')
    { 
        
        $builder = $this->db->table('LH_land');
        // $builder->select('LH_land.*,LH_landuse.name,LH_location.name as location_name');
        $builder->select('LH_land.*');
        // $builder->join('LH_landuse', 'LH_land.land_use = LH_landuse.landuse_id','left');
        // $builder->join('LH_location', 'LH_land.land_address = LH_location.location_id','left');
        if ($id){
          $builder = $builder->where('land_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getAllLandPaginate($page = '',$group = '')
    { 
        
        $builder = $this->table('LH_land');
        // $builder->select('LH_land.*,LH_landuse.name,LH_location.name as location_name');
        $builder->select('LH_land.*');
        // $builder->join('LH_landuse', 'LH_land.land_use = LH_landuse.landuse_id','left');
        // $builder->join('LH_location', 'LH_land.land_address = LH_location.location_id','left');
      
        
        $query = $builder->paginate($page,$group);        
        return $query;
    }

    public function saveLandManage($data)
    {
      $db = \Config\Database::connect();
      $builder = $db->table('LH_land');
      if (!empty($data['land_id'])){
        $land_id = $data['land_id'];
        $builder->where('land_id',$data['land_id']);
        unset($data['land_id']);
        $builder->update($data);
      
      }else{
        unset($data['land_id']);
        $builder->insert($data);
        $land_id = $db->insertID();
      }

      return $land_id;
      
    }
}

 ?>
