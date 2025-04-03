<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

if(file_exists (SYSTEMPATH . 'Config/Routes.php')){
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

$routes->get('/', 'Home::index');
$routes->get('principal', 'Home::index');
$routes->get('contacto', 'Contacto::index'); 
$routes->get('comercializacion', 'Comercializacion::index'); 
$routes->get('terminos_y_usos', 'Terminos_y_usos::index'); 
$routes->get('quienes_somos', 'Quienes_somos::index');











/*
<?php

use CodeIgniter\Router\RouteCollection;

// @var RouteCollection $routes
$routes->get('/', 'Home::index');
$routes->get('/', 'Home::contacto');
$routes->get('/', 'Home::quienes_somos');
 */

 
