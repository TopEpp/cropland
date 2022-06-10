<?php

namespace Modules\Land\Controllers;

use Modules\Api\Models\Api_model;
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Modules\Land\Models\Land_model;

class Land extends BaseController
{
    use ResponseTrait;
    protected $model_land;
    protected $model_api;

    public function __construct()
    {
        $this->model_api = new Api_model();
        $this->model_land = new Land_model();        
    }

    public function index(){

        $data = [];

        $data = [
            'data' => $this->model_land->getAllLandPaginate(10,'page'),
            'pager' => $this->model_land->pager
        ];    
        
        $data['landuse'] =  $this->model_api->getLandUse();

        // $data['location'] =  $this->model_api->getlocation();
        $data['landprivilege'] =  $this->model_api->getLandprivilege();
        $data['landowner'] =  $this->model_api->getLandOwner();
        
        // $data['data'] = $this->model_land->getAllLand();
        return view('Modules\Land\Views\index',$data);
    }

    public function saveLand(){
        $input = $this->request->getPost();
        $session = session();
        $person_id = $this->model_land->saveLandManage($input);

        if (!empty($input['land_id'])){
            $session->setFlashdata("message", "แก้ไขข้อมูลเรียบร้อย");
        }else{
            $session->setFlashdata("message", "บันทึกข้อมูลเรียบร้อย");
        }

        return redirect()->to('land');
        
    }

    public function loadLands($id){
        $data['data'] = $this->model_land->getAllLand($id);
        return $this->respond($data);
    }

}