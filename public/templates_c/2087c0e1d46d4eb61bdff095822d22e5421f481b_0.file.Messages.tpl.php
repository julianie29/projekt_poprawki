<?php
/* Smarty version 3.1.30, created on 2021-06-15 21:34:34
  from "C:\xampp\htdocs\sklep\app\views\Messages.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_60c900cab15d93_17810874',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2087c0e1d46d4eb61bdff095822d22e5421f481b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep\\app\\views\\Messages.tpl',
      1 => 1623785665,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:ProductEdit.tpl' => 1,
  ),
),false)) {
function content_60c900cab15d93_17810874 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<ul id="messages">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
        <li id="msg" class="msg <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>error<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>warning<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>info<?php }?>"><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</ul><?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:ProductEdit.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
}
