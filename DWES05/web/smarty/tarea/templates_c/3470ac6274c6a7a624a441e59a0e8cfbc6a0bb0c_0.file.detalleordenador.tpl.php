<?php
/* Smarty version 4.3.0, created on 2023-12-05 01:38:23
  from 'E:\Xamp\htdocs\SERVERS\DWES05\web\smarty\tarea\templates\detalleordenador.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_656e70ff021614_95226247',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3470ac6274c6a7a624a441e59a0e8cfbc6a0bb0c' => 
    array (
      0 => 'E:\\Xamp\\htdocs\\SERVERS\\DWES05\\web\\smarty\\tarea\\templates\\detalleordenador.tpl',
      1 => 1701736567,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_656e70ff021614_95226247 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 5 : Programación orientada a objetos en PHP -->
<!-- Ejemplo Tienda Web: detalleordenador.php -->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ejemplo Tema 5: Detalle de ordenador</title>
        <link href="tienda.css" rel="stylesheet" type="text/css">
    </head>

    <body class="pagproductos">

        <div id="contenedor">
            <div id="encabezado">
                <h1><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getnombrecorto();?>
</h1>
                <p><strong><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getcodigo();?>
</strong></p>
            </div>

            <div id="productos">
                <h3>Características:</h3>
                <p>Procesador: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getProcesador();?>
</p>
                <p>RAM: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getRam();?>
</p>
                <p>Tarjeta gráfica: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getGrafica();?>
</p>
                <p>Unidad óptica: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getUnidadOptica();?>
</p>
                <p>Otros: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getOtros();?>
</p>
                <p>PVP: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getPVP();?>
</p>
                <h3>Descripción:</h3>
                <p><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getdescripcion();?>
</p>
            </div>
        </div>
    </body>
</html> <?php }
}
