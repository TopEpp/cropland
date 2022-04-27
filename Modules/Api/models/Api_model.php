<?php
namespace Modules\Api\Models;
use CodeIgniter\Model;

class Api_model extends Model
{

    protected $useAutoIncrement = true;
    
    public function getAgriWork($id = '')
    { 
        
        $builder = $this->db->table('LH_agriwork');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('agriwork_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getAreaTarget($id = '')
    { 
        
        $builder = $this->db->table('LH_area_target');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('target_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getDiseaseGroup($id = '')
    { 
        
        $builder = $this->db->table('LH_diseasegroup');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('disease_group_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getDope($id = '')
    { 
        
        $builder = $this->db->table('LH_dope');
        $builder->select('*');
        if ($id){
          $builder = $builder->where('dope_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getEducation($id = '')
    { 
        
        $builder = $this->db->table('LH_education');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('education_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getExpenses($id = '')
    { 
        
        $builder = $this->db->table('LH_expenses');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('expenses_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getHospital($id = '')
    { 
        
        $builder = $this->db->table('LH_hospital');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('hospital_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getJobs($id = '')
    { 
        
        $builder = $this->db->table('LH_jobs');
        $builder->select('LH_jobs.*, LH_jobsgroup.jobs_group_name ');
        $builder->where('LH_jobs.active',1);
        $builder->join('LH_jobsgroup','LH_jobsgroup.jobs_group_id = LH_jobs.jobs_group_id ');
        $builder->orderBy('jobs_group_id,name');
        if ($id){
          $builder = $builder->where('jobs_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getJobsGroup($id = '')
    { 
        
        $builder = $this->db->table('LH_jobsgroup');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('jobs_group_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getLandOwner($id = '')
    { 
        
        $builder = $this->db->table('LH_landowner');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('landowner_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getPrefix($id = '')
    { 
        
        $builder = $this->db->table('LH_prefix');
        $builder->select('*');
        if ($id){
          $builder = $builder->where('prefix_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getProblemType($id = '') #ปัญหาทางด้านการเกษตร
    { 
        
        $builder = $this->db->table('CODE_PROBLEMTYPE');
        $builder->select('*');
        // $builder->where('active',1);
        if ($id){
          $builder = $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

   

    public function getPublicHealth($id = '')
    { 
        
        $builder = $this->db->table('LH_publichealth');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('publichealth_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getReligion($id = '')
    { 
        
        $builder = $this->db->table('LH_religion');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('religion_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getTherapy($id = '')
    { 
        
        $builder = $this->db->table('LH_therapy');
        $builder->select('*');
        if ($id){
          $builder = $builder->where('therapy_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getTribe($id = '')
    { 
        
        $builder = $this->db->table('LH_tribe');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('tribe_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getLandUse($id = '')
    { 
        
        $builder = $this->db->table('LH_landuse');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('landuse_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getLandprivilege($id = '') #เอกสิทธิที่ดิน
    { 
        
        $builder = $this->db->table('CODE_POSSESSRIGHT');
        $builder->select('*');
        // $builder->where('active',1);
        if ($id){
          $builder = $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getLocation($id = '')
    { 
        
        $builder = $this->db->table('LH_location');
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where('location_id',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getData($table,$key,$id = '')
    { 
        
        $builder = $this->db->table($table);
        $builder->select('*');
        $builder->where('active',1);
        if ($id){
          $builder = $builder->where($key,$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function saveData($data){

      $builder = $this->db->table($data['table']);
      unset($data['table']);

      if (!empty($data[$data['key']])){
        $id = $data[$data['key']];
        $builder->where($data['key'],$data[$data['key']]);
        unset($data[$data['key']]);
        unset($data['key']);
        $builder->update($data);
      }else{
        unset($data[$data['key']]);
        unset($data['key']);
        $builder->insert($data);
        $id = $this->db->insertID();
      }

      return $id;
    }

    public function deleteData($table,$key,$id){
      $builder = $this->db->table($table);
      $builder->set('active',0);
      if($id){
        $builder->where($key,$id);
        $builder->update();
      }

      return true;
    }

    public function getProjectType($id = '')  #ประเภทโครงการ
    { 
        
        $builder = $this->db->table('CODE_PROJECTTYPE');
        $builder->select('*');
   
        if ($id){
          $builder = $builder->where('Runno',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getProject($type = '',$id = '') #โครงการ , พื้นที่
    { 
        
        $builder = $this->db->table('CODE_PROJECT');
        $builder->select('*');
        if ($type != ''){
          $builder = $builder->where('TypeCode',$type);
        }
      
   
        if ($id){
          $builder = $builder->where('Runno',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

   

    public function getDepartment($id = '') #หน่วยงาน
    { 
        
        $builder = $this->db->table('CODE_DEPARTMENT');
        $builder->select('*');
   
        if ($id){
          $builder = $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getChemicalType($id = '') #ประเภทปุ๋ย
    { 
        
        $builder = $this->db->table('CODE_CHEMICALTYPE');
        $builder->select('*');
   
        if ($id){
          $builder = $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getChemical($type='',$id = '') #ยี่ห้อปุ๋ย
    { 
        
        $builder = $this->db->table('CODE_CHEMICALBRAND');
        $builder->select('*');

        if($type){
          $builder = $builder->where('Type_id',$type);
        }
   
        if ($id){
          $builder = $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getChemicalFormula($chem_id='',$id = '') #สูตรปุ๋ย
    { 
        
        $builder = $this->db->table('CODE_CHEMICALFORMULAR');
        $builder->select('*');
        
        if($chem_id){
          $builder = $builder->where('Chem_id',$chem_id);
        }

        if ($id){
          $builder = $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getMedicalType($id = '') #ประเภทยา
    { 
        
        $builder = $this->db->table('CODE_MEDICALTYPE');
        $builder->select('*');
   
        if ($id){
          $builder = $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getMedica($type='',$id = '') #ยี่ห้อยา
    { 
        
        $builder = $this->db->table('CODE_MEDICALBRAND');
        $builder->select('*');

        if($type){
          $builder = $builder->where('Description',$type);
        }
   
        if ($id){
          $builder = $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getUnit($id = '') #หน่วยนับ
    { 
        
        $builder = $this->db->table('CODE_UNIT');
        $builder->select('*');
   
        if ($id){
          $builder = $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getEmployType($id = '') #ลักษณธการจ้าง
    { 
        
        $builder = $this->db->table('CODE_EMPLOYTYPE');
        $builder->select('*');
   
        if ($id){
          $builder = $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getLaborType($id = '') #การจ้างแรงงาน
    { 
        
        $builder = $this->db->table('CODE_LABORTYPE');
        $builder->select('*');
   
        if ($id){
          $builder = $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getMarket($id = '') #ตลาด
    { 
        
        $builder = $this->db->table('CODE_MARKET');
        $builder->select('*');
   
        if ($id){
          $builder = $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getVillage($provice,$district,$subdistrict,$id = '') #กลุ่มบ้าน
    { 
        
        $builder = $this->db->table('CODE_PROJECTVILLAGE');
        $builder->select('*');
        $builder = $builder->where('ProvinceId',$provice);
        $builder = $builder->where('AmphurId',$district);
        $builder = $builder->where('TamBonId',$subdistrict);
   
        if ($id){
          $builder = $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getHrdiSupport($id = '') #การสนับสนุนของ สวพส
    { 
        
        $builder = $this->db->table('CODE_HRDI_SUPPORTTYPE');
        $builder->select('*');
   
        if ($id){
          $builder = $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getWantSupport($id = '') #ความต้องการ การสนับสนุนจากหน่วยงาน
    { 
        
        $builder = $this->db->table('CODE_SUPPORT_WANTEDTYPE');
        $builder->select('*');
   
        if ($id){
          $builder = $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getProductGroup($id = '') #ประเภทการใช้ประโยชน์ที่ดิน
    { 
        
        $builder = $this->db->table('CODE_PRODUCTGROUP');
        $builder->select('*');
        if ($id){
          $builder = $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getProductType($id = '') #การใช้ประโยชน์ที่ดิน
    { 
        
        $builder = $this->db->table('CODE_PRODUCTTYPE');
        $builder->select('*');
        if ($id){
          $builder = $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getProduct($type = '',$id = '') #พันธุ์
    { 
        
        $builder = $this->db->table('CODE_PRODUCT');
        $builder->select('*');
        if ($type != ''){
          $builder = $builder->where('Type_Code',$type);
        }
    
        if ($id){
          $builder = $builder->where('Code',$id);
          $query = $builder->get()->getRowArray();
          return $query;
        }
        
        $query = $builder->get()->getResultArray();
        return $query;
    }

  
}

 ?>
