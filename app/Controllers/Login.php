<?php

namespace App\Controllers;

class Login extends BaseController
{
    
    public function index()
    {
        $db = \Config\Database::connect();
   
        $query   = $db->query('SELECT * FROM USERS');
      
        $results = $query->getResult();
        
        return view('login',['data'=>$results]);
    }
}
