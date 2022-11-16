<?php
require_once './libs/Router.php';
require_once './app/controllers/pelicula-api.controller.php';
require_once './app/controllers/comentario-api.controller.php';

// crea el router
$router = new Router();

// defina la tabla de ruteo
$router->addRoute('peliculas', 'GET', 'PeliculasApiController', 'getfilms');
$router->addRoute('peliculas/:ID', 'GET', 'PeliculasApiController', 'getfilm');
$router->addRoute('peliculas/:ID', 'DELETE', 'PeliculasApiController', 'deletepelicula');
$router->addRoute('peliculas', 'POST', 'PeliculasApiController', 'insertpelicula'); 
// define la tabla comentarios
$router->addRoute('comentarios', 'GET', 'ComentariosApiController', 'getAllcomentarios');
$router->addRoute('comentarios/:ID', 'GET', 'ComentariosApiController', 'getcomentario');
$router->addRoute('comentarios/:ID', 'DELETE', 'ComentariosApiController', 'deletecomentario');
$router->addRoute('comentarios', 'POST', 'ComentariosApicontroller', 'insertcomentario');

// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);