<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 19.02.18
 * Time: 16:11
 */

class DBConnect {
    private static $instance = null;

    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __clone(){}

    private $connection = null;

    private function __construct() {
        $this->connection = new PDO('mysql:host=' . Config::configArr['db']['host'] . ';dbname=' . Config::configArr['db']['db'], Config::configArr['db']['username'], Config::configArr['db']['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getUserAttributes($id) {
        $query = DBConnect::getInstance()->connection->prepare("SELECT user.id, user.email, user.username, user.password, user.salt, user.created FROM user WHERE user.id = :id");
        $query->bindParam(":id", $id);
        $query->execute();

        $data = null;

        if($query->rowCount() == 1) {
            while ($row = $query->fetch()) {
                $data = array(
                    "id"           => $row['id'],
                    "email"         => $row['email'],
                    "username"      => $row['username'],
                    "password"      => $row['password'],
                    "salt"          => $row['salt'],
                    "created"       => $row['created'],
                );
            }
        }
        return $data;
    }
    public static function getSongAttributes($id) {
        $query = DBConnect::getInstance()->connection->prepare("SELECT song.id, song.name, song.filename, song.visits, song.created, song.userid, song.artistid, song.genreid, song.songtextid, song.coverid, song.albumid, genre.name as genrename, songtext.content as songtextcontent, cover.filename as coverfilename FROM song LEFT JOIN genre ON song.genreid = genre.id LEFT JOIN songtext ON song.songtextid = songtext.id LEFT JOIN cover ON song.coverid = cover.id WHERE song.id = :id");
        $query->bindParam(":id", $id);
        $query->execute();

        $data = null;

        if($query->rowCount() == 1) {
            while ($row = $query->fetch()) {
                $data = array(
                    "id"            => $row['id'],
                    "name"          => $row['name'],
                    "filename"      => $row['filename'],
                    "visits"        => $row['visits'],
                    "created"       => $row['created'],
                    "userId"        => $row['userid'],
                    "artistId"      => $row['artistid'],
                    "genreId"       => $row['genreid'],
                    "genre"         => $row['genrename'],
                    "songtextId"    => $row['songtextid'],
                    "songtext"      => $row['songtextcontent'],
                    "coverId"       => $row['coverid'],
                    "coverFilename" => $row['coverfilename'],
                    "albumId"       => $row['albumid'],
                );
            }
        }
        return $data;
    }
    public static function getArtistAttributes($id) {
        $query = DBConnect::getInstance()->connection->prepare("SELECT artist.id, artist.name FROM artist WHERE artist.id = :id");
        $query->bindParam(":id", $id);
        $query->execute();

        $data = null;

        if($query->rowCount() == 1) {
            while ($row = $query->fetch()) {
                $data = array(
                    "id"        => $row['id'],
                    "name"      => $row['name'],
                );
            }
        }
        return $data;
    }
    public static function getAlbumAttributes($id) {
        $query = DBConnect::getInstance()->connection->prepare("SELECT album.id, album.name, album.created, album.artistid, album.coverid FROM album WHERE album.id = :id");
        $query->bindParam(":id", $id);
        $query->execute();

        $data = null;

        if($query->rowCount() == 1) {
            while ($row = $query->fetch()) {
                $data = array(
                    "id"        => $row['id'],
                    "name"      => $row['name'],
                    "created"   => $row['created'],
                    "artistId"  => $row['artistid'],
                    "coverId"   => $row['coverid'],
                );
            }
        }
        return $data;
    }
    public static function getPlaylistAttributes($id) {
        $query = DBConnect::getInstance()->connection->prepare("SELECT playlist.id, playlist.name, playlist.created, playlist.userid FROM playlist WHERE playlist.id = :id");
        $query->bindParam(":id", $id);
        $query->execute();

        $data = null;

        if($query->rowCount() == 1) {
            while ($row = $query->fetch()) {
                $data = array(
                    "id"        => $row['id'],
                    "name"      => $row['name'],
                    "created"   => $row['created'],
                    "userId"    => $row['userid'],
                );
            }
        }
        return $data;
    }
    public static function getCoverAttributes($id) {
        $query = DBConnect::getInstance()->connection->prepare("SELECT cover.id, cover.filename FROM cover WHERE cover.id = :id");
        $query->bindParam(":id", $id);
        $query->execute();

        $data = null;

        if($query->rowCount() == 1) {
            while ($row = $query->fetch()) {
                $data = array(
                    "id"        => $row['id'],
                    "filename"  => $row['filename'],
                );
            }
        }
        return $data;
    }

    public static function getGenres() {
        $query = DBConnect::getInstance()->connection->prepare("SELECT genre.id, genre.name FROM genre ORDER BY genre.name ASC");
        $query->execute();

        $data = null;

        if($query->rowCount() >= 1) {

            $data = array();

            while ($row = $query->fetch()) {
                $data[$row['id']] = $row['name'];
            }
        }
        return $data;
    }
    public static function getArtists() {
        $query = DBConnect::getInstance()->connection->prepare("SELECT artist.id, artist.name FROM artist ORDER BY artist.name ASC");
        $query->execute();

        $data = null;

        if($query->rowCount() >= 1) {

            $data = array();

            while ($row = $query->fetch()) {
                $data[$row['id']] = $row['name'];
            }
        }
        return $data;
    }
    public static function getAlbums() {
        $query = DBConnect::getInstance()->connection->prepare("SELECT album.id, album.name FROM album ORDER BY album.name ASC");
        $query->execute();

        $data = null;

        if($query->rowCount() >= 1) {

            $data = array();

            while ($row = $query->fetch()) {
                $data[$row['id']] = $row['name'];
            }
        }
        return $data;
    }
    public static function getPlaylists() {
        $query = DBConnect::getInstance()->connection->prepare("SELECT playlist.id, playlist.name FROM playlist ORDER BY playlist.name ASC");
        $query->execute();

        $data = null;

        if($query->rowCount() >= 1) {

            $data = array();

            while ($row = $query->fetch()) {
                $data[$row['id']] = $row['name'];
            }
        }
        return $data;
    }
    public static function getSongs() {
        $query = DBConnect::getInstance()->connection->prepare("SELECT song.id, song.name FROM song ORDER BY song.name ASC");
        $query->execute();

        $data = null;

        if($query->rowCount() >= 1) {

            $data = array();

            while ($row = $query->fetch()) {
                $data[$row['id']] = $row['name'];
            }
        }
        return $data;
    }
    public static function getAlbumFromArtist($id) {
        $query = DBConnect::getInstance()->connection->prepare("SELECT album.id, album.name, album.artistid FROM album WHERE album.artistid = :id ORDER BY album.name ASC");
        $query->bindParam(":id", $id);
        $query->execute();

        $data = null;

        if($query->rowCount() >= 1) {

            $data = array();

            while ($row = $query->fetch()) {
                $singleData['id'] = $row['id'];
                $singleData['name'] = $row['name'];
                $data[] = $singleData;
            }
        }
        return $data;
    }
    public static function getSongsFromAlbum($id) {
        $query = DBConnect::getInstance()->connection->prepare("SELECT song.id, song.albumid FROM song WHERE song.albumid = :id ORDER BY song.name ASC");
        $query->bindParam(":id", $id);
        $query->execute();

        $data = null;

        if($query->rowCount() >= 1) {

            $data = array();

            while ($row = $query->fetch()) {
                $data[] = $row['id'];
            }
        }
        return $data;
    }
    public static function getSongsFromPlaylist($id) {
        $query = DBConnect::getInstance()->connection->prepare("SELECT playlistSong.id, playlistSong.songid, playlistSong.playlistid FROM playlistSong WHERE playlistSong.playlistId = :id ORDER BY playlistSong.name ASC");
        $query->bindParam(":id", $id);
        $query->execute();

        $data = null;

        if($query->rowCount() >= 1) {

            $data = array();

            while ($row = $query->fetch()) {
                $data[] = $row['songid'];
            }
        }
        return $data;
    }


    public static function getUserIdFromEmail($email) {
        $query = DBConnect::getInstance()->connection->prepare("SELECT user.id FROM user WHERE user.email = :email");
        $query->bindParam(":email", $email);
        $query->execute();

        if($query->rowCount() == 1) {
            while ($row = $query->fetch()) {
                return($row['id']);
            }
            return false;
        } else {
            return false;
        }
    }
    public static function getUserIdFromUsername($username) {
        $query = DBConnect::getInstance()->connection->prepare("SELECT user.id FROM user WHERE user.username = :username");
        $query->bindParam(":username", $username);
        $query->execute();

        if($query->rowCount() == 1) {
            while ($row = $query->fetch()) {
                return($row['id']);
            }
            return false;
        } else {
            return false;
        }
    }


    public static function insertUser($email, $username, $password, $salt) {
        $query = DBConnect::getInstance()->connection->prepare("INSERT INTO user(email, username, password, salt, created) VALUES(:email, :username, :password, :salt, :created)");
        $query->bindParam(":email", $email);
        $query->bindParam(":username", $username);
        $query->bindParam(":password", $password);
        $query->bindParam(":salt", $salt);
        $time = new DateTime();
        $time = $time->format("Y-m-d H:i:s");
        $query->bindParam(":created", $time);
        $query->execute();

        if($query) {
            return true;
        } else return false;
    }
    public static function insertSong($name, $filename, $userId, $artistId, $genreId, $songtext, $coverFilename, $albumId) {
        DBConnect::getInstance()->connection->beginTransaction();

        $query = DBConnect::getInstance()->connection->prepare("BEGIN");
        $query->execute();

        $query = DBConnect::getInstance()->connection->prepare("INSERT INTO songtext(content) VALUES (:songtext)");
        $query->bindParam(":songtext", $songtext);
        $query->execute();

        $query = DBConnect::getInstance()->connection->prepare("SELECT LAST_INSERT_ID()");
        $query->execute();
        $songtextId = null;
        if($query->rowCount() == 1) {
            while ($row = $query->fetch()) {
                $songtextId = ($row['LAST_INSERT_ID()']);
            }
        }

        $query = DBConnect::getInstance()->connection->prepare("INSERT INTO cover(filename) VALUES (:coverFilename)");
        $query->bindParam(":coverFilename", $coverFilename);
        $query->execute();

        $query = DBConnect::getInstance()->connection->prepare("SELECT LAST_INSERT_ID()");
        $query->execute();
        $coverId = null;
        if($query->rowCount() == 1) {
            while ($row = $query->fetch()) {
                $coverId = ($row['LAST_INSERT_ID()']);
            }
        }

        $query = DBConnect::getInstance()->connection->prepare("INSERT INTO song(name, filename, created, userid, artistid, genreid, songtextid, coverid, albumid) VALUES(:name, :filename, :created, :userId, :artistId, :genreId, :songtextId, :coverId, :albumId)");
        $query->bindParam(":name", $name);
        $query->bindParam(":filename", $filename);
        $time = new DateTime();
        $time = $time->format("Y-m-d H:i:s");
        $query->bindParam(":created", $time);
        $query->bindParam(":userId", $userId);
        $query->bindParam(":artistId", $artistId);
        $query->bindParam(":genreId", $genreId);
        $query->bindParam(":songtextId", $songtextId);
        $query->bindParam(":coverId", $coverId);
        $query->bindParam(":albumId", $albumId);
        $query->execute();

        $query = DBConnect::getInstance()->connection->prepare("SELECT LAST_INSERT_ID()");
        $query->execute();
        $songId = null;
        if($query->rowCount() == 1) {
            while ($row = $query->fetch()) {
                $songId = ($row['LAST_INSERT_ID()']);
            }
        }

        $query = DBConnect::getInstance()->connection->prepare("COMMIT;");
        $query->execute();
        if (isset ($songId) && $songId != null) {
            return $songId;
        } else {
            return false;
        }
    }
    public static function insertAlbum($name, $artistId, $coverFilename) {
        DBConnect::getInstance()->connection->beginTransaction();

        $query = DBConnect::getInstance()->connection->prepare("BEGIN");
        $query->execute();

        $query = DBConnect::getInstance()->connection->prepare("INSERT INTO cover(filename) VALUES (:coverFilename)");
        $query->bindParam(":coverFilename", $coverFilename);
        $query->execute();

        $query = DBConnect::getInstance()->connection->prepare("SELECT LAST_INSERT_ID()");
        $query->execute();
        $coverId = null;
        if($query->rowCount() == 1) {
            while ($row = $query->fetch()) {
                $coverId = ($row['LAST_INSERT_ID()']);
            }
        }

        $query = DBConnect::getInstance()->connection->prepare("INSERT INTO album(name, created, artistid, coverid) VALUES(:name, :created, :artistId, :coverId)");
        $query->bindParam(":name", $name);
        $time = new DateTime();
        $time = $time->format("Y-m-d H:i:s");
        $query->bindParam(":created", $time);
        $query->bindParam(":artistId", $artistId);
        $query->bindParam(":coverId", $coverId);
        $query->execute();

        $query = DBConnect::getInstance()->connection->prepare("SELECT LAST_INSERT_ID()");
        $query->execute();
        $albumId = null;
        if($query->rowCount() == 1) {
            while ($row = $query->fetch()) {
                $albumId = ($row['LAST_INSERT_ID()']);
            }
        }

        $query = DBConnect::getInstance()->connection->prepare("COMMIT;");
        $query->execute();
        if (isset ($albumId) && $albumId != null) {
            return $albumId;
        } else {
            return false;
        }
    }
    public static function insertLoginAttempt($userId, $time) {
        $query = DBConnect::getInstance()->connection->prepare("INSERT INTO failedLogin(userId, time) VALUES(:userId, :time)");
        $query->bindParam(":userId", $userId);
        $query->bindParam(":time", $time);
        $query->execute();

        if($query) {
            return true;
        } else return false;
    }


    public static function getNumberOfLoginAttempts($userId, DateTime $timeSpan) {
        $query = DBConnect::getInstance()->connection->prepare("SELECT failedLogin.id, failedLogin.userId, failedLogin.time FROM failedLogin WHERE failedLogin.userId = :userId AND failedLogin.time > :timeSpan");
        $query->bindParam(":userId", $userId);
        $query->bindParam(":timeSpan", $timeSpan->getTimestamp() );
        $query->execute();

        return $query->rowCount();
    }
    public static function checkIfEmailExists($email) {
        $query = DBConnect::getInstance()->connection->prepare("SELECT user.id FROM user WHERE user.email = :email LIMIT 1");
        $query->bindParam(":email", $email);
        $query->execute();

        if ($query->rowCount() == 0) {
            return false;
        } else
            return true;
    }
    public static function checkIfUsernameExists($username) {
        $query = DBConnect::getInstance()->connection->prepare("SELECT user.id FROM user WHERE user.username = :username LIMIT 1");
        $query->bindParam(":username", $username);
        $query->execute();

        if ($query->rowCount() == 0) {
            return false;
        } else
            return true;
    }


    public static function getLastCreatedAccountId() {
        return DBConnect::getInstance()->connection->lastInsertId();
    }
}
