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
    protected $genre;
    protected $songtextId;
    protected $songtext;
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
        $this->genre = $data["genre"];
        $this->songtextId = $data["songtextId"];
        $this->songtext = nl2br($data["songtext"]);
        $this->coverId = $data["coverId"];
        $this->albumId = $data["albumId"];
    }

    public static function createNewSong($songTitle, $songAlbum, $songArtist, $songGenre, $songText) {

                if($songAlbum == "none") {$songAlbum = null;}

                $curTimestamp = new DateTime();
                $curTimestamp = $curTimestamp->format("Y-m-d_H-i-s");

                $uploadDirMusic = ($_SERVER['DOCUMENT_ROOT'] . Config::configArr["urls"]["musicDirectoryInternal"]);
                $uploadFilepathMusic = $uploadDirMusic . $curTimestamp . basename($_FILES["musicfile"]["name"]);

                $uploadDirCover = ($_SERVER['DOCUMENT_ROOT'] . Config::configArr["urls"]["coverDirectoryInternal"]);
                $uploadFilepathCover = $uploadDirCover . $curTimestamp . basename($_FILES["musiccover"]["name"]);

                $uploadFiles = true;

                $renameTries = 0;
                while (file_exists($uploadFilepathMusic)){
                    if ($renameTries > 100) {
                        $uploadFiles = false;
                        InfoList::addInfo(new Info("There is already a music file with the same name. Try renaming and uploading it again.", "I'll try", "", "red"));
                        break;
                    }
                    $dateTime = new DateTime();
                    $dateTime = $dateTime->format("Y-m-d_H-i-s");
                    $renameTries++;
                }

                $renameTries = 0;
                while (file_exists($uploadFilepathCover)){
                    if ($renameTries > 100) {
                        $uploadFiles = false;
                        InfoList::addInfo(new Info("There is already a cover file with the same name. Try renaming and uploading it again.", "I'll try", "", "red"));
                        break;
                    }
                    $dateTime = new DateTime();
                    $dateTime = $dateTime->format("Y-m-d_H-i-s");
                    $renameTries++;
                }

                if (!Song::isFileAnImage()) {
                    $uploadFiles = false;
                    InfoList::addInfo(new Info("Your uploaded Cover file wasn't recognized as image.", "Try another format", "", "red"));
                }

                if (!Song::isFileAudio()) {
                    $uploadFiles = false;
                    InfoList::addInfo(new Info("Your uploaded Audio file wasn't recognized as audio.", "Try another format", "", "red"));
                }

                if ($_FILES["musiccover"]["size"] > 52428800){ // TODO: Herr Menne, hier müssen Sie die Dateigröße ändern
                    $uploadFiles = false;
                    InfoList::addInfo(new Info("Your uploaded Cover file exceeded the maximum file size.", "Okay", "", "red"));
                }

                if ($_FILES["musicfile"]["size"] > 52428800) { // TODO: Herr Menne, hier müssen Sie die Dateigröße ändern²
                    $uploadFiles = false;
                    InfoList::addInfo(new Info("Your uploaded Music file exceeded the maximum file size.", "Okay", "", "red"));
                }

                $musicFileExtension = strtolower(pathinfo($uploadFilepathMusic, PATHINFO_EXTENSION));
                $coverFileExtension = strtolower(pathinfo($uploadFilepathCover, PATHINFO_EXTENSION));
                if (!($coverFileExtension == "jpg" | $coverFileExtension == "jpeg" | $coverFileExtension == "png" | $coverFileExtension == "bmp")) {
                    $uploadFiles = false;
                    InfoList::addInfo(new Info("Your uploaded Cover file doesn't have a supported extension.", "Okay", "", "red"));
                } else if (!($musicFileExtension == "mp3" | $musicFileExtension == "m4a")) {
                    $uploadFiles = false;
                    InfoList::addInfo(new Info("Your uploaded Music file doesn't have a supported extension.", "Okay", "", "red"));
                }

                if ($uploadFiles == true) {
                    if (move_uploaded_file($_FILES["musicfile"]["tmp_name"], $uploadFilepathMusic) && move_uploaded_file($_FILES["musiccover"]["tmp_name"], $uploadFilepathCover)) {
                        $songId = DBConnect::insertSong($songTitle, ($curTimestamp . basename($_FILES["musicfile"]["name"])), $_SESSION["userId"], $songArtist, $songGenre, $songText, $curTimestamp . basename($_FILES["musiccover"]["name"]), $songAlbum);
                        header("Location: " . Config::configArr['urls']['base'] . Config::configArr['urls']['song'] . "&" . Config::configArr['urls']['id'] . $songId);
                        die();

                    } else {
                        InfoList::addInfo(new Info("The file couldn't be saved. Try again or contact us.", "Okay", "", "red"));
                    }
                }


    }

    protected static function isFileAnImage() {
        if (!getimagesize($_FILES["musiccover"]["tmp_name"])) {
            return false;
        } else {
            return true;
        }
    }

    protected static function isFileAudio() {
        try {
            $getID3 = new getID3;
            $fileInfo = $getID3->analyze($_FILES["musicfile"]["tmp_name"]);
            getid3_lib::CopyTagsToComments($fileInfo);
        } catch (getid3_exception $exception) {
            echo $exception->getMessage();
        }
        if (!preg_match("/^(audio\/)/", $fileInfo["mime_type"])) {
            echo "<br>other filetype detected: ". $fileInfo["mime_type"];
            return false;
        } else {
            return true;
        }
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
    public function getGenre() {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre) {
        $this->genre = $genre;
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
    public function getSongtext() {
        return $this->songtext;
    }

    /**
     * @param mixed $songtext
     */
    public function setSongtext($songtext) {
        $this->songtext = $songtext;
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