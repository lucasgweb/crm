<?php
use core\Router;

$router = new Router();

$router->get('/login', 'LoginController@index');
$router->post('/login', 'LoginController@auth');
$router->get('/logout/{id}', 'LoginController@logout');

$router->get('/','HomeController@index');

$router->get('/usuarios', 'UserController@index');
$router->get('/usuario/{id}', 'UserController@delete');
$router->get('/profile', 'UserController@editProfile');
$router->post('/profile', 'UserController@editProfileAction');

$router->post('/usuarios', 'UserController@store');
$router->post('/usuarios/edit', 'UserController@edit');

$router->get('/leads', 'LeadController@index');
$router->post('/leads', 'LeadController@store');
$router->get('/leads/delete/{id}', 'LeadController@delete');
$router->post('/lead-update', 'LeadController@update');
$router->get('/importarleads', 'LeadController@import');


$router->get('/misleads', 'MyLeadsController@index');
$router->post('/mi-lead-update', 'MyLeadsController@update');

$router->get('/reporteleads', 'ReportController@reportLeads');
$router->get('/reporteleadsvendedor', 'ReportController@reportLeadsSeller');

$router->get('/chat', 'ChatController@index');
$router->get('/chat/{id}', 'ChatController@chat');

$router->post('/chat', 'ChatController@store');

$router->get('/alumnos', 'StudentController@index');

$router->get('/profesores', 'TeacherController@index');

$router->get('/categorias', 'CategoryController@index');

$router->get('/tipos', 'TypeController@index');

$router->get('/modalidades', 'ModalityController@index');

$router->get('/cursos', 'CourseController@index');
