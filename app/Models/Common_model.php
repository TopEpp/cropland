<?php
namespace app\Models;
use CodeIgniter\Model;

class Common_model extends Model
{
   
    public function getProvince()
    {

      $builder = $this->db->table('CODE_PROVINCE');
      $builder->select('Code,Name');
      $query = $builder->get()->getResultArray();
      return $query;
      
    }

    public function getAmphur($province)
    {

      $builder = $this->db->table('CODE_AMPHUR');
      $builder->select('AMP_CODE,AMP_T');
      $builder->where('PROV_CODE',$province);
      $query = $builder->get()->getResultArray();
      return $query;
      
    }

    public function getTambon($amphor,$province = '')
    {

      $builder = $this->db->table('CODE_TAMBON');
      $builder->select('TAM_CODE,TAM_T');
      $builder->where('AMP_CODE',$amphor);
      $builder->where('PROV_CODE',$province);
      $query = $builder->get()->getResultArray();
      return $query;
      
    }

    public function getVillages($tambon,$amphor,$province = '')
    {

      $builder = $this->db->table('CODE_VILLAGE');
      $builder->select('VILL_CODE,VILL_T');
      $builder->where('TAM_CODE',$tambon);
      $builder->where('AMP_CODE',$amphor);
      $builder->where('PROV_CODE',$province);
      $query = $builder->get()->getResultArray();
      return $query;
      
    }

    public function getEducation(){
      $builder = $this->db->table('LH_education');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;

    }

    public function getAgriproduct(){
      $builder = $this->db->table('LH_agriproduct');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;

    }

    public function getAgriwork(){
      $builder = $this->db->table('LH_agriwork');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;

    }

    public function getArea_target(){
      $builder = $this->db->table('LH_area_target');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;

    }

    public function getDiseasegroup(){
      $builder = $this->db->table('LH_diseasegroup');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;

    }

    public function getDope(){
      $builder = $this->db->table('LH_dope');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;

    }

    public function getExpenses(){
      $builder = $this->db->table('LH_expenses');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;

    }

    public function getHospital(){
      $builder = $this->db->table('LH_hospital');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;

    }

    public function getJobs(){
      $builder = $this->db->table('LH_jobs');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;

    }

    public function getJobsgroup(){
      $builder = $this->db->table('LH_jobsgroup');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;

    }

    public function getLandowner(){
      $builder = $this->db->table('LH_landowner');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;
    }

    public function getPrefix(){
      $builder = $this->db->table('LH_prefix');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;
    }

    public function getProblemtype(){
      $builder = $this->db->table('LH_problemtype');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;
    }

    public function getPublichealth(){
      $builder = $this->db->table('LH_publichealth');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;
    }

    public function getReligion(){
      $builder = $this->db->table('LH_religion');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;
    }

    public function getTherapy(){
      $builder = $this->db->table('LH_therapy');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;
    }

    public function getTribe(){
      $builder = $this->db->table('LH_Tribe');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;
    }

    public function getProductSale(){
      $builder = $this->db->table('CODE_PRODUCT_SALE');
      $builder->select('*');
      $query = $builder->get()->getResultArray();
      return $query;
    }

