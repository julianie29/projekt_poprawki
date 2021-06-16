<?php
/* Smarty version 3.1.30, created on 2021-06-11 19:28:45
  from "C:\xampp\htdocs\sklep\app\views\ProducerListFullPage.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_60c39d4dbf6e76_05576202',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b7b11e3faa645df053421bf04b1ff5b07d74705c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep\\app\\views\\ProducerListFullPage.tpl',
      1 => 1623425859,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
    'file:ProducerListTable.tpl' => 1,
  ),
),false)) {
function content_60c39d4dbf6e76_05576202 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_80431006560c39d4dbf2010_86837472', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_74732029360c39d4dbf6292_28656920', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_80431006560c39d4dbf2010_86837472 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="left-margin">
        <form id="search-form" class="pure-form" onsubmit="ajaxPostForm('search-form','<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
producerListPart','tab_producer'); return false;">
            <legend>Opcje wyszukiwania</legend>
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
class Block_74732029360c39d4dbf6292_28656920 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="right-margin" align="right">
<a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
producerAdd">+ Dodaj producenta</a>
</div>

<div id="tab_producer">
	<?php $_smarty_tpl->_subTemplateRender("file:ProducerListTable.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>

<?php
}
}
/* {/block 'bottom'} */
}
