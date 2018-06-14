<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 06.06.18
 * Time: 11:44
 */

class Album {
    protected $id;
    protected $name;
    protected $created;
    protected $artistId;
    protected $coverId;
    protected $songIds;

    /**
     * Album constructor.
     * @param $id
     */
    public function __construct($id) {
        $this->setId($id);

        $albumData = DBConnect::getAlbumAttributes($this->getId());

        $this->setName($albumData['name']);
        $this->setCreated($albumData['created']);
        $this->setArtistId($albumData['artistId']);
        $this->setCoverId($albumData['coverId']);
        $this->setSongIds(DBConnect::getSongsFromAlbum($this->getId()));
    }

    /**
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId($id) {
        $this->id = $id;
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

    /**
     * @return mixed
     */
    public function getCreated() {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created) {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getArtistId() {
        return $this->artistId;
    }

    /**
     * @param integer $id
     */
    public function setArtistId($id) {
        $this->artistId = $id;
    }

    /**
     * @return mixed
     */
    public function getCoverId() {
        return $this->coverId;
    }

    /**
     * @param integer $id
     */
    public function setCoverId($id) {
        $this->coverId = $id;
    }

    /**
     * @return array
     */
    public function getSongIds() {
        return $this->songIds;
    }

    /**
     * @param array $songIds
     */
    public function setSongIds($songIds) {
        $this->songIds = $songIds;
    }

    /**
     * @param integer $songId
     */
    public function addSongId($songId) {
        $this->songIds[] = $songId;
    }



}