    public function getVillage($id = '',$project = '') #กลุ่มบ้าน
    { 
        
        $builder = $this->db->table('CODE_PROJECTVILLAGE');
        $builder->select('*');
   
        if ($project){
          $builder = $builder->where('projectId',$project);
          $query = $builder->get()->getResultArray();
          return $query;
        }

        if ($id){
          $builder = $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }


    public function getLand($id ='',$code = ''){
      
      $builder = $this->db->table('LH_land');
      $builder->select('CODE_PROJECT.*,LH_land.land_holding,LH_house_land.person_id');
      if ($id != ''){
        $builder->where('LH_land.land_id',$id);
      }
      if ($code != ''){
        $builder->where('LH_land.land_code',$code);
      }
      
      $builder->join('CODE_PROJECT','CODE_PROJECT.Code = LH_land.land_project');
      $builder->join('LH_house_land','LH_house_land.land_id = LH_land.land_id');
      $query = $builder->get()->getResultArray();
      return $query;
    }

    public function getAllPersons($house = '',$data = array()){    
      
      // $village = $this->getVillage($house);

      // if ($village){
        // $village['ProvinceId'],$village['AmphurId'],$village['TamBonId']
        $builder = $this->db->table('LH_house_person');
        $builder->select('LH_house_person.family_id,LH_house_person.person_id,LH_house_person.person_name,LH_house_person.person_lastname,LH_prefix.name');
        // $builder->where('LH_house.house_province',$village['ProvinceId']);
        $builder->join('LH_prefix', 'LH_prefix.prefix_id = LH_house_person.person_prename','left');
    
        $query = $builder->get()->getResultArray();
        
        foreach ($query as $key => $value) {
          $data[$value['family_id']][$value['person_id']] = $value;          
        }
      // }
     
      return $data;
    
  }

  public function getBasin(){
    $builder = $this->db->table('CODE_BASIN');
    $builder->select('*');
    $query = $builder->get()->getResultArray();
    return $query;
  }

  public function personAddress($person){
    $builder = $this->db->table('LH_house_person');
    $builder->select("  CONCAT('บ้านเลขที่ ', LH_house.house_number,' หมู่ที่ ',
    LH_house.house_moo,' ตำบล ',CODE_TAMBON.TAM_T,' อำเภอ ',CODE_AMPHUR.AMP_T,' จังหวัด ',CODE_PROVINCE.Name) as person_address");

    $builder->join('LH_house','LH_house.house_id = LH_house_person.house_id');
    $builder->where('LH_house_person.person_id',$person);

    $builder->join('CODE_PROVINCE', 'CODE_PROVINCE.Code = LH_house.house_province','left');
    $builder->join('CODE_AMPHUR', 'CAST(CODE_AMPHUR.AMP_CODE as int) = LH_house.house_district and CODE_PROVINCE.Code = CODE_AMPHUR.PROV_CODE','left');      
    $builder->join('CODE_TAMBON', 'CAST(CODE_TAMBON.TAM_CODE as int) = LH_house.house_subdistrict and CODE_PROVINCE.Code = CODE_TAMBON.PROV_CODE and CODE_AMPHUR.AMP_CODE = CODE_TAMBON.AMP_CODE','left');      

    $query = $builder->get()->getRowArray();
    dd($query);
    return $query;
  }

  public function getProductType($group){
    $builder = $this->db->table('CODE_PRODUCTTYPE');
    $builder->select('*');
    if ($group != ''){
      $builder = $builder->where('GroupCode',$group);
    }
    
    $query = $builder->get()->getResultArray();
    return $query;
  }

  public function getProduct($type){
    $builder = $this->db->table('CODE_PRODUCT');
    $builder->select('*');
    if ($type != ''){
      $builder = $builder->where('TypeCode',$type);
    }
    
    $query = $builder->get()->getResultArray();
    return $query;
  }
  public function getDressing($chem_id){
    $builder = $this->db->table('CODE_CHEMICALFORMULAR');
    $builder->select('*');
    
    if($chem_id){
      $builder = $builder->where('Chem_id',$chem_id);
    }
    
    $query = $builder->get()->getResultArray();
    return $query;
  }

  

  public function searchPerson($search = [],$id = ''){
    
       $builder = $this->db->table('LH_house_person');
       $builder->select('LH_house_person.family_id,LH_house_person.person_id,
       LH_house_person.person_name,LH_house_person.person_lastname,LH_prefix.name');
       $builder->join('LH_prefix', 'LH_prefix.prefix_id = LH_house_person.person_prename','left');
       if ($id != ''){
          $builder->where(' LH_house_person.person_id', $id);   
          $query = $builder->get()->getRowArray();
          return $query;      
       }

       if (!empty($search)){
        $builder->like(' LH_house_person.person_name', $search); 
        $builder->orLike(' LH_house_person.person_lastname', $search);
  
      }
     
        $query = $builder->get()->getResultArray();
        return $query;
  }


  public function searchLand($search = '',$id = ''){
      
      
      $builder = $this->db->table('LH_land');
      $builder->select('LH_land.land_id,LH_land.land_code');
      if ($id != ''){
        $builder->where('LH_land.land_code', $id);   
        $query = $builder->get()->getRowArray();
        return $query;      
      }
      if (!empty($search)){
        $builder->like('LH_land.land_code', $search);
      }

      $query = $builder->get()->getResultArray();
      return $query;
  }

  public function searchUser($search = '',$id = '')
  {
    $builder = $this->db->table('LH_users');
    $builder->select('emp_id,fullname,prs_id');
    if ($id != ''){
      $builder->where('emp_id', $id);   
      $query = $builder->get()->getRowArray();
      return $query;      
   }

   if (!empty($search)){
      $builder->like('fullname', $search);   
    }
    $query = $builder->get()->getResultArray();
    return $query;
  }

  public function searchHouse($search = '',$id = ''){
    
    $builder = $this->db->table('CODE_PROJECTVILLAGE');
    $builder->select('Code,Name');
    if ($id != ''){
      $builder->where('Code', $id);   
      $query = $builder->get()->getRowArray();
      return $query;      
    }

    if (!empty($search)){
      $builder->like('Name', $search);   
    }

   
    $query = $builder->get()->getResultArray();
    return $query;
  }

  public function searchProvince($search = '',$id = '')
  {
        
      $builder = $this->db->table('CODE_PROVINCE');
      $builder->select('Code,Name');
      if ($id != ''){
        $builder->where('Code', $id);   
        $query = $builder->get()->getRowArray();
        return $query;      
      }

      if (!empty($search)){
        $builder->like('Name', $search);   
      }

      $query = $builder->get()->getResultArray();
      return $query;
  }

  public function searchAmphur($search = '',$id = '')
  {           
      $builder = $this->db->table('CODE_AMPHUR');
      $builder->select('AMP_CODE,AMP_T');
      if ($id != ''){
        $builder->where('AMP_CODE', $id);   
        $query = $builder->get()->getRowArray();
        return $query;      
      }

      if (!empty($search)){
        $builder->like('AMP_T', $search);   
      }

      $query = $builder->get()->getResultArray();
      return $query;
  }

  public function searchTambon($search = '',$id = '')
  {        

      $builder = $this->db->table('CODE_TAMBON');
      $builder->select('TAM_CODE,TAM_T');
      if ($id != ''){
        $builder->where('TAM_CODE', $id);   
        $query = $builder->get()->getRowArray();
        return $query;      
      }

      if (!empty($search)){
        $builder->like('TAM_T', $search);   
      }

      $query = $builder->get()->getResultArray();
      return $query;
  }

  public function searchVillage($search = '',$id = '')
  {        

    $builder = $this->db->table('CODE_VILLAGE');
    $builder->select('VILL_CODE,VILL_T');
      if ($id != ''){
        $builder->where('VILL_CODE', $id);   
        $query = $builder->get()->getRowArray();
        return $query;      
      }

      if (!empty($search)){
        $builder->like('VILL_T', $search);   
      }

      $query = $builder->get()->getResultArray();
      return $query;
  }


  public function getProject($type = ''){

    $builder = $this->db->table('vLinkAreaDetail_growerCrops');
    $builder->select('max(target_name) as Name,target_code_gis as Code');
    $builder->where('target_code_gis !=', null);         
    if ($type != ''){      
      $builder->where('target_area_type_id', $type);         
    }
    $builder->groupBy('target_code_gis');
  
    $query = $builder->get()->getResultArray();
    return $query;
    
  }

  public function getProjectVillages($project = ''){

    $builder = $this->db->table('vLinkAreaDetail_growerCrops');
    $builder->select('VILLAGE_NAME_THA as Name,VILLAGE_ID as Code');    
    if ($project != ''){      
      $builder->where('target_code_gis', $project);         
    }    
  
    $query = $builder->get()->getResultArray();
    return $query;

  }

  public function getProjectAddress($village = '',$project = '',$type= ''){

    $builder = $this->db->table('vLinkAreaDetail_growerCrops');
    $builder->select('PROVINCE_ID,TAMBOL_ID,AMPHUR_ID');    
    if ($village != ''){      
      
      $builder->where('VILLAGE_ID', $village);
      $builder->where('target_code_gis', $project);
      $builder->where('target_area_type_id', $type);  
    }    
  
    $query = $builder->get()->getRowArray();
    return $query;
  }
  


}

 ?>
