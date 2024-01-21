<?php
/* Smarty version 4.3.4, created on 2024-01-21 14:02:02
  from 'C:\xampp\htdocs\MVC_CRUD\APP\Views\templates\category\delete.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65ad15ca397b91_28828931',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0847562a09e2972f4e46f0e5f270949a63d76ec1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MVC_CRUD\\APP\\Views\\templates\\category\\delete.tpl',
      1 => 1705831973,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:inc/header.tpl' => 1,
    'file:inc/footer.tpl' => 1,
  ),
),false)) {
function content_65ad15ca397b91_28828931 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:inc/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">

            <?php if ((isset($_smarty_tpl->tpl_vars['data']->value['success']))) {?>
                <h3 class="alert alert-success text-center"><?php echo $_smarty_tpl->tpl_vars['data']->value['success'];?>
</h3>
            <?php }?>
            <?php if ((isset($_smarty_tpl->tpl_vars['data']->value['error']))) {?>
                <h3 class="alert alert-danger text-center"><?php echo $_smarty_tpl->tpl_vars['data']->value['error'];?>
</h3>
            <?php }?>

        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:inc/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
