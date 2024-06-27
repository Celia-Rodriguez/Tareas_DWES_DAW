<?php
/* Smarty version 4.3.0, created on 2023-12-01 18:59:54
  from 'C:\xampp\htdocs\PHP\TAREAS\DWES05\web\smarty\tarea\templates\ordenador.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_656a1f1a4843d7_09873732',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6474ef7e0c36f6166b23d27598e13daf1620f978' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PHP\\TAREAS\\DWES05\\web\\smarty\\tarea\\templates\\ordenador.tpl',
      1 => 1701453591,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_656a1f1a4843d7_09873732 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 5 : Programación orientada a objetos en PHP -->
<!-- Ejemplo Tienda Web: cesta.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Mdoelo Ordenador</title>
  <link href="tienda.css" rel="stylesheet" type="text/css">
</head>

<body class="pagcesta">

<div id="contenedor">
  <div id="encabezado">
    <h1>Modelo de ordenador</h1>
    <p>Código ordenador</p>
  </div>
  <div id="productos">
    <h2>Carasterísticas</h2>
     <p>Código  <span><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getcodigo();?>
</span>  </p>

     <p>Nombre Corto  <span><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getnombrecorto();?>
</span>   </p>

    <p>Procesador <span><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getprocesador();?>
</span>   </p>

    <p>RAM  <span><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getram();?>
</span> </p>

    <p>Tarjeta gráfica  <span><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getgrafica();?>
</span>   </p>

    <p>Unidad óptica  <span><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getunidadoptica();?>
</span>   </p>

    <p>Otros  <span><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getotros();?>
</span>  </p>

    <p>PVP  <span><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getPVP();?>
</span>  </p>
    
    <p>Descripción   <span><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getdescripcion();?>
</span>   </p>

  </div>
</div>
</body>
</html><?php }
}
