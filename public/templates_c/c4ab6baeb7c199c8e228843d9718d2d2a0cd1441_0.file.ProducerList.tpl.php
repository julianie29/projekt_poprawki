<?php
/* Smarty version 3.1.30, created on 2021-06-10 22:01:15
  from "C:\xampp\htdocs\sklep\app\views\ProducerListFullPage.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_60c26f8b623bc3_95053127',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4ab6baeb7c199c8e228843d9718d2d2a0cd1441' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep\\app\\views\\ProducerListFullPage.tpl',
      1 => 1623217625,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_60c26f8b623bc3_95053127 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10093358260c26f8b621be4_06724187', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'bottom'} */
class Block_10093358260c26f8b621be4_06724187 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="right-margin" align="right">
<a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
producerAdd">+ Dodaj producenta</a>
</div>
	<table align="center"
	 id="tab_producer" class="pure-table pure-table-horizontal">
	<thead>
		<tr>
			<th align="center">Nazwa</th>
			<th align="center">Kraj</th>
			<th align="center">Akcja</th>
		</tr>
	</thead>
<tbody>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['producer']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
<tr><td align="center"><?php echo $_smarty_tpl->tpl_vars['p']->value["producer_name"];?>
</td><td align="center"><?php echo $_smarty_tpl->tpl_vars['p']->value["country"];?>
</td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
producerEdit/<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
">Edytuj</a><a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
producerDelete/<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
">Usuń</a></td></tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</tbody>
</table>

<?php
}
}
/* {/block 'bottom'} */
}
