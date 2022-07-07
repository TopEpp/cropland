<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('Modules\Login\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/login', 'Login::index');
$routes->get('/logout', 'Login::logout');
$routes->get('/login/auth', 'Login::auth');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}


$routes->group("house", ["namespace" => "Modules\House\Controllers"], function ($routes) {
	$routes->get("/", "House::index");
    $routes->get("manage(:any)", "House::manage$1");
    $routes->get("members/(:num)(:any)", "House::members/$1$2");
    $routes->get("jobs/(:num)(:any)", "House::jobs/$1$2");
    $routes->get("income/(:num)(:any)", "House::income/$1$2");
    $routes->get("outcome/(:num)(:any)", "House::outcome/$1$2");

    //load data
    $routes->get("load-jobs/(:num)", "House::loadJobs/$1");
    $routes->get("load-members/(:num)(:any)", "House::loadmembers/$1$2");
    $routes->get("load-income/(:num)", "House::loadIncome/$1");
    $routes->get("load-outcome/(:num)", "House::loadOutcome/$1");

    $routes->get("load-jobdetail/(:num)", "House::jobdetails/$1");

    //save data
    $routes->post("save_manage", "House::saveManage");
    $routes->post("save_members/(:num)", "House::saveMembers/$1");
    $routes->post("save_jobs/(:num)", "House::saveJobs/$1");
    $routes->post("save_income/(:num)", "House::saveIncome/$1");
    $routes->post("save_outcome/(:num)", "House::saveOutcome/$1");

    //delete
    $routes->post("delete_house(:any)", "House::deleteHouse$1");
    $routes->post("delete_member(:any)", "House::deleteMember$1");
    $routes->post("delete_jobs(:any)", "House::deleteJobs$1");

    
});

$routes->group("survay_house", ["namespace" => "Modules\SurvayHouse\Controllers"], function ($routes) {
	$routes->get("/", "SurvayHouse::index");
    $routes->get("manage(:any)", "SurvayHouse::manage$1");
    $routes->get("members/(:num)(:any)", "SurvayHouse::members/$1$2");
    $routes->get("jobs/(:num)(:any)", "SurvayHouse::jobs/$1$2");
    $routes->get("income/(:num)(:any)", "SurvayHouse::income/$1$2");
    $routes->get("outcome/(:num)(:any)", "SurvayHouse::outcome/$1$2");

    //load data
    $routes->get("load-jobs/(:num)", "SurvayHouse::loadJobs/$1");
    $routes->get("load-members/(:num)(:any)", "SurvayHouse::loadmembers/$1$2");
    $routes->get("load-income/(:num)", "SurvayHouse::loadIncome/$1");
    $routes->get("load-outcome/(:num)", "SurvayHouse::loadOutcome/$1");

    $routes->get("load-jobdetail/(:num)", "SurvayHouse::jobdetails/$1");

    //save data
    $routes->post("save_manage", "SurvayHouse::saveManage");
    $routes->post("save_members/(:num)", "SurvayHouse::saveMembers/$1");
    $routes->post("save_jobs/(:num)", "SurvayHouse::saveJobs/$1");
    $routes->post("save_income/(:num)", "SurvayHouse::saveIncome/$1");
    $routes->post("save_outcome/(:num)", "SurvayHouse::saveOutcome/$1");

    //delete
    $routes->post("delete_interview(:any)", "SurvayHouse::deleteInterview$1");
    $routes->post("delete_member(:any)", "SurvayHouse::deleteMember$1");
    $routes->post("delete_jobs(:any)", "SurvayHouse::deleteJobs$1");

    $routes->post("get-duplicateHouse", "SurvayHouse::DuplicateHouse"); //หมู่บ้าน

    
});

$routes->group("land", ["namespace" => "Modules\Land\Controllers"], function ($routes) {
	$routes->get("/", "Land::index");

    //save data
    $routes->post("save_land", "Land::saveLand");

     //load data
     $routes->get("load-lands/(:num)", "Land::loadLands/$1");
});

