<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 23.02.18
 * Time: 14:23
 */

require_once(__DIR__ . "/../libs/getid3/getid3.php");


var_dump($_FILES);
echo "<br><br>";
var_dump($_POST);
echo "<br><br>";
if (isset($_SESSION["username"], $_SESSION["userId"])) {
    if (isset($_POST["title"], $_POST["album"], $_POST["artist"], $_POST["genre"], $_POST["songtext"])) {
        $songTitle = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $songAlbum = filter_input(INPUT_POST, 'album', FILTER_SANITIZE_STRING);
        $songArtist = filter_input(INPUT_POST, 'artist', FILTER_SANITIZE_STRING);
        $songGenre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING);
        $songText = filter_input(INPUT_POST, 'songtext', FILTER_SANITIZE_STRING);

        if($songAlbum == "none") {$songAlbum = null;}

        $curTimestamp = new DateTime();
        $curTimestamp = $curTimestamp->format("Y-m-d_H-i-s");

        $uploadDirMusic = ($_SERVER['DOCUMENT_ROOT'] . Config::configArr["urls"]["musicDirectoryInternal"]);
        $uploadFilepathMusic = $uploadDirMusic . $curTimestamp . basename($_FILES["musicfile"]["name"]);

        $uploadDirCover = ($_SERVER['DOCUMENT_ROOT'] . Config::configArr["urls"]["coverDirectoryInternal"]);
        $uploadFilepathCover = $uploadDirCover . $curTimestamp . basename($_FILES["musiccover"]["name"]);

        $uploadFiles = true;

        $renameTries = 0;
        while (file_exists($uploadFilepathMusic) || file_exists($uploadFilepathCover)){
            if ($renameTries > 100) {
                $uploadFiles = false;
                echo "debug: nameexists";
                break;
            }
            $dateTime = new DateTime();
            $dateTime = $dateTime->format("Y-m-d_H-i-s");
            $renameTries++;
        }

        if (!isFileAnImage() | !(isFileAudio())) {
            $uploadFiles = false;
            echo "debug: filetypes wrong";
        }

        if ($_FILES["musiccover"]["size"] > 52428800 | $_FILES["musicfile"]["size"] > 52428800) { // TODO: Herr Menne, hier müssen Sie die Dateigröße ändern
            $uploadFiles = false;
            echo "debug: files too large";
        }

        $musicFileExtension = strtolower(pathinfo($uploadFilepathMusic, PATHINFO_EXTENSION));
        $coverFileExtension = strtolower(pathinfo($uploadFilepathCover, PATHINFO_EXTENSION));
        if (!($coverFileExtension == "jpg" | $coverFileExtension == "jpeg" | $coverFileExtension == "png" | $coverFileExtension == "bmp")) {
            $uploadFiles = false;
            echo "debug: cover not correct extension";
        } else if (!($musicFileExtension == "mp3")) {
            $uploadFiles = false;
            echo "debug: music not correct extension";
        }

        if ($uploadFiles == true) {
            if (move_uploaded_file($_FILES["musicfile"]["tmp_name"], $uploadFilepathMusic) && move_uploaded_file($_FILES["musiccover"]["tmp_name"], $uploadFilepathCover)) {
                DBConnect::insertSong($songTitle, ($curTimestamp . basename($_FILES["musicfile"]["name"])), $_SESSION["userId"], $songArtist, $songGenre, $songText, $curTimestamp . basename($_FILES["musiccover"]["name"]), $songAlbum);
                echo "success";

            } else {
                echo "failed:" . move_uploaded_file($_FILES["musicfile"]["tmp_name"], $uploadFilepathMusic);
            }
        }
    }
}




function isFileAnImage() {
    if (!getimagesize($_FILES["musiccover"]["tmp_name"])) {
        return false;
    } else {
        return true;
    }
}

function isFileAudio() {
    try {
        $getID3 = new getID3;
        $fileInfo = $getID3->analyze($_FILES["musicfile"]["tmp_name"]);
        getid3_lib::CopyTagsToComments($fileInfo);
    } catch (getid3_exception $exception) {
        echo $exception->getMessage();
    }
    if (!preg_match("/^(audio\/)/", $fileInfo["mime_type"])) {
        echo "<br>other filetype detected: ". $fileInfo["mime_type"];
        return true;
    } else {
        return true;
    }
}