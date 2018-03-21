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
            "mainTitle" => "Music Streaming",
            "titleSeparator" => " | ",
            "madeWithLove1" => "Made with ",
            "madeWithLove2" => " by Qwatch GmbH",
            "github" => "View this project on GitHub",
            "loggedIn" => "Logged in as ",
            "logout" => "Logout",
            "register" => "Register",
            "login" => "Login",
            "alreadyLoggedIn" => "You are already logged in!",
            "alreadyRegistered" => "You are already registered!",
            "canLogoutHere" => "You can logout here",
            "enterValidEmail" => "Enter a valid E-Mail address",
            "enterValidAccountname" => "Enter a valid account name",
            "passwordHint" => "Minimum 6 characters needed",
            "passwordNotMatching" => "Passwords are not matching",
            "titles" => array(
                "index" => "Like a Lauch!",
                "login" => "Sign In",
                "register" => "Register",
                "registering" => "Registering...",
            ),
        ),
    );
}
