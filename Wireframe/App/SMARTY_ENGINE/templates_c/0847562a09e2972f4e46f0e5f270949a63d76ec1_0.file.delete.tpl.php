<?php
/* Smarty version 4.3.4, created on 2024-01-23 11:41:16
  from 'C:\xampp\htdocs\MVC_CRUD\APP\Views\templates\category\delete.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65af97ccc8b304_38654864',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0847562a09e2972f4e46f0e5f270949a63d76ec1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MVC_CRUD\\APP\\Views\\templates\\category\\delete.tpl',
      1 => 1706001941,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65af97ccc8b304_38654864 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_35439515665af97ccc86c01_11225063', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'home.tpl');
}
/* {block 'content'} */
class Block_35439515665af97ccc86c01_11225063 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_35439515665af97ccc86c01_11225063',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
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

<?php
}
}
/* {/block 'content'} */
}
