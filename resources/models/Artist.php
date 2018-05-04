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