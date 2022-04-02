<?php

namespace Modules\House\Controllers;

use App\Controllers\BaseController;
use App\Models\InterViewHouse_model;
use Modules\House\Models\House_model;

class House extends BaseController
{
    protected $model_house;
    protected $model_interview_house;

    public function __construct()
    {
        $this->model_house = new House_model();
        $this->model_interview_house = new InterViewHouse_model();
    }

    public function index(){
        $data = [];
        $data['data'] = $this->model_interview_house->getAllInterViewHouse();

        return view('Modules\House\Views\index',$data);
    }
    
    public function manage($id = null){
        
        $data = [];
        if ($id){
            $data = $this->model_house->getAllHouse($id);
        }

        return view('Modules\House\Views\manage',$data);
    }

    public function saveManage(){
        $input = $this->request->getVar();
           
        $session = session();
        
        if (!empty($input)){
            // insert house
            $data_house = $input;
            unset($data_house['interview_project']);
            unset($data_house['interview_project_name']);
            unset($data_house['interview_year']);
            unset($data_house['interview_id']);
            $house_id = $this->model_house->saveHouseManage($data_house);
        
            //insert interview house
            if ($house_id){
                $data_interview = [
                    'interview_id' => $input['interview_id'],
                    'interview_project' => $input['interview_project'],
                    'interview_project_name' => $input['interview_project_name'],
                    'interview_year' => $input['interview_year'],
                    'interview_house' => $house_id,
                ];
                $this->model_interview_house->saveInterViewHouse($data_interview);
            }

            if (!empty($input['house_id'])){
                $session->setFlashdata("message", "แก้ไขข้อมูลเรียบร้อย");
            }else{
                $session->setFlashdata("message", "บันทึกข้อมูลเรียบร้อย");
            }
            
        }
     
        return redirect()->to('house/manage/'.$house_id);
    }

    public function members($house_id ,$id = null){
        $data['house_id'] = $house_id;
        $data['data'] = $this->model_house->getAllHouseMembers($house_id,$id);

        return view('Modules\House\Views\members', $data);
    }

    public function saveMembers($house_id){
        $input = $this->request->getVar();
        $session = session();
        $input['house_id'] = $house_id;
        $person_id = $this->model_house->saveHouseMember($input);

        if (!empty($input['person_id'])){
            $session->setFlashdata("message", "แก้ไขข้อมูลเรียบร้อย");
        }else{
            $session->setFlashdata("message", "บันทึกข้อมูลเรียบร้อย");
        }

        return redirect()->to('house/members/'.$house_id);
        
    }

    public function jobs($house_id ,$id = null){
        $data['house_id'] = $house_id;
        return view('Modules\House\Views\jobs', $data);
    }

    public function benefits($house_id ,$id = null){
        $data['house_id'] = $house_id;
        return view('Modules\House\Views\benefits', $data);
    }

    public function accounts($house_id ,$id = null){
        $data['house_id'] = $house_id;
        return view('Modules\House\Views\accounts', $data);
    }
}