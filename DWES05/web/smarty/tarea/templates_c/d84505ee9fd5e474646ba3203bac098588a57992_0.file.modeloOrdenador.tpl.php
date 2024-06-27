<?php
/* Smarty version 4.3.0, created on 2023-12-05 02:28:19
  from 'E:\Xamp\htdocs\SERVERS\DWES05\web\smarty\tarea\templates\modeloOrdenador.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_656e7cb3efd328_73416265',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd84505ee9fd5e474646ba3203bac098588a57992' => 
    array (
      0 => 'E:\\Xamp\\htdocs\\SERVERS\\DWES05\\web\\smarty\\tarea\\templates\\modeloOrdenador.tpl',
      1 => 1701739632,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_656e7cb3efd328_73416265 (Smarty_Internal_Template $_smarty_tpl) {
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

      <h1><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getnombrecorto();?>
</h1>

      <p><strong>Código: </strong> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getcodigo();?>
</p>  
    </div>

    <div id="productos">
      <h2>Carasterísticas</h2>

      <p><strong>Procesador: </strong> <span><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getprocesador();?>
</span>   </p>

      <p><strong>RAM: </strong>  <span><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getram();?>
</span> </p>

      <p><strong>Tarjeta gráfica: </strong>  <span><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getgrafica();?>
</span>   </p>

      <p><strong>Unidad óptica: </strong>  <span><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getunidadoptica();?>
</span>   </p>

      <p><strong>Otros: </strong>  <span><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getotros();?>
</span>  </p>

      <p><strong>PVP: </strong>  <span><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getPVP();?>
</span>  </p>

      <h2 class="mOrdenador">Descripción</h2>
      <p><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getdescripcion();?>
</p> 

    </div>

    <div id="pie">
      <button><a href="productos.php">Volver a Producto</a></button>

    </div>

  </div>
</body>
</html><?php }
}
