<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
//matrciula 
/*
$routes->get('matricula','MatriculaController::index');// bug acces 
$routes->post('matricula','MatriculaController::index_post');
*/$routes->get('/', 'Home::index');



$routes->group('public', function($routes){

    $routes->get('login','LoginController::log');
    $routes->post('login','LoginController::log_post');
    
    $routes->get('login_code','LoginController::login_code');
    $routes->post('login_code','LoginController::login_code_post');
    $routes->get('error_pre','loginController::login_code_error'); 
    
});

$routes->group('matricula', function($routes){

    $routes->get('/', 'MatriculaController::matricula_view');
    $routes->post('/', 'MatriculaController::matricula_post');

    $routes->get('datos_alumne','MatriculaController::m_alumne_view');
    $routes->post('datos_alumne','MatriculaController::m_alumne_post');

    $routes->get('datos_curs','MatriculaController::m_curs_view');
    $routes->post('datos_curs','MatriculaController::m_curs_post');

    $routes->get('pago','MatriculaController::pago_view');
    $routes->post('pago','MatriculaController::pago_post');
     
    $routes->get('pago/pdf','MatriculaController::generar_pdf');

});
//------------------------------------------------------------------

  
// Endpoint para demostración de selects encadenados

$routes->get('privat/education','MatriculaController::education_dropdowns'); // alias bajo layout privat
// APIs JSON
$routes->get('matricula/estructuras','MatriculaController::estructuras');
$routes->get('matricula/asignaturas','MatriculaController::asignaturas');
$routes->get('matricula/asignaturas/all','MatriculaController::getAllAsignaturas');
$routes->get('matricula/optativas','MatriculaController::optativas');
$routes->get('matricula/optativas/all','MatriculaController::getAllOptativas');
$routes->get('matricula/buscar','MatriculaController::buscar');
$routes->post('matricula/estructura/save','MatriculaController::saveEstructura');
$routes->post('matricula/estructura/delete/(:num)','MatriculaController::deleteEstructura/$1');
$routes->post('matricula/asignatura/save','MatriculaController::saveAsignatura');
$routes->post('matricula/asignatura/delete/(:num)','MatriculaController::deleteAsignatura/$1');
$routes->post('matricula/optativa/save','MatriculaController::saveOptativa');
$routes->post('matricula/optativa/delete/(:num)','MatriculaController::deleteOptativa/$1');
$routes->post('matricula/nivel/save','MatriculaController::saveNivel');

// Rutas bajo "privat" para layout persistente
$routes->get('privat/expedientes', 'MatriculaController::expedientes_view');
$routes->get('privat/validados', 'MatriculaController::validados_view');

$routes->post('privat/validados/(:segment)', 'MatriculaController::validados_view_2/$1');


$routes->get('privat/validar/(:segment)', 'MatriculaController::validar_view/$1');
$routes->post('privat/validar/(:segment)/aprobar', 'MatriculaController::aprobarAlumno/$1');
$routes->post('privat/validar/(:segment)/anular', 'MatriculaController::anularAlumno/$1');

// API endpoints
$routes->get('api/validation-locks', 'MatriculaController::getValidationLocks');
$routes->post('api/unlock-student/(:segment)', 'MatriculaController::unlockStudent/$1');

// CRUD Mensajes
$routes->post('api/mensajes', 'MensajeController::create');
$routes->put('api/mensajes/(:num)', 'MensajeController::update/$1');
$routes->delete('api/mensajes/(:num)', 'MensajeController::delete/$1');


$routes->get('privat/historial', 'MatriculaController::historial_view');
$routes->get('privat/mensatges', 'MatriculaController::mensatges_view');
$routes->get('matricula/datos_alumne','MatriculaController::m_alumne_view');
$routes->post('matricula/datos_alumne','MatriculaController::m_alumne_post');
$routes->get('matricula/datos_pagament','MatriculaController::m_pagament_view');
$routes->post('matricula/datos_pagament','MatriculaController::m_pagament_post'); 


$routes->get('privat/Dashboard/Instiut-Caparrella','MatriculaController::Dashborad_view');
$routes->get('privat/Tandada','TandadaController::Tanda_view'); 
$routes->get('privat/Tandada/create','TandadaController::T_create'); 
$routes->post('privat/Tandada/create','TandadaController::T_post'); 

$routes->get('privat/Tandada/edit/(:segment)','TandadaController::T_edit/$1'); 
$routes->post('privat/Tandada/edit/(:segment)','TandadaController::T_edit_post/$1'); 
$routes->post('privat/tandada/eliminar/(:segment)','TandadaController::T_delete/$1');


//Auth  
       
$routes->get('Admin/Auth/Login','AuthController::login'); 
$routes->post('Admin/Auth/Login','AuthController::login_post'); 
$routes->post('Admin/Auth/logout','AuthController::logout'); 



