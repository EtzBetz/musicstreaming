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
        $this->connection = new PDO('mysql:host='. Config::configArr['db']['host'] .';dbname='. Config::configArr['db']['db'], Config::configArr['db']['username'], Config::configArr['db']['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')); // TODO: Put connect data in config.php
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getUserAttributes($id) {
        $query = DBConnect::getInstance()->connection->prepare("SELECT user.id, user.email, user.username, user.password, user.salt, user.mainAccountId, user.groupId, user.created FROM user WHERE user.id = :id");
        $query->bindParam(":id", $id);
        $query->execute();

        $data = null;

        if($query->rowCount() == 1) {
            while ($row = $query->fetch()) {
                $data = array(
                    "id "           => $row['id'],
                    "email"         => $row['email'],
                    "username"      => $row['username'],
                    "password"      => $row['password'],
                    "salt"          => $row['salt'],
                    "mainAccountId" => $row['mainAccountId'],
                    "groupId"       => $row['groupId'],
                    "created"       => $row['created']
                );
            }
        }
        return $data;
    }
    public static function getAccountAttributes($id) {
        $query = DBConnect::getInstance()->connection->prepare("SELECT account.id, account.userId, account.favored, account.apiKey FROM account WHERE account.userId = :id");
        $query->bindParam(":id", $id);
        $query->execute();

        $data = null;

        if($query->rowCount() == 1) {
            while ($row = $query->fetch()) {
                $data = array(
                    "id"      => $row['id'],
                    "userId"  => $row['userId'],
                    "favored" => $row['favored'],
                    "apiKey"  => $row['apiKey']
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
    public static function getUserIdFromAccountId($accountId) {
        $query = DBConnect::getInstance()->connection->prepare("SELECT account.userId FROM account WHERE account.id = :accountId");
        $query->bindParam(":accountId", $accountId);
        $query->execute();

        if($query->rowCount() == 1) {
            while ($row = $query->fetch()) {
                return($row['id']);
            }
        }
    }
    public static function getAccountIdsFromUserId($userId) {
        $query = DBConnect::getInstance()->connection->prepare("SELECT account.id FROM account WHERE account.userId = :userId");
        $query->bindParam(":userId", $userId);
        $query->execute();

        if($query->rowCount() > 0) {
            $data = array();
            while ($row = $query->fetch()) {
                $data[] = ($row['id']);
            }
            return $data;
        }
    }


    public static function insertUser($email, $username, $password, $salt) {
        $query = DBConnect::getInstance()->connection->prepare("INSERT INTO user(email, username, password, salt, groupId, created) VALUES(:email, :username, :password, :salt, :groupId, :created)");
        $query->bindParam(":email", $email);
        $query->bindParam(":username", $username);
        $query->bindParam(":password", $password);
        $query->bindParam(":salt", $salt);
        $groupId = 1;
        $query->bindParam(':groupId', $groupId); // TODO: add setting for starter-groupId
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


        $recipeId = $pdo->lastInsertId();
    }
}
