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
            "host" => "localhost"
        ),
        "dbTest" => array(
            "db" => "musicstreaming",
            "username" => "ibims",
            "password" => "88c0ed80a9ee66477094",
            "host" => "localhost"
        ),
        "urls" => array(
            "base" => "http://localhost/musicstreaming/public_html",
            "register" => "?p=register",
            "registering" => "?p=registering",
            "login" => "?p=login",
            "logging_in" => "?p=logging_in",
            "logout" => "?p=logout",
            "user" => "?p=user"
        ),
        "strings" => array(
            "mainTitle" => "Music Streaming",
            "titleSeparator" => " | ",
            "groupName" => "Unknown",
            "titles" => array(
                "index" => "Like a Lauch!",
                "login" => "Sign In",
                "register" => "Register",
                "registering" => "Registering..."
            ),
        ),
    );
}
