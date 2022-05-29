<?php
namespace Modules\User\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
class User_model extends Model
{
  protected $DBGroup = 'user_db';
  
  protected $table = 'vLoadDetailStaff';
  protected $primaryKey = 'emp_id';
  // protected $allowedFields = [
  //   'user_id','user_name','password','name','email','phone','status','user_type','user_img'
  // ];

  public function getAllUsers()
  {
    $db = \Config\Database::connect('user_db', false); 
    $builder = $db->table('vLoadDetailStaff');
    $builder->select('*');
    $query = $builder->get()->getResultArray();
    return $query;
  }

  public function getSelectUsers($id ='')
  {
    $db = \Config\Database::connect('user_db', false); 
    $builder = $db->table('vLoadDetailStaff');
    if ($id != ''){
      $builder->where('prs_id',$id);
    }
    $builder->select('emp_id,fullname,prs_id');
    $query = $builder->get()->getResultArray();
    return $query;
  }

  public function getUserGroupOrg()
  {
    $builder = $this->db->table('users');
    $builder->select('*');
    $query = $builder->get()->getResultArray();
    foreach ($query as $key => $value) {
      $data[$value['org_id']][$value['user_id']] = $value;
    }
    return $data;
  }

  public function getTreeOrg($parent=0,&$data=array())
  {
    $builder = $this->db->table('organizations');
    $builder->select('*');
    $builder->where('org_parent',$parent);
    $query = $builder->get()->getResultArray();
    foreach ($query as $key => $value) {
      $data[$value['org_parent']][$value['org_id']] = $value;
      $this->getTreeOrg($value['org_id'],$data);
    }
    return $data;
  }


  public function user_update($input,$images)
  {
    $builder = $this->db->table('users');
    $builder->set('username',$input['username']);
    if (!empty($input['password'])) {
      $builder->set('password',password_hash($input['password'],PASSWORD_DEFAULT));
    }
    $builder->set('org_id',$input['user_org_id']);
    $builder->set('first_name',$input['first_name']);
    $builder->set('last_name',$input['last_name']);
    $builder->set('email',$input['email']);
    $builder->set('phone',str_replace('-', '',$input['phone']));
    $builder->set('status',$input['status']);
    $builder->set('user_type',2);

    if (!empty($images->getName())) {
      $new_img = $images->getRandomName();
      $images->move(ROOTPATH.'public/uploads/user/', $new_img);
      $builder->set('user_img',$new_img);
    }
    
    if (!empty($input['user_id'])) {
      $builder->where('user_id',$input['user_id']);
      $builder->update();
    } else {
      $builder->insert();
    }

  }

  public function get_user($user_id)
  {
    $builder = $this->db->table('users');
    $builder->select('*');
    $builder->where('user_id',$user_id);
    $query = $builder->get();
    return $query->getRowArray();
  }

  public function check_username($user_id,$user_name)
  {
    if (!empty($user_id)) {
      $builder = $this->db->table('users');
      $builder->select('*');
      $builder->where('user_id',$user_id);
      $builder->where('username',$user_name);
      $result = $builder->countAllResults();

      if ($result == 0) {
        $builder = $this->db->table('users');
        $builder->select('*');
        $builder->where('username',$user_name);
        return $builder->countAllResults();
      }
    } else {
      $builder = $this->db->table('users');
      $builder->select('*');
      $builder->where('username',$user_name);
      return $builder->countAllResults();
    }
  }

  
  public function delete_user($id)
  {
    $builder = $this->db->table('users');
    $builder->where('user_id',$id);
    $builder->delete();
  }

  public function update_org($input){
    $builder = $this->db->table('organizations');
    $data = [
        'org_name' => $input['org_name'],
        'org_parent'    => $input['org_parent'],
        'org_name_short' => $input['org_name_short']
      ];
    
    if ($input['org_id'] != '') {
        $builder->where('org_id',$input['org_id']);
        $builder->update($data);
    } else {
        $builder->insert($data);
    }

  }

  public function delete_org($org_id){
    $builder_detail = $this->db->table('organizations');
    $builder_detail->where('org_id',$org_id);
    $builder_detail->delete();

  }

  public function getMainOrgForSelect(){
    $builder = $this->db->table('organizations');
    $builder->select('*');
    $builder->where('org_parent',0);
    $builder->orderBy('org_name');
    $res = $builder->get()->getResultArray();
    return $res;
  }

  public function getOrgForSelect(){
    $builder = $this->db->table('organizations');
    $builder->select('*');
    $builder->where('org_parent <>',0);
    $builder->orderBy('org_name');
    $res = $builder->get()->getResultArray();
    return $res;
  }

  public function getOrgData($org_id){
    $builder = $this->db->table('organizations');
    $builder->select('*');
    $builder->where('org_id',$org_id);
    $res = $builder->get()->getRowArray();
    return $res;
  }

  function genNewUser(){
    // $builder = $this->db->table('organizations');
    // $builder->select('*');
    // $builder->where('org_parent <>',0);
    // $builder->orderBy('org_name');
    // $query = $builder->get()->getResultArray();
    // foreach ($query as $key => $value) {
    //     $username = 'user'.$value['org_id'].'_1';

    //     $builder = $this->db->table('users');
    //     $builder->set('username',$username);
    //     $builder->set('password',password_hash('hrdi1234',PASSWORD_DEFAULT));
        
    //     $builder->set('org_id',$value['org_id']);
    //     $builder->set('first_name','เจ้าหน้าที่');
    //     $builder->set('last_name',$value['org_name_short']);
    //     $builder->set('status',1);
    //     $builder->set('user_type',2);
    //     $builder->insert();

    // }
  }

  function getUserAD($usr){
    $db = \Config\Database::connect('user_db', false); 
    $builder = $db->table('vLoadDetailStaff');
    $builder->select('*');
    $builder->where('usr',$usr);
    $query = $builder->get();
    return $query->getRowArray();

  }

  function updateERPUser(){
    $builder_del = $this->db->table('users');
    $builder_del->where('org_id',60);
    $builder_del->delete();


    $builder = $this->db->table('th_user_mssql');
    $builder->select('*');
    $query = $builder->get()->getResultArray();
    foreach ($query as $key => $value) {
      $builder_set = $this->db->table('users');
      $builder_set->set('user_id',$value['emp_id']);
      $builder_set->set('org_id',60);
      $builder_set->set('first_name',$value['frs_nam_tha']);
      $builder_set->set('last_name',$value['lst_nam_tha']);
      $builder_set->set('email',$value['eml']);
      $builder_set->set('status',1);
      $builder_set->set('user_type',1);
      $builder_set->insert();

    }
  }

  





}

 ?>
