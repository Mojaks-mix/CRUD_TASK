<?php
/* Smarty version 4.3.4, created on 2024-01-23 10:28:42
  from 'C:\xampp\htdocs\MVC_CRUD\APP\Views\templates\category\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65af86cab27b05_09649722',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02fba20a21042f5073b692a09747f66e951f87fa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MVC_CRUD\\APP\\Views\\templates\\category\\edit.tpl',
      1 => 1706001924,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65af86cab27b05_09649722 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_22249035665af86cab1cb92_09469203', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'home.tpl');
}
/* {block 'content'} */
class Block_22249035665af86cab1cb92_09469203 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_22249035665af86cab1cb92_09469203',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
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
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Parent</label>
                    </div>
                    <select required class="custom-select" name="parent_id" id="parent_id">
                        <option selected>No Parent</option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['categories'], 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                            <option value = "<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>

<?php
}
}
/* {/block 'content'} */
}
