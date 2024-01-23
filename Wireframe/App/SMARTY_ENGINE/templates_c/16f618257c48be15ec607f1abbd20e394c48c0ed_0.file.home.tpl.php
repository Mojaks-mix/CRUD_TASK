<?php
/* Smarty version 4.3.4, created on 2024-01-23 13:56:32
  from 'C:\xampp\htdocs\MVC_CRUD\APP\Views\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65afb780626686_91522609',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16f618257c48be15ec607f1abbd20e394c48c0ed' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MVC_CRUD\\APP\\Views\\templates\\home.tpl',
      1 => 1706014501,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_65afb780626686_91522609 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    <!-- Style Sheets -->
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_129434341865afb7804fc807_21064019', 'CSS');
?>


    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_197546668465afb7804fd375_96240790', 'title');
?>
</title>
  </head>
  <body>
    <!-- Navigation Sidebar -->
    <?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <!-- Main Content -->
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9688381465afb780624651_24884310', 'content');
?>


    <!-- JavaScripts -->
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_126341941165afb780625d50_00326240', 'JS');
?>

  </body>
</html><?php }
/* {block 'CSS'} */
class Block_129434341865afb7804fc807_21064019 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'CSS' => 
  array (
    0 => 'Block_129434341865afb7804fc807_21064019',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'CSS'} */
/* {block 'title'} */
class Block_197546668465afb7804fd375_96240790 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_197546668465afb7804fd375_96240790',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
CRUD_TASK<?php
}
}
/* {/block 'title'} */
/* {block 'content'} */
class Block_9688381465afb780624651_24884310 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_9688381465afb780624651_24884310',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <div class="jumbotron text-center mt-5">
        <h1 class="display-4">CRUD_MVC</h1>
        <hr class="my-4">
        <a class="btn btn-primary btn-lg" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['plugin_url'][0], array( array('name'=>'categories'),$_smarty_tpl ) );?>
" role="button">SHOW Categories</a>
      </div>
    <?php
}
}
/* {/block 'content'} */
/* {block 'JS'} */
class Block_126341941165afb780625d50_00326240 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'JS' => 
  array (
    0 => 'Block_126341941165afb780625d50_00326240',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'JS'} */
}
