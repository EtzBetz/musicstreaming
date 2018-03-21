<!DOCTYPE html>
<html lang='en'>
<head>
    <title>{$configArr.strings.mainTitle}{$configArr.strings.titleSeparator}{$configArr.strings.titles.{$page}}</title>
    <link rel='stylesheet' href='./css/main.css'>
    <link rel='stylesheet' href='./css/info.css'>
    <link rel='stylesheet' href='./css/links.css'>
    <link rel='stylesheet' href='./css/header_footer.css'>
    <link rel='stylesheet' href='./css/extras.css'>
    <link rel='stylesheet' href='./css/cards.css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400|Roboto:400,600' rel='stylesheet'>
</head>
<body>
    <header id="headerContainer">
        <div class="main" id="header">
            <div>
                <a class="header light" href="{$configArr.urls.base}">{$configArr.strings.mainTitle}</a>
            </div>
            <div>
                <a class="header light" href="?p=overview">Overview</a>
                <a class="header light" href="?p=manage">Manage</a>
                <a class="header light" href="?p=statistics">Statistics</a>
            </div>
            <div>
                {if isset($username, $userId)}
                    <a class="header light" href="{$configArr.urls.userDetails}{$userId}">{$configArr.strings.loggedInAs}{$username}</a>
                    <a class="header light" href="{$configArr.urls.logout}">{$configArr.strings.logout}</a>
                {else}
                    <a class="header light" href="{$configArr.urls.register}">{$configArr.strings.register}</a>
                    <a class="header light" href="{$configArr.urls.login}">{$configArr.strings.login}</a>
                {/if}
            </div>
        </div>
        <div class="infos">
            {include file="info.tpl"}
        </div>
    </header>

    <div id="headerSpacer"></div>
    <div class="container">
    <div class="content">