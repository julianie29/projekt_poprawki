<?php
/* Smarty version 3.1.30, created on 2021-06-11 19:24:41
  from "C:\xampp\htdocs\sklep\app\views\ProductListFullPage.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_60c39c59c04a62_42444810',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7568f537a0c79476da2cee363622bab2e3f4c54b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep\\app\\views\\ProductListFullPage.tpl',
      1 => 1623432277,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
    'file:ProductListTable.tpl' => 1,
  ),
),false)) {
function content_60c39c59c04a62_42444810 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_78832357860c39c59c023a4_45650658', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_189094106060c39c59c043b6_61034711', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_78832357860c39c59c023a4_45650658 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="left-margin">
<form id="search-form" class="pure-form" onsubmit="ajaxPostForm('search-form','<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
productListPart','tab_products'); return false;">
	<legend>Opcje wyszukiwania</legend>
	<fieldset >
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
class Block_189094106060c39c59c043b6_61034711 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="right-margin" align="right">
<a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
productAdd">+ Dodaj produkt</a>
</div>

<div id="tab_products">
	<?php $_smarty_tpl->_subTemplateRender("file:ProductListTable.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>

<?php
}
}
/* {/block 'bottom'} */
}
