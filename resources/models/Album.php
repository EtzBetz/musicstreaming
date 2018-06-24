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
    protected $songVisits;

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
        $songVisits = 0;
        $songIds = $this->getSongIds();
        if (isset($songIds)) {
            foreach ($songIds as $songId) {
                $songVisits += DBConnect::getNumberOfVisits($songId);
            }
        }
        $this->setSongVisits($songVisits);
    }


    public static function createNewAlbum($albumTitle, $albumArtist) {

        $curTimestamp = new DateTime();
        $curTimestamp = $curTimestamp->format("Y-m-d_H-i-s");

        $uploadDirCover = ($_SERVER['DOCUMENT_ROOT'] . Config::configArr["urls"]["coverDirectoryInternal"]);
        $uploadFilepathCover = $uploadDirCover . $curTimestamp . basename($_FILES["albumcover"]["name"]);

        $uploadFile = true;

        $renameTries = 0;
        while (file_exists($uploadFilepathCover)){
            if ($renameTries > 100) {
                $uploadFile = false;
                InfoList::addInfo(new Info("There is already a cover file with the same name. Try renaming and uploading it again.", "I'll try", "", "red"));
                break;
            }
            $dateTime = new DateTime();
            $dateTime = $dateTime->format("Y-m-d_H-i-s");
            $renameTries++;
        }

        if (!Album::isFileAnImage()) {
            $uploadFile = false;
            InfoList::addInfo(new Info("Your uploaded Cover file wasn't recognized as image.", "Try another format", "", "red"));
        }

        if ($_FILES["albumcover"]["size"] > 52428800){ // TODO: Herr Menne, hier müssen Sie die Dateigröße ändern
            $uploadFile = false;
            InfoList::addInfo(new Info("Your uploaded Cover file exceeded the maximum file size.", "Okay", "", "red"));
        }

        $coverFileExtension = strtolower(pathinfo($uploadFilepathCover, PATHINFO_EXTENSION));
        if (!($coverFileExtension == "jpg" | $coverFileExtension == "jpeg" | $coverFileExtension == "png" | $coverFileExtension == "bmp")) {
            $uploadFile = false;
            InfoList::addInfo(new Info("Your uploaded Cover file doesn't have a supported extension.", "Okay", "", "red"));
        }

        if ($uploadFile == true) {
            if (move_uploaded_file($_FILES["albumcover"]["tmp_name"], $uploadFilepathCover)) {
                $albumId = DBConnect::insertAlbum($albumTitle, $albumArtist, $curTimestamp . basename($_FILES["albumcover"]["name"]));
                header("Location: " . Config::configArr['urls']['base'] . Config::configArr['urls']['album'] . "&" . Config::configArr['urls']['id'] . $albumId);
                die();

            } else {
                InfoList::addInfo(new Info("The file couldn't be saved. Try again or contact us.", "Okay", "", "red"));
            }
        }
    }

    protected static function isFileAnImage() {
        if (!getimagesize($_FILES["albumcover"]["tmp_name"])) {
            return false;
        } else {
            return true;
        }
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


    public function getCover() {
        require_once (__DIR__ . "/Cover.php");
        return new Cover($this->getCoverId());
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

    /**
     * @return mixed
     */
    public function getSongVisits() {
        return $this->songVisits;
    }

    /**
     * @param mixed $songVisits
     */
    public function setSongVisits($songVisits) {
        $this->songVisits = $songVisits;
    }



}