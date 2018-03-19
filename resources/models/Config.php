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
            "db" => "gw2raider",
            "username" => "root",
            "password" => "root",
            "host" => "localhost"
        ),
        "dbTest" => array(
            "db" => "gw2raider",
            "username" => "ibims",
            "password" => "88c0ed80a9ee66477094",
            "host" => "localhost"
        ),
        "urls" => array(
            "base" => "http://localhost/gw2raider/public_html",
            "register" => "?p=register",
            "registering" => "?p=registering",
            "login" => "?p=login",
            "logging_in" => "?p=logging_in",
            "logout" => "?p=logout",
            "user" => "?p=user"
        ),
        "strings" => array(
            "mainTitle" => "GW2Raider",
            "titleSeparator" => " | ",
            "groupName" => "Unknown",
            "titles" => array(
                "index" => "Not a Radar!",
                "login" => "Sign In",
                "register" => "Register",
                "registering" => "Registering..."
            ),
        ),
    );
}