$routes->group("survay", ["namespace" => "Modules\Survay\Controllers"], function ($routes) {
	$routes->get("/", "Survay::index");
    $routes->get("manage(:any)", "Survay::manage$1");
    $routes->get("land/(:num)(:any)", "Survay::land/$1$2");
    $routes->get("support/(:num)(:any)", "Survay::support/$1$2");
    $routes->get("support-other/(:num)(:any)", "Survay::supportOther/$1$2");
    $routes->get("problem/(:num)(:any)", "Survay::problem/$1$2");
    $routes->get("need/(:num)(:any)", "Survay::need/$1$2");
    $routes->get("picture/(:num)(:any)", "Survay::picture/$1$2");

     //load data
     $routes->get("load-land/(:num)(:any)", "Survay::loadland/$1$2");
     $routes->get("load-image", "Survay::loadImage");
     
    //save data
    $routes->post("save_manage", "Survay::saveManage");
    $routes->post("save_land/(:num)", "Survay::saveLand/$1");
    $routes->post("save_support/(:num)", "Survay::saveSupport/$1");
    $routes->post("save_support_other/(:num)", "Survay::saveSupportOther/$1");
    $routes->post("save_problem/(:num)", "Survay::saveSurvayProblem/$1");
    $routes->post("save_need/(:num)", "Survay::saveSurvayNeed/$1");

       //upload 
    $routes->post('upload_owner(:any)',"Survay::uploadOwnerArea$1");
    $routes->post('upload_area(:any)',"Survay::uploadArea$1");

    //delete
    $routes->post("delete_survay(:any)", "Survay::deleteSurvay$1");
    $routes->post("delete_support(:any)", "Survay::deleteSupport$1");
    $routes->post("delete_other(:any)", "Survay::deleteSupportOther$1");
    $routes->post("delete_problem(:any)", "Survay::deleteProblem$1");
    $routes->post("delete_need(:any)", "Survay::deleteNeed$1");

    $routes->post("delete_product(:any)", "Survay::deleteLandProduct$1");

    $routes->post("delete_image(:any)", "Survay::deleteImage$1");
    
});


$routes->group("member", ["namespace" => "Modules\User\Controllers"], function ($routes) {
	$routes->get("/", "User::index");
    $routes->post("saveDataPermission", "User::saveDataPermission");
    $routes->get('getPermission','User::getPermission');
});


$routes->group("dashboard", ["namespace" => "Modules\Dashboard\Controllers"], function ($routes) {
	$routes->get("survay", "Dashboard::survay");
    $routes->get("house", "Dashboard::house");
    // $routes->get("house-economy", "Dashboard::houseEconomy");
    // $routes->get("house-health", "Dashboard::houseHealth");
    // $routes->get("house-society", "Dashboard::houseSociety");
    // $routes->get("house-land", "Dashboard::houseLand");
    // $routes->get("house-problem", "Dashboard::houseProblem");
    // $routes->get("house-activity", "Dashboard::houseActivity");

});

$routes->group("report", ["namespace" => "Modules\Report\Controllers"], function ($routes) {
	$routes->get("survay", "Report::survay");
    $routes->get("survay(:any)", "Report::survayDetail$1");
    $routes->get("house(:any)", "Report::House$1");
    
    // $routes->get("house-type", "Dashboard::houseType");
    // $routes->get("house-economy", "Dashboard::houseEconomy");
    // $routes->get("house-health", "Dashboard::houseHealth");
    // $routes->get("house-society", "Dashboard::houseSociety");
    // $routes->get("house-land", "Dashboard::houseLand");
    // $routes->get("house-problem", "Dashboard::houseProblem");
    // $routes->get("house-activity", "Dashboard::houseActivity");

});



$routes->group("common", ["namespace" => "App\Controllers"], function ($routes) {
    $routes->get("get-amphur", "Common::amphur");
    $routes->get("get-tambon", "Common::tambon");
    $routes->get("get-projects", "Common::Projects"); //หมู่บ้าน
    $routes->get("get-villages", "Common::Villages"); //หมู่บ้าน
    $routes->get("get-projectVillages", "Common::projectVillages"); //หมู่บ้าน
    $routes->get("get-projectAddress", "Common::projectAddress"); //หมู่บ้าน 
    
    $routes->get("get-house", "Common::House");
    $routes->get("get-person", "Common::Person");
    $routes->get("get-village", "Common::Village"); //กลุ่มบ้าน
    $routes->get("get-land", "Common::Land"); //กลุ่มบ้าน

    $routes->get("get-address", "Common::personAddress"); //ที่อยู่
    $routes->get("get-product_type", "Common::getProductType"); //พันธู์
    $routes->get("get-product", "Common::getProduct"); //พันธู์
    $routes->get("get-dressing", "Common::getDressing");// ปุ๋ย
    
    // select2
    $routes->get("search-person", "Common::searchPerson");
    $routes->get("search-land", "Common::searchLand");
    $routes->get("search-user", "Common::searchUser");
    $routes->get("search-house", "Common::searchHouse");


    $routes->get("search-province", "Common::searchProvince");
    $routes->get("search-amphur", "Common::searchAmphur");
    $routes->get("search-tambon", "Common::searchTambon");
    $routes->get("search-village", "Common::searchVillage");
   
});

$routes->group("api", ["namespace" => "Modules\Api\Controllers"], function ($routes) {
    $routes->get("/", "Api::index");
    $routes->get("manage/(:any)", "Api::manage/$1");
    $routes->post("saveData", "Api::saveData");
    $routes->get("deleteData/(:any)/(:any)/(:any)", "Api::deleteData/$1/$2/$3");

    $routes->get("areaTarget", "Api::areaTarget");
    $routes->get("jobs", "Api::jobs");
    $routes->get("project", "Api::project");

    $routes->get("importUsers", "Api::importUsers");
    $routes->get("importlands", "Api::importlands");
    $routes->get("importHouse", "Api::importHouse");
    $routes->get("importPersons", "Api::importPersons");

    $routes->get("convUTMtoLL", "Api::convUTMtoLL");


});

