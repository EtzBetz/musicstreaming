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
        $this->connection = new PDO('mysql:host='. Config::configArr['db']['host'] .';dbname='. Config::configArr['db']['db'], Config::configArr['db']['username'], Config::configArr['db']['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')); // TODO: Put connect data in Config.php
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
        $query = DBConnect::getInstance()->connection->prepare("SELECT song.id, song.name, song.filename, song.visits, song.created, song.userid, song.artistid, song.genreid, song.songtextid, song.coverid, song.albumid, genre.name as genrename, songtext.content as songtextcontent, cover.id as coveridtest FROM song LEFT JOIN genre ON song.genreid = genre.id LEFT JOIN songtext ON song.songtextid = songtext.id LEFT JOIN cover ON song.coverid = cover.id WHERE song.id = :id");
        $query->bindParam(":id", $id);
        $query->execute();

        $data = null;

        if($query->rowCount() == 1) {
            while ($row = $query->fetch()) {
                $data = array(
                    "id"        => $row['id'],
                    "name"      => $row['name'],
                    "filename"  => $row['filename'],
                    "visits"    => $row['visits'],
                    "created"   => $row['created'],
                    "userId"    => $row['userid'],
                    "artistId"  => $row['artistid'],
                    "genreId"   => $row['genreid'],
                    "genre"     => $row['genrename'],
                    "songtextId"=> $row['songtextid'],
                    "songtext"  => $row['songtextcontent'],
                    "coverId"   => $row['coverid'],
                    "cover"     => $row['coveridtest'],
                    "albumId"   => $row['albumid'],
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


    public static function getUserIdFromEmail($email) {
        $query = DBConnect::getInstance()->connection->prepare("SELECT user.id FROM user WHERE user.email = :email");
        $query->bindParam(":email", $email);
        $query->execute();

        if($query->rowCount() == 1) {
            while ($row = $query->fetch()) {
                return($row['id']);
            }
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
