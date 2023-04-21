<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Rutas de interfaz

$routes->get('/', 'Home::index');
$routes->get('temperatureGraphic', 'DatosController::lineGraphic');
$routes->get('gaugeView', 'DatosController::gaugeView');
$routes->get('areaGraphic', 'DatosController::graphicView');
$routes->get('barGraphic', 'DatosController::barView');
$routes->get('historialView', 'HistorialController::historial');

//Rutas para las funciones de consulta (Formato JSON)

$routes->get('gaugeQuery', 'DatosController::gauge');
$routes->get('linesQuery', 'DatosController::lines');
$routes->get('graphicQuery', 'DatosController::graphic'); // Reutilizado para la gráfica de barrras
$routes->match(['get', 'post'], 'historialData', 'HistorialController::historialInfo');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}