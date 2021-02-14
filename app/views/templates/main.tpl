<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
    <meta charset="utf-8"/>
    <title>Magazyn</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.5/build/pure-min.css"
          integrity="sha384-LTIDeidl25h2dPxrB2Ekgc9c7sEC3CWGM6HeFmuDNUjX76Ert4Z4IY714dhZHPLd" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{$conf->app_url}/css/style.css">
</head>

<body style="margin: 0px;">

<div class="pure-menu pure-menu-horizontal bottom-margin">
    {if count($conf->roles)>0}
        <a href="{$conf->action_root}logout" class="pure-menu-heading pure-menu-link">Wyloguj</a>
    {else}
        <a href="{$conf->action_root}login" class="pure-menu-heading pure-menu-link">Zaloguj</a>
    {/if}

    <a href="{$conf->action_root}productList" class="pure-menu-heading pure-menu-link">Lista produktów</a>
    <a href="{$conf->action_root}producerList" class="pure-menu-heading pure-menu-link">Lista producentów</a>
</div>

{block name=top} {/block}

{block name=messages}

    {if $msgs->isMessage()}
        <div class="messages bottom-margin">
            <ul>
                {foreach $msgs->getMessages() as $msg}
                    {strip}
                        <li class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}">{$msg->text}</li>
                    {/strip}
                {/foreach}
            </ul>
        </div>
    {/if}

{/block}

{block name=bottom} {/block}

</body>

</html>