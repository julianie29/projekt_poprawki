{extends file="main.tpl"}

{block name=top}

<div class="left-margin">
<form class="pure-form" action="{$conf->action_url}personList">
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
{foreach $product as $p}
{strip}
	<tr>
		<td align="center">{$p["code"]}</td>
		<td align="center">{$p["name"]}</td>
		<td align="center">{$p["type"]}</td>
		<td align="center">{$p["format"]}</td>
		<td align="center">{$p["amount"]}</td>
		<td align="center">{$p["price"]}</td>
		<td align="center">{$p["producer_name"]}</td>
		<td align="center">{$p["country"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}productEdit/{$p['id']}">Edytuj</a>
			<a class="button-small pure-button button-warning" href="{$conf->action_url}productDelete/{$p['id']}">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
