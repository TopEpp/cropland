<?php
namespace Modules\User\Controllers;
use App\Controllers\BaseController;
use Modules\User\Models\User_model;
use Modules\Api\Models\Api_model;
use CodeIgniter\API\ResponseTrait;
class User extends BaseController
{

  protected $template;
  use ResponseTrait;
  protected $model_user;

  public function __construct()
  {
      $this->model_user = new User_model();
  }

  public function index()
  {
    // $data['users'] = $this->model_user->getAllUsers();

    // $userModel = new UserModel();
  
    $data['search'] = $this->request->getGet();
    $data = [
        'users' => $this->model_user->paginate(10,'page'),
        'pager' => $this->model_user->pager
    ];    
    // $data['user'] = $User->getUserGroupOrg();
    // $data['org'] = $User->getTreeOrg();
    // $User->updateERPUser();
    // // $data = array();
    return view("Modules\User\Views\index",$data);
  }

  public function saveDataPermission(){
    $this->model_api = new Api_model();
    $input = $this->request->getVar();
    $res =  $this->model_api->saveDataPermission($input);
    return $res;
  }

  public function getPermission(){
    $this->model_api = new Api_model();
    $input = $this->request->getVar();
    $res =  $this->model_api->getPermission($input['emp_id']);
    // return $res;

    return $this->setResponseFormat('json')->respond($res);
  }

  public function user_update()
  {
    $User = new User_model();
    $input = $this->request->getVar();
    $images = $this->request->getFile('user_img');
    $User->user_update($input,$images);
    return true;
  }

  public function getDataTree(){
    $User = new User_model();
    $data_user = $User->getUserGroupOrg();
    $data_org = $User->getTreeOrg();

    $data =  $this->genDataTree($data_org,$data_user);
    return $this->setResponseFormat('json')->respond($data);
  }

  public function genDataTree($org,$user,$parent=0){
    $data = array();
    if(!empty($org[$parent])){
      foreach($org[$parent] as $key => $o) {
        $children = $this->genDataTree($org,$user,$o['org_id']);

        if(!empty($user[$o['org_id']])){
          $children = $this->genUser($user[$o['org_id']]);
        }

        if($parent==0){
          $is_level = 'org_root';
        }else{
          $is_level = 'org';
        }
        
        $data[] = array('id' => "org-".$o['org_id'], 'text' => "{$o['org_name']}", 'data' => $o, 'children' => $children, 'is_level'=>$is_level, 'level' => $o['org_parent'] );
        
      }
    }
    return $data;
  }

  public function genUser($user,$tr=''){
    foreach($user as $key => $u) {
        $is_level = 'user';
        $data[] = array('id' => "user-".$u['user_id'], 'text' => $u['first_name'].' '.$u['last_name'], 'data' => $u, 'is_level'=>$is_level, 'level' => $u['org_id'] );
    }

    return $data;
  }

  public function update_org()
  {
    $User = new User_model();
    $data = $this->request->getVar();
    $User->update_org($data);
    return true;
  }

  public function delete_org($id){
    $User = new User_model();
    $User->delete_org($id);
    return true;
  }
  
  public function get_user()
  {
    $User = new User_model();
    $user_id = $this->request->getVar('user_id');
    $data = $User->get_user($user_id);
    echo json_encode($data);
  }

  public function check_username()
  {
    $User = new User_model();
    $user_id = $this->request->getVar('user_id');
    $user_name = $this->request->getVar('username');
    $data = $User->check_username($user_id,$user_name);
    echo json_encode($data);
  }
 
  public function delete_user($id = '')
  {
    $User = new User_model();
    $User->delete_user($id);
    return redirect()->to('/user');
  }

  public function genNewUser(){
    $User = new User_model();
    $data = $User->genNewUser();
  }

  
}

 ?>
