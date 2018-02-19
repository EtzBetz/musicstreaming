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
    "urls" => array(
        "base" => "http://localhost/gw2raider/public_html",
        "register" => "?p=register",
        "login" => "?p=login"
    ),
    "strings" => array(
        "mainTitle" => "GW2Raider",
        "titleSeparator" => " | ",
        "groupName" => "Unknown",
        "titles" => array(
            "index" => "Not a Radar!",
            "login" => "Sign In",
            "register" => "Register"
        )
    )
);

/* Error reporting */

ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRCT);