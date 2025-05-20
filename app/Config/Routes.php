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
$routes->get('contacto', 'Home::contacto');                             
$routes->get('comercializacion', 'Home::comercializacion');             
$routes->get('terminos_y_usos', 'Home::terminos');                      
$routes->get('quienes_somos', 'Home::somos');                           
 
//$routes->get('registro', 'Home::registro');  
//$routes->get('login', 'Home::login');  

/* ----- USUARIO ----- */
$routes->get('registro', 'UsuarioController::registro');  
$routes->get('login', 'UsuarioController::login'); 
$routes->post('registro', 'UsuarioController::registrarUsuario');
$routes->post('consulta', 'UsuarioController::registrarConsulta');

/* ----- PRODUCTO ----- */
$routes->get('catalogo', 'Home::catalogo'); 









/*
<?php

use CodeIgniter\Router\RouteCollection;

// @var RouteCollection $routes
$routes->get('/', 'Home::index');
$routes->get('/', 'Home::contacto');
$routes->get('/', 'Home::quienes_somos');
 */

 
