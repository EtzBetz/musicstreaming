<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 30.04.18
 * Time: 13:01
 */

class Song {
    protected $id;
    protected $name;
    protected $filename;
    protected $visits;
    protected $created;
    protected $userId;
    protected $artistId;
    protected $genreId;
    protected $songtextId;
    protected $coverId;
    protected $albumId;

    /**
     * Song constructor.
     * @param $id
     */
    public function __construct($id) {
        $this->id = $id;

        $data = DBConnect::getSongAttributes($id);

        $this->name = $data["name"];
        $this->filename = $data["filename"];
        $this->visits = $data["visits"];
        $this->created = $data["created"];
        $this->userId = $data["userId"];
        $this->artistId = $data["artistId"];
        $this->genreId = $data["genreId"];
        $this->songtextId = $data["songtextId"];
        $this->coverId = $data["coverId"];
        $this->albumId = $data["albumId"];
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

    /**
     * @return mixed
     */
    public function getVisits() {
        return $this->visits;
    }

    /**
     * @param mixed $visits
     */
    public function setVisits($visits) {
        $this->visits = $visits;
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
    public function getUserId() {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId) {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getArtistId() {
        return $this->artistId;
    }

    /**
     * @param mixed $artistId
     */
    public function setArtistId($artistId) {
        $this->artistId = $artistId;
    }

    /**
     * @return mixed
     */
    public function getGenreId() {
        return $this->genreId;
    }

    /**
     * @param mixed $genreId
     */
    public function setGenreId($genreId) {
        $this->genreId = $genreId;
    }

    /**
     * @return mixed
     */
    public function getSongtextId() {
        return $this->songtextId;
    }

    /**
     * @param mixed $songtextId
     */
    public function setSongtextId($songtextId) {
        $this->songtextId = $songtextId;
    }

    /**
     * @return mixed
     */
    public function getCoverId() {
        return $this->coverId;
    }

    /**
     * @param mixed $coverId
     */
    public function setCoverId($coverId) {
        $this->coverId = $coverId;
    }

    /**
     * @return mixed
     */
    public function getAlbumId() {
        return $this->albumId;
    }

    /**
     * @param mixed $albumId
     */
    public function setAlbumId($albumId) {
        $this->albumId = $albumId;
    }




}