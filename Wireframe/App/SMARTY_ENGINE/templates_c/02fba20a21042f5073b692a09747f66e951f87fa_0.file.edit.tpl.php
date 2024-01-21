<?php
/* Smarty version 4.3.4, created on 2024-01-21 14:01:18
  from 'C:\xampp\htdocs\MVC_CRUD\APP\Views\templates\category\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65ad159e36d691_14344494',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02fba20a21042f5073b692a09747f66e951f87fa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MVC_CRUD\\APP\\Views\\templates\\category\\edit.tpl',
      1 => 1705840540,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:inc/header.tpl' => 1,
    'file:inc/footer.tpl' => 1,
  ),
),false)) {
function content_65ad159e36d691_14344494 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:inc/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1 class="text-center mt-5 mb-2 py-3">Edit Category</h1>

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

            <form class="p-5 border mb-5" method="POST" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['plugin_url'][0], array( array('name'=>'categories/update'),$_smarty_tpl ) );?>
">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['category_name'];?>
" name="category_name" class="form-control" id="category_name">
                    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['id'];?>
" name="id">
                </div>
                <div class="form-group">
                    <label for="price">Parent</label>
                    <input type="text" required class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['parent_id'];?>
" name="parent_id" id="parent_id">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:inc/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
