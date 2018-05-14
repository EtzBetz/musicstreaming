<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 19.02.18
 * Time: 14:26
 */

class Info {
    protected $mainText;
    protected $btnText;
    protected $btnLink;
    protected $color; /* TODO: add getter for css class, f.e. "info__card--$color" or something*/

    /**
     * Info constructor.
     * @param $mainText
     * @param $btnText
     * @param $btnLink
     * @param $color
     */
    public function __construct($mainText, $btnText = "", $btnLink = "", $color = "") {
        $this->mainText = $mainText;
        $this->btnText = $btnText;
        $this->btnLink = $btnLink;
        $this->color = $color;
    }

    /**
     * @return String
     */
    public function getMainText() {
        return $this->mainText;
    }

    /**
     * @param String $mainText
     */
    public function setMainText($mainText) {
        $this->mainText = $mainText;
    }

    /**
     * @return String
     */
    public function getBtnText() {
        return $this->btnText;
    }

    /**
     * @param String $btnText
     */
    public function setBtnText($btnText) {
        $this->btnText = $btnText;
    }

    /**
     * @return string
     */
    public function getBtnLink() {
        return $this->btnLink;
    }

    /**
     * @param string $btnLink
     */
    public function setBtnLink($btnLink) {
        $this->btnLink = $btnLink;
    }

    /**
     * @return String
     */
    public function getColor() {
        return $this->color;
    }

    /**
     * @param String $color ["","green","yellow","orange","red","blue"]
     */
    public function setColor($color) {
        $this->color = $color;
    }




}