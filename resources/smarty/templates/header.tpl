<!DOCTYPE html>
<html lang='en'>
<head>
    <title>{$configArr.strings.title}</title>
    <link rel='stylesheet' href='./css/main.css'>
    <link rel='stylesheet' href='./css/info.css'>
    <link rel='stylesheet' href='./css/links.css'>
    <link rel='stylesheet' href='./css/header_footer.css'>
    <link rel='stylesheet' href='./css/extras.css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400|Roboto:400,600' rel='stylesheet'>
</head>
<body>
    <header id="headerContainer">
        <div class="main" id="header">
            <div>
                <a class="header light" href="{$configArr.urls.base}">GW2Raider</a>
            </div>
            <div>
                <a class="header light" href="?p=overview">Overview</a>
                <a class="header light" href="?p=manage">Manage</a>
                <a class="header light" href="?p=statistics">Statistics</a>
            </div>
            <div>
                <a class="header light" href="{$configArr.urls.register}">Register</a>
                <a class="header light" href="{$configArr.urls.login}">Login</a>
            </div>
        </div>
        <div class="infos">
            {include file="info.tpl"}
        </div>
    </header>

    <div id="headerSpacer"></div>
    <div class="container">
    <div class="content">