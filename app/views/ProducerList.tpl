{extends file="main.tpl"}

{block name=bottom}

<div class="right-margin" align="right">
<a class="pure-button button-success" href="{$conf->action_root}producerAdd">+ Dodaj producenta</a>
</div>
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

{foreach $producer as $p}
{strip}
	<tr>
		<td align="center">{$p["producer_name"]}</td>
		<td align="center">{$p["country"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}producerEdit/{$p['id']}">Edytuj</a>
			<a class="button-small pure-button button-warning" href="{$conf->action_url}producerDelete/{$p['id']}">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
