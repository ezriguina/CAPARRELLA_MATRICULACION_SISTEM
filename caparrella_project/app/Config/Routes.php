<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/matricula/','MatriculaController::index');
$routes->get('/matricula/datos_alumne','MatriculaController::m_alumne_view');
$routes->post('/matricula/datos_alumne','MatriculaController::m_alumne_post');
$routes->get('/matricula/datos_pagament','MatriculaController::m_pagament_view');
$routes->post('/matricula/datos_pagament','MatriculaController::m_pagament_post');
$routes->get('public/login','LoginController::log');
$routes->post('public/login','LoginController::log_post');

