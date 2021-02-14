{extends file="main.tpl"}

{block name=top}

<div class="margin">
<form action="{$conf->action_root}productSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Produkt</legend>
		<div class="pure-control-group">
            <label for="code">Kod produktu</label>
            <input id="code" type="text" placeholder="Kod prouktu" name="code" maxlength="6" value="{$form->code}">
        </div>
		<div class="pure-control-group">
            <label for="name">Nazwa</label>
            <input id="name" type="text" placeholder="Nazwa" name="name" maxlength="30" value="{$form->name}">
        </div>
		<div class="pure-control-group">
            <label for="type">Typ</label>
            <input id="type" type="text" placeholder="Typ" name="type" maxlength="20"  value="{$form->type}">
        </div>
        <div class="pure-control-group">
            <label for="format">Format</label>
            <input id="format" type="text" placeholder="Format" name="format" maxlength="10" value="{$form->format}">
        </div>
        <div class="pure-control-group">
            <label for="amount">Ilość m2 w paczce </label>
            <input id="amount" type="text" placeholder="Ilość m2 w paczce" name="amount" value="{$form->amount}">
        </div>
        <div class="pure-control-group">
            <label for="price">Cena</label>
            <input id="price" type="text" placeholder="Cena" name="price" value="{$form->price}">
        </div>
        <div class="pure-control-group">
            <label for="producer">Producent </label>
            <select id="id_producer" name ="id_producer">
                {foreach $producer as $p}
                    {strip}
                        {if ($form->id_producer) == ($p["id"]) }
                        <option  selected value="{$p["id"]}">{$p["producer_name"]}</option>
                        {else}
                        <option value="{$p["id"]}">{$p["producer_name"]}</option>
                        {/if}
                    {/strip}
                {/foreach}
            </select>
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button button-secondary" value="Zapisz"/>
			<a class="pure-button pure-button-primary" href="{$conf->action_root}productList">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id" value="{$form->id}">
</form>	
</div>

{/block}
