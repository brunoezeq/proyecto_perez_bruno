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
$routes->get('user_admin', 'UsuarioController::admin', ['filter' => 'roladmin']); 
$routes->get('editarPerfil', 'UsuarioController::editarPerfil', ['filter' => 'auth']); 
$routes->post('actualizarPerfil', 'UsuarioController::actualizarPerfil', ['filter' => 'auth']); 
$routes->get('verMisCompras', 'UsuarioController::verMisCompras', ['filter' => 'auth']); 

/* ----- CONSULTAS ----- */
$routes->get('verConsultas', 'UsuarioController::verConsultas', ['filter' => 'roladmin']);
$routes->get('marcarRespondido/(:num)', 'UsuarioController::marcarRespondido/$1', ['filter' => 'roladmin']);

/* ----- PRODUCTO ----- */
$routes->get('catalogo', 'ProductoController::mostrarCatalogo'); //muestra vista catálogo
$routes->get('cargarProducto', 'ProductoController::formularioCargarProducto', ['filter' => 'roladmin']); //registra producto
$routes->post('cargarProducto', 'ProductoController::cargarProducto', ['filter' => 'roladmin']); // muestra vista cargar producto
$routes->get('gestionarProducto', 'ProductoController::gestionarProducto', ['filter' => 'roladmin']); //muestra vista gestionar producto
$routes->get('editarProducto/(:num)', 'ProductoController::editarProducto/$1', ['filter' => 'roladmin']);
$routes->post('actualizar', 'ProductoController::actualizarProducto', ['filter' => 'roladmin']);
$routes->get('eliminarProducto/(:num)', 'ProductoController::eliminarProducto/$1', ['filter' => 'roladmin']);
$routes->get('activarProducto/(:num)', 'ProductoController::activarProducto/$1', ['filter' => 'roladmin']);

/* ----- CARRITO ----- */
$routes->get('verCarrito', 'CarritoController::verCarrito', ['filter' => 'auth']);
$routes->post('agregarAlCarrito', 'CarritoController::agregarAlCarrito', ['filter' => 'auth']); 
$routes->get('eliminarItem/(:any)', 'CarritoController::eliminarItem/$1', ['filter' => 'auth']);
$routes->get('vaciarCarrito', 'CarritoController::vaciarCarrito', ['filter' => 'auth']);

/* ----- VENTAS ----- */
$routes->post('ventas', 'VentaController::registrarVenta', ['filter' => 'auth']); 
$routes->get('verVentas', 'VentaController::verVentas', ['filter' => 'roladmin']);
$routes->get('verDetalle/(:num)', 'VentaController::verDetalle/$1', ['filter' => 'roladmin']); 



 
