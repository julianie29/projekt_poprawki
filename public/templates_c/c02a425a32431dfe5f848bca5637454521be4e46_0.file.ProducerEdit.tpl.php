<?php
/* Smarty version 3.1.30, created on 2021-02-14 10:17:59
  from "C:\xampp\htdocs\sklep\app\views\ProducerEdit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6028eac705b1a2_44442791',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c02a425a32431dfe5f848bca5637454521be4e46' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep\\app\\views\\ProducerEdit.tpl',
      1 => 1613239041,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_6028eac705b1a2_44442791 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10391258046028eac70592d0_00759499', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_10391258046028eac70592d0_00759499 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="margin">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
producerSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Producent</legend>
		<div class="pure-control-group">
            <label for="producer_name">Nazwa producenta</label>
            <input id="producer_name" type="text" placeholder="Nazwa producenta" name="producer_name"
                   maxlength="50" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->producer_name;?>
">
        </div>
		<div class="pure-control-group">
            <label for="country">Kraj</label>
            <input id="country" type="text" placeholder="Kraj" name="country" maxlength="30" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->country;?>
">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button button-secondary" value="Zapisz"/>
			<a class="pure-button pure-button-primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
producerList">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
</form>	
</div>

<?php
}
}
/* {/block 'top'} */
}
