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
                <img id="logo" src="./images/LauchLogo.jpg">
                <a class="header light" href="{$configArr.urls.base}">{$configArr.strings.mainTitle}</a>
            </div>
            <div>
                <div>
                    <button class="header light dropbutton">{$configArr.strings.addContent}</button>
                    <div class="dropdown">
                        <a class="dark" href="#">{$configArr.strings.uploadMusic}</a>
                        <a class="dark" href="#">{$configArr.strings.createAlbum}</a>
                        <a class="dark" href="#">{$configArr.strings.createPlaylist}</a>
                    </div>
                </div>
                <div>
                    <button class="header light dropbutton">{$configArr.strings.favorites}</button>
                    <div class="dropdown">
                        <a class="dark" href="#">{$configArr.strings.musictitles}</a>
                        <a class="dark" href="#">{$configArr.strings.albums}</a>
                        <a class="dark" href="#">{$configArr.strings.playlists}</a>
                    </div>
                </div>
            </div>
            <div>
                {if isset($username, $userId)}
                    <a class="header light" href="{$configArr.urls.user}&id={$userId}">
                        <div class="svg-icon svg-baseline icon-account">
                            <svg viewBox="0 0 24 24">
                                <path d=""/>
                            </svg>
                        </div>
                        {$username}
                    </a>
                    <a class="header light" href="{$configArr.urls.logout}">
                        <div class="svg-icon svg-baseline icon-logout">
                            <svg viewBox="0 0 24 24">
                                <path d=""/>
                            </svg>
                        </div>
                        {$configArr.strings.logout}
                    </a>
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

    <div id="headerSpacer">&nbsp;</div>
    <div class="container">
    <div class="content">