<?php
//archivos requeridos 
require_once('include/DB.php');
require_once('Smarty.class.php');

// Recuperamos la información de la sesión
session_start();

// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario'])) 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");

// Cargamos la librería de Smarty
$smarty = new Smarty;
$smarty->template_dir = '../web/smarty/tarea/templates/';
$smarty->compile_dir = '../web/smarty/tarea/templates_c/';
$smarty->config_dir = '../web/smarty/tarea/configs/';
$smarty->cache_dir = '../web/smarty/tarea/cache/';

$smarty->assign('usuario', $_SESSION['usuario']);
//recogemos el valor del código desde la url
$smarty->assign('codigo', $_GET['codigo']);
//mandamos ese código a la sentencia SQL para realizar la búsqueda y poder mostrar los datos
$smarty->assign('ordenador', DB::obtieneOrdenador($_GET['codigo']));

// Mostramos la plantilla
$smarty->display('modeloOrdenador.tpl');

?>