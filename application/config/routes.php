<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Proyect_Controller';
$route['principal'] = 'Proyect_Controller/index';
$route['quienessomos'] = 'Proyect_Controller/quienessomos';
$route['suscripciones'] = 'Proyect_Controller/suscripciones';
$route['terminosdeuso'] = 'Proyect_Controller/terminosdeuso';
$route['productos'] = 'Proyect_Controller/productos';
$route['infocontactos'] = 'consulta_controller/infocontactos';
$route['consulta'] = 'Consulta_controller/registrar_consulta';


/* Login */
$route['registrarse'] = 'usuario_controller/registrarse';
$route['registrar'] = 'usuario_controller/registrar_usuario';
$route['login'] = 'usuario_controller/login';
$route['ingresar'] = 'usuario_controller/iniciar_sesion';
$route['salir'] = 'usuario_controller/cerrar_sesion';

/* Carrito */
$route['comprar'] = 'carrito_controller/agregar_carrito';
$route['carrito'] = 'carrito_controller/ver_carrito';

/* Admin */
$route['admin'] = 'admin_controller/usuario_admin';
$route['agregar'] = 'curso_controller/form_agregar_curso';
$route['insertar_curso'] = 'curso_controller/registrar_curso';
$route['gestionar'] = 'curso_controller/gestionar_cursos';
$route['ver_consultas'] = 'admin_controller/ver_consultas';
$route['ver_consultasleidas'] = 'admin_controller/consultasleidas';
$route['ver_ventas'] = 'admin_controller/ver_ventas';
$route['gestionar_usuarios'] = 'admin_controller/ver_usuarios';
$route['editar_usuario'] = 'admin_controller/editar_usuario';



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
