<?php
/* Smarty version 3.1.30, created on 2021-06-16 13:00:57
  from "C:\xampp\htdocs\sklep\app\views\AddUserView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_60c9d9e955ac43_76680000',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '021c300093e90cc29f589accbbd0b1046e672305' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep\\app\\views\\AddUserView.tpl',
      1 => 1623841223,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_60c9d9e955ac43_76680000 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9220645960c9d9e955a052_41604695', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_9220645960c9d9e955a052_41604695 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userAdd" method="post" class="pure-form pure-form-aligned bottom-margin">
        <legend>Tworzenie konta</legend>
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
            <div class="pure-control-group">
                <label for="id_repeatedpass">Powtórz hasło: </label>
                <input id="id_repeatedpass" type="password" name="repeatedpass"/><br />
            </div>
            <div class="pure-controls">
                <input type="submit" value="Utwórz konto" class="pure-button pure-button-primary"/>
            </div>
        </fieldset>
    </form>
<?php
}
}
/* {/block 'top'} */
}
