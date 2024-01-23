<?php
/* Smarty version 4.3.4, created on 2024-01-23 14:17:27
  from 'C:\xampp\htdocs\MVC_CRUD\APP\Views\templates\category\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65afbc67e20ce4_93351956',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1deffc2ab4bf5456ce44f2743e284965a6b55108' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MVC_CRUD\\APP\\Views\\templates\\category\\index.tpl',
      1 => 1706015842,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65afbc67e20ce4_93351956 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_127236427165afbc67e1c018_84627062', 'content');
?>


<!-- JavaScripts -->
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_75012703065afbc67e207f0_87531975', 'JS');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'home.tpl');
}
/* {block 'content'} */
class Block_127236427165afbc67e1c018_84627062 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_127236427165afbc67e1c018_84627062',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
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
            <table id="myTable" class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Parent</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                            </table>
        </div>
    </div>
</div>

<?php
}
}
/* {/block 'content'} */
/* {block 'JS'} */
class Block_75012703065afbc67e207f0_87531975 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'JS' => 
  array (
    0 => 'Block_75012703065afbc67e207f0_87531975',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        $(document).ready( function () {
            console.log('hi');
            $('#myTable').DataTable();
        });
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'JS'} */
}
