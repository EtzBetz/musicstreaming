<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 22.02.18
 * Time: 20:52
 */

class User {
    private $id;
    private $email;
    private $username;
    private $password;
    private $salt;
    private $mainAccountId;
    private $accountIds;
    private $groupId;
    private $created;

    /**
     * user constructor.
     * @param $id     [null, int]
     * @param $idType [null,"id","email","username","accountId"]
     */
    public function __construct($id = null, $idType = null) {
        if (isset($idType) && isset($id)) {
            switch ($idType) {
                case "id":
                    $this->id = $id;
                    break;
                case "email":
                    $this->email = $id;
                    break;
                case "username":
                    $this->username = $id;
                    break;
                case "accountId":
                    $this->accountIds = array($id);
                    break;
            }
            $this->fillAttributes();
        }
    }

    private function fillAttributes() {
        if (isset($this->id)) {
            // Do nothing here to skip if-query and get users attributes directly
        } elseif (isset($this->email)) {
            $this->setId(DBConnect::getUserIdFromEmail($this->email));
        } elseif (isset($this->username)) {
            $this->setId(DBConnect::getUserIdFromUsername($this->username));
        } elseif (isset($this->mainAccountId)) {
            $this->setId(DBConnect::getUserIdFromAccountId($this->mainAccountId));
        } elseif (isset($this->accountIds)) {
            $this->setId(DBConnect::getUserIdFromAccountId($this->accountIds[0]));
        }
        if (isset($this->id)) {
            $userAttributes = DBConnect::getUserAttributes($this->id);
            $this->setEmail($userAttributes['email']);
            $this->setUsername($userAttributes['username']);
            $this->setPassword($userAttributes['password']);
            $this->setSalt($userAttributes['salt']);
            $this->setMainAccountId($userAttributes['mainAccountId']);
            $this->setGroupId($userAttributes['groupId']);
            $this->setCreated($userAttributes['created']);
            $this->setAccountIds(DBConnect::getAccountIdsFromUserId($this->id));
        }
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username) {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getSalt() {
        return $this->salt;
    }

    /**
     * @param string $salt
     */
    public function setSalt($salt) {
        $this->salt = $salt;
    }

    /**
     * @return int
     */
    public function getMainAccountId() {
        return $this->mainAccountId;
    }

    /**
     * @param int $mainAccountId
     */
    public function setMainAccountId($mainAccountId) {
        $this->mainAccountId = $mainAccountId;
    }

    /**
     * @return array
     */
    public function getAccountIds() {
        return $this->accountIds;
    }

    /**
     * @param array $accountIds
     */
    public function setAccountIds($accountIds) {
        $this->accountIds = $accountIds;
    }

    /**
     * @return int
     */
    public function getGroupId() {
        return $this->groupId;
    }

    /**
     * @param int $groupId
     */
    public function setGroupId($groupId) {
        $this->groupId = $groupId;
    }

    /**
     * @return DateTime
     */
    public function getCreated() {
        return $this->created;
    }

    /**
     * @param DateTime $created
     */
    public function setCreated($created) {
        $this->created = $created;
    }



}