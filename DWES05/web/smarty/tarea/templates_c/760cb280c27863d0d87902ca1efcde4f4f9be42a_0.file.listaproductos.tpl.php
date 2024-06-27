<?php
/* Smarty version 4.3.0, created on 2023-12-05 02:25:58
  from 'E:\Xamp\htdocs\SERVERS\DWES05\web\smarty\tarea\templates\listaproductos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_656e7c26e10576_52048947',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '760cb280c27863d0d87902ca1efcde4f4f9be42a' => 
    array (
      0 => 'E:\\Xamp\\htdocs\\SERVERS\\DWES05\\web\\smarty\\tarea\\templates\\listaproductos.tpl',
      1 => 1701739077,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_656e7c26e10576_52048947 (Smarty_Internal_Template $_smarty_tpl) {
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
            
                        <?php if ($_smarty_tpl->tpl_vars['producto']->value->getfamilia() == "ORDENA") {?>

                            <a href="../tarea/modeloOrdenador.php?codigo=<?php echo $_smarty_tpl->tpl_vars['codigo']->value;?>
">

                <?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombrecorto();?>
: <?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP();?>
 euros. 

              </a> 

                        <?php } else { ?>      

              <?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombrecorto();?>
: <?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP();?>
 euros. 

            <?php }?>

       </form>
       
       </p>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
