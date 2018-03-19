<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 19.02.18
 * Time: 14:36
 */

class InfoList {
    protected static $infoList = array();

    public static function addInfo($info) {
        InfoList::$infoList[] = $info;
    }

    public static function getInfosArray() {
        $infoList = array();
        foreach (InfoList::$infoList as $info) {
            $infoList[] = array("mainText" => $info->getMainText(), "btnText" => $info->getBtnText(), "btnLink" => $info->getBtnLink(), "color" => $info->getColor());
        }
        return $infoList;
    }
}