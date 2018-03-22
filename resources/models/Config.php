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
            "register" => "?p=register",
            "registering" => "?p=registering",
            "login" => "?p=login",
            "logging_in" => "?p=logging_in",
            "logout" => "?p=logout",
            "user" => "?p=user",
            "githubProject" => "https://github.com/derRAV3N/musicstreaming",
        ),
        "strings" => array(
            "mainTitle" => "Musik Streaming",
            "titleSeparator" => " | ",
            "madeWithLove1" => "Made with ",
            "madeWithLove2" => " by Qwatch GmbH",
            "github" => "Dieses Projekt auf GitHub anzeigen",
            "loggedIn" => "Eingeloggt als",
            "logout" => "Ausloggen",
            "register" => "Registrieren",
            "login" => "Einloggen",
            "alreadyLoggedIn" => "Du bist schon eingeloggt!",
            "alreadyRegistered" => "Du bist schon registriert!",
            "canLogoutHere" => "Hier kannst du dich ausloggen",
            "enterValidEmail" => "Gebe eine gültige Mail-Adresse ein",
            "enterValidAccountname" => "Gebe einen gültigen Accountnamen ein",
            "passwordHint" => "Mindestens 6 Zeichen benötigt",
            "passwordNotMatching" => "Passwörter sind nicht gleich",
            "titles" => array(
                "index" => "Wie ein Lauch!",
                "login" => "Einloggen",
                "register" => "Registrieren",
                "registering" => "Am Registrieren...",
            ),
        ),
    );
}
