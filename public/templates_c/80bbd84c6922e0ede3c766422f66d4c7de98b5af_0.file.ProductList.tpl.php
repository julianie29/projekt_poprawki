<?php
/* Smarty version 3.1.30, created on 2021-02-13 23:34:27
  from "C:\xampp\htdocs\sklep\app\views\ProductList.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_602853f3f2bbb1_27178634',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '80bbd84c6922e0ede3c766422f66d4c7de98b5af' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep\\app\\views\\ProductList.tpl',
      1 => 1613254245,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_602853f3f2bbb1_27178634 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2049557375602853f3f1c1d4_13142450', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_254136771602853f3f2b503_77430220', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_2049557375602853f3f1c1d4_13142450 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="left-margin">
<form class="pure-form" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
personList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset >
		<select id="type" name ="type">
			<option value="code">Kod produktu</option>
			<option value="name">Nazwa</option>
			<option value="type">Typ</option>
			<option value="format">Format</option>
			<option value="amount">Ilość m2 w paczce</option>
			<option value="price">Cena</option>
			<option value="producer">Producent</option>
			<option value="country">Kraj pochodzenia</option>
		</select>
		<input id ="filter" name="filter" type="text" placeholder="Treść filtra" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->filter;?>
" />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>
<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_254136771602853f3f2b503_77430220 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="right-margin" align="right">
<a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
productAdd">+ Dodaj produkt</a>
</div>
	<table align="center"
	 id="tab_products" class="pure-table pure-table-horizontal">
	<thead>
		<tr>
			<th align="center">Kod produktu</th>
			<th align="center">Nazwa</th>
			<th align="center">Typ</th>
			<th align="center">Format</th>
			<th align="center">Ilość m2 w paczce</th>
			<th align="center">Cena</th>
			<th align="center">Producent</th>
			<th align="center">Kraj pochodzenia</th>
			<th align="center">Akcja</th>
		</tr>
	</thead>

<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
<tr><td align="center"><?php echo $_smarty_tpl->tpl_vars['p']->value["code"];?>
</td><td align="center"><?php echo $_smarty_tpl->tpl_vars['p']->value["name"];?>
</td><td align="center"><?php echo $_smarty_tpl->tpl_vars['p']->value["type"];?>
</td><td align="center"><?php echo $_smarty_tpl->tpl_vars['p']->value["format"];?>
</td><td align="center"><?php echo $_smarty_tpl->tpl_vars['p']->value["amount"];?>
</td><td align="center"><?php echo $_smarty_tpl->tpl_vars['p']->value["price"];?>
</td><td align="center"><?php echo $_smarty_tpl->tpl_vars['p']->value["producer_name"];?>
</td><td align="center"><?php echo $_smarty_tpl->tpl_vars['p']->value["country"];?>
</td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productEdit/<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
">Edytuj</a><a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productDelete/<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
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
