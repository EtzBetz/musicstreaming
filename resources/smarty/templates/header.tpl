<!DOCTYPE html>
<html lang='en'>
<head>
    <title>{$configArr.strings.mainTitle}{$configArr.strings.titleSeparator}{$configArr.strings.titles.{$page}}</title>{* TODO: add variable titles for f.e. songnames*}
    <link rel='stylesheet' href='./css/main.css'>
    <link rel='stylesheet' href='./css/info.css'>
    <link rel='stylesheet' href='./css/links.css'>
    <link rel='stylesheet' href='./css/header_footer.css'>
    <link rel='stylesheet' href='./css/extras.css'>
    <link rel='stylesheet' href='./css/cards.css'>
    <link rel='stylesheet' href='./css/song.css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,600|Roboto:300,400,600' rel='stylesheet'>
</head>
<body>
    <header id="headerContainer">
        <div class="header__navigation" id="header">
            <div>
                {*<img class="header__logo" src="./content_files/images/website/LauchLogo.jpg">*}
                <a class="header__button button--color-light button--bgcolor-light button--weight-normal svg-icon svg-baseline icon--music_circle--light" href="{$configArr.urls.base}">{$configArr.strings.mainTitle}</a>
            </div>
            <div>
                <div>
                    <button class="header__dropbutton button--color-light button--bgcolor-light button--weight-normal svg-icon svg-baseline icon--plus_circle--light">{$configArr.strings.addContent}</button>
                    <div class="header__dropdown">
                        <a class="button--color-dark button--weight-normal" href="{$configArr.urls.add_song}">{$configArr.strings.uploadMusic}</a>
                        <a class="button--color-dark button--weight-normal" href="{$configArr.urls.add_album}">{$configArr.strings.createAlbum}</a>
                        <a class="button--color-dark button--weight-normal" href="{$configArr.urls.add_playlist}">{$configArr.strings.createPlaylist}</a>
                        <a class="button--color-dark button--weight-normal" href="{$configArr.urls.add_artist}">{$configArr.strings.createArtist}</a>
                    </div>
                </div>
                <div>
                    <button class="header__dropbutton button--color-light button--bgcolor-light button--weight-normal svg-icon svg-baseline icon--star_circle--light">{$configArr.strings.favorites}</button>
                    <div class="header__dropdown">
                        <a class="button--color-dark button--weight-normal" href="#">{$configArr.strings.musictitles}</a>
                        <a class="button--color-dark button--weight-normal" href="#">{$configArr.strings.albums}</a>
                        <a class="button--color-dark button--weight-normal" href="#">{$configArr.strings.playlists}</a>
                    </div>
                </div>
                <div>
                    <button class="header__dropbutton button--color-light button--bgcolor-light button--weight-normal svg-icon svg-baseline icon--cloud_circle--light">{$configArr.strings.api}</button>
                    <div class="header__dropdown">
                        <a class="button--color-dark button--weight-normal" href="#">{$configArr.strings.overview}</a>
                        <a class="button--color-dark button--weight-normal" href="#">{$configArr.strings.albums}</a>
                        <a class="button--color-dark button--weight-normal" href="#">{$configArr.strings.artists}</a>
                        <a class="button--color-dark button--weight-normal" href="#">{$configArr.strings.genres}</a>
                        <a class="button--color-dark button--weight-normal" href="#">{$configArr.strings.playlists}</a>
                        <a class="button--color-dark button--weight-normal" href="#">{$configArr.strings.songs}</a>
                    </div>
                </div>
                <div>
                    <button class="header__dropbutton button--color-light button--bgcolor-light button--weight-normal">sample stuff</button>
                    <div class="header__dropdown">
                        <a class="button--color-dark button--weight-normal" href="?p=user&id=1">sample user</a>
                        <a class="button--color-dark button--weight-normal" href="?p=artist&id=1">sample artist 1</a>
                        <a class="button--color-dark button--weight-normal" href="?p=artist&id=2">sample artist 2</a>
                        <a class="button--color-dark button--weight-normal" href="?p=artist&id=3">sample artist 3</a>
                        <a class="button--color-dark button--weight-normal" href="?p=artist&id=4">sample artist 4</a>
                        <a class="button--color-dark button--weight-normal" href="?p=song&id=1">sample song w/ album</a>
                        <a class="button--color-dark button--weight-normal" href="?p=song&id=28">sample song w/o album</a>
                        <a class="button--color-dark button--weight-normal" href="?p=album&id=1">sample album</a>
                        <a class="button--color-dark button--weight-normal" href="?p=playlist&id=1">sample playlist</a>
                    </div>
                </div>
            </div>
            <div>
                {if isset($username, $userId)}
                    <a class="header__button button--color-light button--bgcolor-light button--weight-normal svg-icon svg-baseline icon--account--light" href="{$configArr.urls.user}&id={$userId}">{$username}</a>
                    <a class="header__button button--color-light button--bgcolor-light button--weight-normal svg-icon svg-baseline icon--logout--light" href="{$configArr.urls.logout}">{$configArr.strings.logout}</a>
                {else}
                    <a class="header__button button--color-light button--bgcolor-light button--weight-normal svg-icon svg-baseline icon--account_plus--light" href="{$configArr.urls.register}">{$configArr.strings.register}</a>
                    <a class="header__button button--color-light button--bgcolor-light button--weight-normal svg-icon svg-baseline icon--login--light" href="{$configArr.urls.login}">{$configArr.strings.login}</a>
                {/if}
            </div>
        </div>
        <div class="info">
            {include file="info.tpl"}
        </div>
    </header>

    <div id="header__spacer">&nbsp;</div>
    <div class="container">
    <div class="content">