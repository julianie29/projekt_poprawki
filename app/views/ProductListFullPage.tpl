{extends file="main.tpl"}

{block name=top}

<div class="left-margin">
<form id="search-form" class="pure-form" onsubmit="ajaxPostForm('search-form','{$conf->action_root}productListPart','tab_products'); return false;">
	<legend>Opcje wyszukiwania</legend>
	<fieldset >
		<input id ="filter" name="filter" type="text" placeholder="Treść filtra" value="{$searchForm->filter}" />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>
{/block}

{block name=bottom}

<div class="right-margin" align="right">
<a class="pure-button button-success" href="{$conf->action_root}productAdd">+ Dodaj produkt</a>
</div>

<div id="tab_products">
	{include file="ProductListTable.tpl"}
</div>

{/block}
