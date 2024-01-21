<?php
/* Smarty version 4.3.4, created on 2024-01-21 14:01:14
  from 'C:\xampp\htdocs\MVC_CRUD\APP\Views\templates\category\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65ad159a17c5c9_49811874',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1deffc2ab4bf5456ce44f2743e284965a6b55108' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MVC_CRUD\\APP\\Views\\templates\\category\\index.tpl',
      1 => 1705840737,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:inc/header.tpl' => 1,
    'file:inc/footer.tpl' => 1,
  ),
),false)) {
function content_65ad159a17c5c9_49811874 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:inc/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1 class="text-center my-5 py-3">View All Categories</h1>

<div class="container">
    <div class="row">
        <div class="col-10 mx-auto p-4 border mb-5">
            <?php if ((isset($_smarty_tpl->tpl_vars['data']->value['success']))) {?>
                <h3 class="alert alert-success text-center"><?php echo $_smarty_tpl->tpl_vars['data']->value['success'];?>
</h3>
            <?php }?>
            <?php if ((isset($_smarty_tpl->tpl_vars['data']->value['error']))) {?>
                <h3 class="alert alert-danger text-center"><?php echo $_smarty_tpl->tpl_vars['data']->value['error'];?>
</h3>
            <?php }?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Parent Id</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $_smarty_tpl->_assignInScope('i', 1);?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['categories'], 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
                            <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['category_name'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['parent_id'];?>
</td>
                            <td>
                                <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['plugin_url'][0], array( array('name'=>('categories/edit/').($_smarty_tpl->tpl_vars['row']->value['id'])),$_smarty_tpl ) );?>
" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['plugin_url'][0], array( array('name'=>('categories/delete/').($_smarty_tpl->tpl_vars['row']->value['id'])),$_smarty_tpl ) );?>
" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:inc/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}