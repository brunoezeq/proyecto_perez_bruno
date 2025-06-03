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

/* ----- USUARIO ----- */
$routes->get('registro', 'UsuarioController::registro');  //muestra vista de registro
$routes->get('login', 'UsuarioController::login');        // muestra vista para iniciar sesión
$routes->post('registro', 'UsuarioController::registrarUsuario'); //registrar usuario
$routes->post('consulta', 'UsuarioController::registrarConsulta'); //registrar consulta
$routes->post('verificarUsuario', 'UsuarioController::iniciarSesion'); 
$routes->get('logout', 'UsuarioController::cerrarSesion'); 
$routes->get('user_admin', 'UsuarioController::admin'); 

/* ----- PRODUCTO ----- */
$routes->get('catalogo', 'Home::catalogo'); //muestra vista catálogo
$routes->get('cargarProducto', 'ProductoController::formularioCargarProducto'); //registra producto
$routes->post('cargarProducto', 'ProductoController::cargarProducto'); // muestra vista cargar producto
$routes->get('gestionarProducto', 'ProductoController::gestionarProducto'); //muestra vista gestionar producto
$routes->get('editarProducto/(:num)', 'ProductoController::editarProducto/$1');
$routes->post('actualizar', 'ProductoController::actualizarProducto');
$routes->get('eliminar/(:num)', 'ProductoController::eliminarProducto/$1');
$routes->get('activar/(:num)', 'ProductoController::activarProducto/$1');








/*
<?php

use CodeIgniter\Router\RouteCollection;

// @var RouteCollection $routes
$routes->get('/', 'Home::index');
$routes->get('/', 'Home::contacto');
$routes->get('/', 'Home::quienes_somos');
 */

 
