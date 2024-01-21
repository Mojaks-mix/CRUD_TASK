<?php
/* Smarty version 4.3.4, created on 2024-01-21 14:00:18
  from 'C:\xampp\htdocs\MVC_CRUD\APP\Views\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65ad15623522f6_45882496',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16f618257c48be15ec607f1abbd20e394c48c0ed' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MVC_CRUD\\APP\\Views\\templates\\home.tpl',
      1 => 1705842013,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:inc/header.tpl' => 1,
    'file:inc/footer.tpl' => 1,
  ),
),false)) {
function content_65ad15623522f6_45882496 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:inc/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="jumbotron text-center mt-5">
  <h1 class="display-4">CRUD_MVC</h1>
  <hr class="my-4">
  <a class="btn btn-primary btn-lg" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['plugin_url'][0], array( array('name'=>'categories'),$_smarty_tpl ) );?>
" role="button">SHOW Categories</a>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:inc/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
