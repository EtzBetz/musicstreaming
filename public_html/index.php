<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 11.01.18
 * Time: 16:10
 */

require_once(__DIR__ . "/../resources/config.php");
require_once(__DIR__ . "/../resources/libs/smarty/Smarty.class.php");
$smarty = new Smarty();

$smarty->setTemplateDir(__DIR__ . "/../resources/smarty/templates");
$smarty->setCompileDir(__DIR__ . "/../resources/smarty/templates_c");
$smarty->setCacheDir(__DIR__ . "/../resources/smarty/cache");
$smarty->setConfigDir(__DIR__ . "/../resources/smarty/configs");


$smarty->assign("configArr", $configArr);
checkCookieAgreement($smarty);


if (isset($_GET["p"])) {
    $smarty->assign("page", $_GET["p"]);
    switch ($_GET['p']) {
        case "login":
            $smarty->display('login.tpl');
            break;
        case "register":
            $smarty->display('register.tpl');
            break;
        default:
            $smarty->display('404.tpl');
    }
} else {
    $smarty->assign("page", "index");
    $smarty->display('index.tpl');
}


function checkCookieAgreement($smarty) {
    if(!isset($_COOKIE["cookiesAccepted"]) || (isset($_COOKIE["cookiesAccepted"]) && $_COOKIE["cookiesAccepted"] != 1)) {
        $smarty->assign("infos", array(
            array("mainText" => "This website uses cookies to ensure that you get the best experience.", "btnText" => "I don't care", "color" => "green"),
        ));
    }
}