<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 12.02.18
 * Time: 14:18
 */

$configArr = array(
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
        "logout" => "?p=logout"
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
        )
    )
);




define("CAN_REGISTER", "any");
define("DEFAULT_ROLE", "member");

define("SECURE", FALSE);