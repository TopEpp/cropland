<?php

namespace Modules\Login\Controllers;

use App\Controllers\BaseController;
use Modules\User\Models\user_model;

class Login extends BaseController
{
    public function index(){

      if(session()->get('logged_in')){
        return redirect()->to('/house');
      }

      return view('Modules\Login\Views\index.php');
    }
  
    public function auth(){
  
      $username = $this->request->getVar('Username');
      $password = $this->request->getVar('password');

      $ses_data = [
        'logged_in' => TRUE,
        'name' => 'Admin',
      ];
      $session = session();
      $session->set($ses_data);
      return redirect()->to('/house');

      if($this->loginAD($username,$password)){
        return redirect()->to('/house');
      }else{
        return redirect()->to('/login');
      }

      // else{
      //   $session = session();
      //   $User = new User_model();
        
      //   $data = $User->where('username',$username)->first();
      //   if ($data) {
      //     $pass = $data['password'];
      //     $status = $data['user_type'];
      //     $verify_pass =  password_verify($password,$pass);
      //     if ($verify_pass) {
      //       $user_img = base_url('public/img/default-profile.jpeg');
      //       if(!empty($data['user_img'])){
      //         $user_img = base_url('public/uploads/user/'.$data['user_img']);
      //       }
      //       $ses_data = [
      //         'user_id' => $data['user_id'],
      //         'org_id' => $data['org_id'],
      //         'username' => $data['username'],
      //         'name' => $data['first_name'].' '.$data['last_name'],
      //         'email' => $data['email'],
      //         'phone' => $data['phone'],
      //         'user_type' => $data['user_type'],
      //         'user_img' => $user_img,
      //         'user_erp'=>0,
      //         'logged_in' => TRUE
      //       ];
      //       $session->set($ses_data);
      //       return redirect()->to('/main');
      //     } else {
      //       $session->setFlashdata('error','Username หรือ Password ผิด กรุณากรอกใหม่');
      //       return redirect()->back()->withInput();
      //     }
  
      //   } else {
      //     $session->setFlashdata('error','Username หรือ Password ผิด กรุณากรอกใหม่');
      //     return redirect()->back()->withInput();
      //   }
      // }
  
    }
  
    function loginAD($username='',$pass=''){
      
      $session = session();
      $response = '';
      $server   = "ad01.hrdi.or.th";
      $user     = $username."@hrdi.or.th";
  
      $ad = @ldap_connect($server);
  
      if(!$ad) {
        $msg = "Can not connect server";
        $response = false;
        

      }else {
        
        $b = @ldap_bind($ad,$user,$pass);
        if(!$b) {
            // login false
            $msg = "Login false";
            if(!$c_login){
                $msg = "Users Log In Simultaneously";
            }
            $response = false;
      
        }else{
            $User_model = new user_model();
            $item = $User_model->getUserAD($username);
            $fullname = $item['fullname'];
            $user_img = base_url('public/img/default-profile.jpeg');
            // if(!empty($data['user_img'])){
            //   $user_img = base_url('public/uploads/user/'.$data['user_img']);
            // }
  
            $ses_data = [
              'user_id' => $item['emp_id'],
              'org_id' => $item['org_lvl1_id'],
              'username' => $username,
              'name' => $fullname,
              // 'email' => $data['email'],
              // 'phone' => $data['phone'],
              'user_type' => 1,
              'user_erp' => 1,
              'user_img' => $user_img,
              'logged_in' => TRUE
            ];
  
            $session->set($ses_data);
  
  
            // if($keep){
            //     //Cookie
            //     $expireCookie = "10800"; // 3 hour
            //     set_cookie('hrdi_user',$username,$expireCookie);
            //     set_cookie('hrdi_pass',$pass,$expireCookie);
            //     set_cookie('active', TRUE, $expireCookie);
            //     set_cookie('user_id', $item->emp_id, $expireCookie);
            //     set_cookie('fullname', $item->fullname, $expireCookie);
            //     set_cookie('group_member_id', $item->department, $expireCookie);
            // }
  
  
            $msg = "Login success";
            $response = true;
        }
  
      }

      $session->setFlashdata("message", $msg);

      return $response;
  
    }
  
    public function logout(){
      $session = session();
      $session->destroy();
      return redirect()->to('login');
    }
}

