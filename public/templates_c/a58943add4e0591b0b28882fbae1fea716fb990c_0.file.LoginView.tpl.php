<?php
/* Smarty version 3.1.30, created on 2021-06-16 13:00:51
  from "C:\xampp\htdocs\sklep\app\views\LoginView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_60c9d9e3026489_48105667',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a58943add4e0591b0b28882fbae1fea716fb990c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep\\app\\views\\LoginView.tpl',
      1 => 1623841139,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_60c9d9e3026489_48105667 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_53846545860c9d9e3025b22_70249417', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_53846545860c9d9e3025b22_70249417 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Logowanie do systemu</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="id_login">Login: </label>
			<input id="id_login" type="text" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
"/>
		</div>
        <div class="pure-control-group">
			<label for="id_pass">Hasło: </label>
			<input id="id_pass" type="password" name="pass" /><br />
		</div>
		<div class="pure-controls">
			<input type="submit" value="Zaloguj" class="pure-button pure-button-primary"/>
			<a class="pure-button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
newUser">Nowy użytkownik</a>
		</div>
	</fieldset>
</form>	
<?php
}
}
/* {/block 'top'} */
}
