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
    $routes->get("load-jobs", "House::loadJobs");

    //save data
    $routes->post("save_manage", "House::saveManage");
    $routes->post("save_members/(:num)", "House::saveMembers/$1");
    $routes->post("save_jobs/(:num)", "House::saveJobs/$1");
    $routes->post("save_income/(:num)", "House::saveIncome/$1");
    $routes->post("save_outcome/(:num)", "House::saveOutcome/$1");
    
});

$routes->group("land", ["namespace" => "Modules\Land\Controllers"], function ($routes) {
	$routes->get("/", "Land::index");

    //save data
    $routes->post("save_land", "Land::saveLand");
});

$routes->group("survay", ["namespace" => "Modules\Survay\Controllers"], function ($routes) {
	$routes->get("/", "Survay::index");
    $routes->get("manage(:any)", "Survay::manage$1");
    $routes->get("land/(:num)(:any)", "Survay::land/$1$2");
    $routes->get("support/(:num)(:any)", "Survay::support/$1$2");
    $routes->get("support-other/(:num)(:any)", "Survay::supportOther/$1$2");
    $routes->get("problem/(:num)(:any)", "Survay::problem/$1$2");
    $routes->get("need/(:num)(:any)", "Survay::need/$1$2");

      //save data
      $routes->post("save_manage", "Survay::saveManage");
      $routes->post("save_land/(:num)", "Survay::saveLand/$1");
      $routes->post("save_support/(:num)", "Survay::saveSupport/$1");
      $routes->post("save_support_other/(:num)", "Survay::saveSupportOther/$1");
      $routes->post("save_problem/(:num)", "Survay::saveSurvayProblem/$1");
      $routes->post("save_need/(:num)", "Survay::saveSurvayNeed/$1");
});


$routes->group("member", ["namespace" => "Modules\User\Controllers"], function ($routes) {
	$routes->get("/", "User::index");
});


$routes->group("dashboard", ["namespace" => "Modules\Dashboard\Controllers"], function ($routes) {
	$routes->get("/", "Dashboard::index");
    $routes->get("index1", "Dashboard::index1");
    $routes->get("index2", "Dashboard::index2");
    $routes->get("index3", "Dashboard::index3");
    $routes->get("index4", "Dashboard::index4");
    $routes->get("index5", "Dashboard::index5");
    $routes->get("index6", "Dashboard::index6");
    $routes->get("index7", "Dashboard::index7");

});


$routes->group("common", ["namespace" => "App\Controllers"], function ($routes) {
    $routes->get("get-amphur", "Common::amphur");
    $routes->get("get-tambon", "Common::tambon");
});

$routes->group("api", ["namespace" => "Modules\Api\Controllers"], function ($routes) {
    $routes->get("/", "Api::index");
    $routes->get("manage/(:any)", "Api::manage/$1");
    $routes->post("saveData", "Api::saveData");
    $routes->get("deleteData/(:any)/(:any)/(:num)", "Api::deleteData/$1/$2/$3");

    $routes->get("areaTarget", "Api::areaTarget");
    $routes->get("jobs", "Api::jobs");


});

