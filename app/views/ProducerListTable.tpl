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

<div class="top-margin" style="text-align: center">
    {if $searchForm->page > 1}
        <a class="button-small pure-button button-primary" onclick="ajaxReloadElement('tab_producer','{$conf->action_url}previousProducerPage?page={$searchForm->page}'); return false;"><</a>
    {/if}

    &nbsp;strona&nbsp;
    <form id="givePage" onsubmit="ajaxPostForm('givePage','{$conf->action_url}givenProducerPage','tab_producer'); return false;" class="form-inline" style="width: 5em; display: inline">
        <input id="side" type="number" name="page" value="{$searchForm->page}" class="form-control" style="width: 3em"/>
        <input type="hidden" class="button-small pure-button button-secondary" value="idź"/>
        <input type="hidden" name="max_page" value="{$searchForm->max_page}">
    </form>
    &nbsp;z {$searchForm->max_page}&nbsp;

    {if ($searchForm->size > $searchForm->offset)}
        <a class="button-small pure-button button-primary" onclick="ajaxReloadElement('tab_producer','{$conf->action_url}nextProducerPage?page={$searchForm->page}'); return false;">></a>
    {/if}
</div>