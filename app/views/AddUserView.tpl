{extends file="main.tpl"}

{block name=top}
    <form action="{$conf->action_root}userAdd" method="post" class="pure-form pure-form-aligned bottom-margin">
        <legend>Tworzenie konta</legend>
        <fieldset>
            <div class="pure-control-group">
                <label for="id_login">Login: </label>
                <input id="id_login" type="text" name="login" value="{$form->login}"/>
            </div>
            <div class="pure-control-group">
                <label for="id_pass">Hasło: </label>
                <input id="id_pass" type="password" name="pass" /><br />
            </div>
            <div class="pure-control-group">
                <label for="id_repeatedpass">Powtórz hasło: </label>
                <input id="id_repeatedpass" type="password" name="repeatedpass"/><br />
            </div>
            <div class="pure-controls">
                <input type="submit" value="Utwórz konto" class="pure-button pure-button-primary"/>
            </div>
        </fieldset>
    </form>
{/block}
