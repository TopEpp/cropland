<?php

namespace Modules\Land\Controllers;

use App\Controllers\BaseController;
use Modules\Land\Models\Land_model;

class Land extends BaseController
{
    protected $model_land;

    public function __construct()
    {
        $this->model_land = new Land_model();        
    }

    public function index(){

        $data = [];
        $data['data'] = $this->model_land->getAllLand();
        return view('Modules\Land\Views\index',$data);
    }

    public function saveLand(){
        $input = $this->request->getVar();
        $session = session();
        $person_id = $this->model_land->saveLandManage($input);

        if (!empty($input['land_id'])){
            $session->setFlashdata("message", "แก้ไขข้อมูลเรียบร้อย");
        }else{
            $session->setFlashdata("message", "บันทึกข้อมูลเรียบร้อย");
        }

        return redirect()->to('land');
        
    }

}