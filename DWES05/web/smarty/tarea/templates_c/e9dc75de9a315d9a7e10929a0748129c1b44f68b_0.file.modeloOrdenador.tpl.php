<?php
/* Smarty version 4.3.0, created on 2023-12-04 17:24:17
  from 'C:\xampp\htdocs\PHP\TAREAS\DWES05\web\smarty\tarea\templates\modeloOrdenador.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_656dfd3170a821_70804826',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9dc75de9a315d9a7e10929a0748129c1b44f68b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PHP\\TAREAS\\DWES05\\web\\smarty\\tarea\\templates\\modeloOrdenador.tpl',
      1 => 1701706485,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_656dfd3170a821_70804826 (Smarty_Internal_Template $_smarty_tpl) {
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
<?php if (empty($_smarty_tpl->tpl_vars['ordenador']->value)) {?>
  <p> No hay datos para este modelo </p>
<?php } else { ?>

    <h2>Carasterísticas</h2>
    <p class="mOrdenador">Código  <span><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getcodigo();?>
</span>  </p>

    <p class="mOrdenador">Nombre Corto  <span><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getnombrecorto();?>
</span>   </p>

    <p class="mOrdenador">Procesador <span><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getprocesador();?>
</span>   </p>

    <p class="mOrdenador">RAM  <span><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getram();?>
</span> </p>

    <p class="mOrdenador">Tarjeta gráfica  <span><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getgrafica();?>
</span>   </p>

    <p class="mOrdenador" >Unidad óptica  <span><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getunidadoptica();?>
</span>   </p>

    <p class="m_rdenador">Otros  <span><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getotros();?>
</span>  </p>

    <p class="m_rdenador">PVP  <span><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getPVP();?>
</span>  </p>
    
    <p class="mOrdenador">Descripción   <span><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getdescripcion();?>
</span>   </p>
 <?php }?>
 
  </div>


  <div id="pie">
    <button><a href="productos.php">Volver a Producto</a></button>
  </div>

</div>
</body>
</html><?php }
}
