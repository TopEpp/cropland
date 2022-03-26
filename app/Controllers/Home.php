<?php

namespace App\Controllers;

class Home extends BaseController
{
    
    public function index()
    {
        $db = \Config\Database::connect();

        $query   = $db->query('SELECT * FROM USERS');
      
        $results = $query->getResult();
        
        return view('welcome_message',['data'=>$results]);
    }
}
