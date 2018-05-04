<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 11.01.18
 * Time: 16:10
 */

require_once(__DIR__ . "/../resources/models/Config.php");
require_once(__DIR__ . "/../resources/models/Info.php");
require_once(__DIR__ . "/../resources/models/InfoList.php");
require_once(__DIR__ . "/../resources/models/DBConnect.php");
require_once(__DIR__ . "/../resources/models/User.php");
require_once(__DIR__ . "/../resources/libs/smarty/Smarty.class.php");
$smarty = new Smarty();

$smarty->setTemplateDir(__DIR__ . "/../resources/smarty/templates");
$smarty->setCompileDir(__DIR__ . "/../resources/smarty/templates_c");
$smarty->setCacheDir(__DIR__ . "/../resources/smarty/cache");
$smarty->setConfigDir(__DIR__ . "/../resources/smarty/configs");

session_start();

if (isset($_SESSION["username"], $_SESSION["userId"])) {
    $smarty->assign("username", $_SESSION["username"]);
    $smarty->assign("userId", $_SESSION["userId"]);
}
$smarty->assign("configArr", Config::configArr);
checkCookieAgreement();

if (isset($_GET["p"])) {
    $smarty->assign("page", $_GET["p"]);
    assignInfos($smarty);
    switch ($_GET['p']) {
        case "login":
            $smarty->display('login.tpl');
            break;
        case "logging_in":
            require_once(__DIR__ . "/../resources/helpers/login.php");
            assignInfos($smarty);
            $smarty->display('login.tpl');
            break;
        case "register":
            $smarty->display('register.tpl');
            break;
        case "registering":
            require_once(__DIR__ . "/../resources/helpers/register.php");
            assignInfos($smarty);
            $smarty->display('register.tpl');
            break;
        case "logout":
            require_once(__DIR__ . "/../resources/helpers/logout.php");
            break;
        case "song":
            require_once(__DIR__ . "/../resources/models/Song.php");
            require_once(__DIR__ . "/../resources/models/Artist.php");
            if (isset($_GET["id"])) {
                $song = new Song($_GET["id"]);
                $artist = new Artist($song->getArtistId());
                $smarty->assign("song", $song);
                $smarty->assign("artist", $artist);
            }
            $smarty->display('song.tpl');
            break;
        case "artist":
            require_once(__DIR__ . "/../resources/models/Artist.php");
            if (isset($_GET["id"])) {
                $artist = new Artist($_GET["id"]);
                $smarty->assign("artist", $artist);
            }
            $smarty->display('artist.tpl');
            break;
        case "user":
            require_once(__DIR__ . "/../resources/models/User.php");
            if (isset($_GET["id"])) {
                $user = new User($_GET["id"]);
                $smarty->assign("user", $user);
            }
            $smarty->display('user.tpl');
            break;
        default:
            $smarty->display('404.tpl');
    }
} else {
    $smarty->assign("page", "index");
    assignInfos($smarty);
    $smarty->display('index.tpl');
}


function checkCookieAgreement() {
    if(!isset($_COOKIE["cookiesAccepted"]) || (isset($_COOKIE["cookiesAccepted"]) && $_COOKIE["cookiesAccepted"] != 1)) {
        InfoList::addInfo(new Info("This website uses cookies to ensure that you get the best experience.", "I don't care", "","green"));
    }
}

function assignInfos($smarty) {
    $smarty->assign("infos", InfoList::getInfosArray());
}