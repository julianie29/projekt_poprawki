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

<div class="top-margin" style="text-align: center">
    {if $searchForm->page > 1}
        <a class="button-small pure-button button-primary" onclick="ajaxReloadElement('tab_products','{$conf->action_url}previousProductPage?page={$searchForm->page}'); return false;"><</a>
    {/if}

    &nbsp;strona&nbsp;
    <form id="givePage" onsubmit="ajaxPostForm('givePage','{$conf->action_url}givenProductPage','tab_products'); return false;" class="form-inline" style="width: 5em; display: inline">
        <input id="side" type="number" name="page" value="{$searchForm->page}" class="form-control" style="width: 3em"/>
        <input type="hidden" class="button-small pure-button button-secondary" value="idź"/>
        <input type="hidden" name="max_page" value="{$searchForm->max_page}">
    </form>
    &nbsp;z {$searchForm->max_page}&nbsp;

    {if ($searchForm->size > $searchForm->offset)}
        <a class="button-small pure-button button-primary" onclick="ajaxReloadElement('tab_products','{$conf->action_url}nextProductPage?page={$searchForm->page}'); return false;">></a>
    {/if}
</div>
