<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 16.03.18
 * Time: 14:52
 */

class Config {
    const configArr = array(
        "db" => array(
            "db" => "musicstreaming",
            "username" => "root",
            "password" => "root",
            "host" => "127.0.0.1",
        ),
        "dbTest" => array(
            "db" => "musicstreaming",
            "username" => "ibims",
            "password" => "88c0ed80a9ee66477094",
            "host" => "127.0.0.1",
        ),
        "urls" => array(
            "base" => "http://localhost/musicstreaming/public_html",
            "id" => "id=",
            "register" => "?p=register",
            "registering" => "?p=registering",
            "login" => "?p=login",
            "logging_in" => "?p=logging_in",
            "logout" => "?p=logout",
            "user" => "?p=user",
            "song" => "?p=song",
            "artist" => "?p=artist",
            "githubProject" => "https://github.com/derRAV3N/musicstreaming",
            "coverDirectory" => "./content_files/images/cover/",
            "musicDirectory" => "./content_files/music/",
        ),
        "strings" => array(
            "mainTitle" => "Music Streaming",
            "titleSeparator" => " | ",
            "madeWithLove1" => "Made with ",
            "madeWithLove2" => " by Qwatch GmbH",
            "cookieText" => "Diese Website benutzt Cookies, um dir die bestmögliche Nutzererfahrung zu bieten.",
            "cookieButton" => "Mir doch egal",
            "github" => "Dieses Projekt auf GitHub anzeigen",
            "loggedInAs" => "Eingeloggt als ",
            "logout" => "Ausloggen",
            "register" => "Registrieren",
            "login" => "Einloggen",
            "email" => "E-Mail",
            "username" => "Nutzername",
            "password" => "Passwort",
            "repeatPassword" => "Passwort wiederholen",
            "alreadyLoggedIn" => "Du bist schon eingeloggt!",
            "alreadyRegistered" => "Du bist schon registriert!",
            "canLogoutHere" => "Hier kannst du dich ausloggen",
            "enterValidEmail" => "Gib eine gültige Mail-Adresse ein",
            "enterValidAccountname" => "Gib einen gültigen Accountnamen ein",
            "passwordHint" => "Mindestens 6 Zeichen benötigt",
            "passwordNotMatching" => "Passwörter sind nicht gleich",
            "addContent" => "Inhalte hinzufügen",
            "uploadMusic" => "Musik hochladen",
            "createAlbum" => "Album erstellen",
            "createPlaylist" => "Playlist erstellen",
            "favorites" => "Favoriten",
            "musictitles" => "Musiktitel",
            "albums" => "Alben",
            "playlists" => "Playlists",
            //"" => "",
            "titles" => array(
                "index" => "Wie ein Lauch!",
                "login" => "Einloggen",
                "register" => "Registrieren",
                "registering" => "Am Registrieren...",
                "song" => "Song",
                "artist" => "Künstler",
                "user" => "Nutzer",
            ),
        ),
    );
}
