<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 04.05.18
 * Time: 16:21
 */

class Artist {
    protected $id;
    protected $name;

    /**
     * Artist constructor.
     * @param $id
     */
    public function __construct($id) {
        $this->id = $id;

        $data = DBConnect::getArtistAttributes($id);

        $this->name = $data["name"];
    }

    public static function createNewArtist($name) {
        $albumId = DBConnect::insertArtist($name);
        header("Location: " . Config::configArr['urls']['base'] . Config::configArr['urls']['artist'] . "&" . Config::configArr['urls']['id'] . $albumId);
        die();
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name) {
        $this->name = $name;
    }


}