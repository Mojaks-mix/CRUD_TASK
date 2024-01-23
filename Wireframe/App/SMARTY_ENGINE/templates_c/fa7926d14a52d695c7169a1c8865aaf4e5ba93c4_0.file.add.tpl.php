<?php
/* Smarty version 4.3.4, created on 2024-01-23 10:28:36
  from 'C:\xampp\htdocs\MVC_CRUD\APP\Views\templates\category\add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65af86c4d37111_96491146',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa7926d14a52d695c7169a1c8865aaf4e5ba93c4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MVC_CRUD\\APP\\Views\\templates\\category\\add.tpl',
      1 => 1706001825,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65af86c4d37111_96491146 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_74436046465af86c4d2d4f0_93717564', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'home.tpl');
}
/* {block 'content'} */
class Block_74436046465af86c4d2d4f0_93717564 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_74436046465af86c4d2d4f0_93717564',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h1 class="text-center my-5 py-3">Add New Category</h1>

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

            <form class="p-5 border mb-5" method="POST" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['plugin_url'][0], array( array('name'=>'categories/store'),$_smarty_tpl ) );?>
">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <lable class="input-group-text">Name</lable>
                    </div>
                    <input type="text" required name="category_name" class="form-control" id="category_name">
                </div>
                
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Parent</label>
                    </div>
                    <select required class="custom-select" name="parent_id" id="parent_id">
                        <option selected>No Parent</option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'value', false, 'key');
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
                <button type="submit" name="submit" class="btn btn-primary">Add</button>
            </form>

        </div>
    </div>
</div>

<?php
}
}
/* {/block 'content'} */
}
