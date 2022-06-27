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
        $builder->select('LH_land.land_code,LH_land.land_number,LH_land.land_no,LH_land.land_area,LH_land.land_id,
        LH_land.land_ownership,LH_house_person.person_name,LH_house_person.person_lastname,LH_land.land_gps,land_geo_loc,
        dbo.GetCoordinate(LH_land.land_geo) as land_geo,LH_landuse.name,CODE_PROJECT.Name as project_name');
        $builder->join('LH_landuse', 'LH_land.land_use = LH_landuse.landuse_id','left');
        $builder->join('CODE_PROJECT', 'LH_land.land_project = CODE_PROJECT.Code','left');
        $builder->join('LH_house_person', 'LH_house_person.person_id = LH_land.land_ownership','left');
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
        $builder->select("LH_land.*,LH_landuse.name,CODE_PROJECT.Name as project_name,
        CONCAT(LH_prefix.name,LH_house_person.person_name,' ',LH_house_person.person_lastname) as person_name");
        
        $builder->join('LH_landuse', 'LH_land.land_use = LH_landuse.landuse_id','left');
         $builder->join('CODE_PROJECT', 'LH_land.land_project = CODE_PROJECT.Code','left');
         $builder->join('LH_house_person', 'LH_house_person.person_id = LH_land.land_ownership','left');
         $builder->join('LH_prefix', 'LH_prefix.prefix_id = LH_house_person.person_prename','left');
        
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
