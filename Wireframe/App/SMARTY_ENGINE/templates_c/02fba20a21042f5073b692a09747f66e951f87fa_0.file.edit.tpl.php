<?php
/* Smarty version 4.3.4, created on 2024-01-22 14:17:06
  from 'C:\xampp\htdocs\MVC_CRUD\APP\Views\templates\category\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65ae6ad28cbb43_63268509',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02fba20a21042f5073b692a09747f66e951f87fa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MVC_CRUD\\APP\\Views\\templates\\category\\edit.tpl',
      1 => 1705929326,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:inc/header.tpl' => 1,
    'file:inc/footer.tpl' => 1,
  ),
),false)) {
function content_65ae6ad28cbb43_63268509 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'printArrayWithLevels' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\MVC_CRUD\\APP\\SMARTY_ENGINE\\templates_c\\02fba20a21042f5073b692a09747f66e951f87fa_0.file.edit.tpl.php',
    'uid' => '02fba20a21042f5073b692a09747f66e951f87fa',
    'call_name' => 'smarty_template_function_printArrayWithLevels_101681514565ae6ad28a1b34_64664257',
  ),
));
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
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Parent</label>
                    </div>
                    <select required class="custom-select" name="parent_id" id="parent_id">
                        <option selected>No Parent</option>
                        
                        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'printArrayWithLevels', array('array'=>$_smarty_tpl->tpl_vars['data']->value['categories']), true);?>

                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:inc/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* smarty_template_function_printArrayWithLevels_101681514565ae6ad28a1b34_64664257 */
if (!function_exists('smarty_template_function_printArrayWithLevels_101681514565ae6ad28a1b34_64664257')) {
function smarty_template_function_printArrayWithLevels_101681514565ae6ad28a1b34_64664257(Smarty_Internal_Template $_smarty_tpl,$params) {
$params = array_merge(array('array'=>$_smarty_tpl->tpl_vars['data']->value,'level'=>0), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>

                            <?php $_smarty_tpl->_assignInScope('options', '');?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array']->value, 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                                <?php if (is_array($_smarty_tpl->tpl_vars['value']->value)) {?>
                                    <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'printArrayWithLevels', array('array'=>$_smarty_tpl->tpl_vars['value']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1), true);
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_assignInScope('options', ((string)$_smarty_tpl->tpl_vars['options']->value).$_prefixVariable1);?>
                                <?php } else { ?>
                                    <?php ob_start();
echo str_repeat('-',$_smarty_tpl->tpl_vars['level']->value);
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_assignInScope('options', ((string)$_smarty_tpl->tpl_vars['options']->value)."<option value=\"".((string)$_smarty_tpl->tpl_vars['value']->value->id)."\">".$_prefixVariable2." ".((string)$_smarty_tpl->tpl_vars['value']->value->category_name)."</option>");?>
                                <?php }?>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php echo $_smarty_tpl->tpl_vars['options']->value;?>

                        <?php
}}
/*/ smarty_template_function_printArrayWithLevels_101681514565ae6ad28a1b34_64664257 */
}
