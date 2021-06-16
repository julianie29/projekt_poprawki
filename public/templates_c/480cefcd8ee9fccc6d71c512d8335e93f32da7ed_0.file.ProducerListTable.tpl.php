<?php
/* Smarty version 3.1.30, created on 2021-06-15 21:10:21
  from "C:\xampp\htdocs\sklep\app\views\ProducerListTable.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_60c8fb1da75d13_10108316',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '480cefcd8ee9fccc6d71c512d8335e93f32da7ed' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep\\app\\views\\ProducerListTable.tpl',
      1 => 1623784215,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60c8fb1da75d13_10108316 (Smarty_Internal_Template $_smarty_tpl) {
?>
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

<div class="top-margin" style="text-align: center">
    <?php if ($_smarty_tpl->tpl_vars['searchForm']->value->page > 1) {?>
        <a class="button-small pure-button button-primary" onclick="ajaxReloadElement('tab_producer','<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
previousProducerPage?page=<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->page;?>
'); return false;"><</a>
    <?php }?>

    &nbsp;strona&nbsp;
    <form id="givePage" onsubmit="ajaxPostForm('givePage','<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
givenProducerPage','tab_producer'); return false;" class="form-inline" style="width: 5em; display: inline">
        <input id="side" type="number" name="page" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->page;?>
" class="form-control" style="width: 3em"/>
        <input type="hidden" class="button-small pure-button button-secondary" value="idź"/>
        <input type="hidden" name="max_page" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->max_page;?>
">
    </form>
    &nbsp;z <?php echo $_smarty_tpl->tpl_vars['searchForm']->value->max_page;?>
&nbsp;

    <?php if (($_smarty_tpl->tpl_vars['searchForm']->value->size > $_smarty_tpl->tpl_vars['searchForm']->value->offset)) {?>
        <a class="button-small pure-button button-primary" onclick="ajaxReloadElement('tab_producer','<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
nextProducerPage?page=<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->page;?>
'); return false;">></a>
    <?php }?>
</div><?php }
}
