<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 06.06.18
 * Time: 12:24
 */

class Cover {
    protected $id;
    protected $filename;

    /**
     * Cover constructor.
     * @param $id
     */
    public function __construct($id) {
        $this->setId($id);

        $coverData = DBConnect::getCoverAttributes($this->getId());

        $this->setFilename($coverData['filename']);
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFilename() {
        return $this->filename;
    }

    /**
     * @param mixed $filename
     */
    public function setFilename($filename) {
        $this->filename = $filename;
    }


}