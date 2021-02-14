{extends file="main.tpl"}

{block name=top}

<div class="margin">
<form action="{$conf->action_root}producerSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Producent</legend>
		<div class="pure-control-group">
            <label for="producer_name">Nazwa producenta</label>
            <input id="producer_name" type="text" placeholder="Nazwa producenta" name="producer_name"
                   maxlength="50" value="{$form->producer_name}">
        </div>
		<div class="pure-control-group">
            <label for="country">Kraj</label>
            <input id="country" type="text" placeholder="Kraj" name="country" maxlength="30" value="{$form->country}">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button button-secondary" value="Zapisz"/>
			<a class="pure-button pure-button-primary" href="{$conf->action_root}producerList">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id" value="{$form->id}">
</form>	
</div>

{/block}
