<?php
/* Smarty version 4.3.0, created on 2023-12-04 16:40:42
  from 'C:\xampp\htdocs\PHP\TAREAS\DWES05\web\smarty\tarea\templates\listaproductos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_656df2fa08d3c6_79155786',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ba48debcdd31bebcbba4523da51d7b69e5928e7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PHP\\TAREAS\\DWES05\\web\\smarty\\tarea\\templates\\listaproductos.tpl',
      1 => 1701704439,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_656df2fa08d3c6_79155786 (Smarty_Internal_Template $_smarty_tpl) {
?>    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'producto');
$_smarty_tpl->tpl_vars['producto']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
$_smarty_tpl->tpl_vars['producto']->do_else = false;
?>
        <p>
        <form id='<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
' action='productos.php' method='post'>

        <input type='hidden' name='cod' value='<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
'/>

        <input type='submit' name='enviar' value='Añadir'/>

        <?php $_smarty_tpl->_assignInScope('codigo', $_smarty_tpl->tpl_vars['producto']->value->getcodigo());?>

        <a href="../tarea/modeloOrdenador.php?codigo=<?php echo $_smarty_tpl->tpl_vars['codigo']->value;?>
">
         <?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombrecorto();?>
: <?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP();?>
 euros. 
       </a> 
               
       </form>
       
       </p>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
