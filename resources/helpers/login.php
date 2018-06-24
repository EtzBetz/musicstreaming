<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 19.02.18
 * Time: 12:26
 */


if (isset($_POST['email'], $_POST['password'])) {
    if (login($_POST['email'], $_POST['password']) == true) {
        // Login successful
        header('Location: .' . Config::configArr["urls"]["user"] . "&id=" . $_SESSION['userId']);
    } else {
        // Login failed
        InfoList::addInfo(new Info("Login failed. Password is wrong or the user doesn't exist.", "I'll try again", Config::configArr["urls"]["login"], "yellow"));
    }
} else {
    // Some error with post parameters
    InfoList::addInfo(new Info("An error occurred. A post parameter isn't set.", "I'll try again", Config::configArr["urls"]["login"], "red"));
}
/**
 * @param $email    [string]
 * @param $password [string]
 * @return bool
 */
function login($email, $password) {
    $user = new User($email, "email");
    $passwordHash = hash('sha512', $password . $user->getSalt());
    if (checkBrute($user->getId()) == true) {
        return false;
    } else {
        if ($user->getPassword() == $passwordHash) {
            $_SESSION['userId'] = $user->getId();
            $_SESSION['username'] = $user->getUsername();
            return true;
        } else {
            $time = new DateTime();
            $time = $time->format("Y-m-d H:i:s");
            DBConnect::insertLoginAttempt($user->getId(), $time);
            return false;
        }
    }

}

/**
 * returns true if the user had more than X failed login attempts, otherwise false
 * @param $userId
 * @return bool
 */
function checkBrute($userId) {
    $timeSpan = new DateTime();
    $timeSpan->format("Y-m-d\TH:i:sP");
    $timeSpan->modify("-2 hour");
    if (DBConnect::getNumberOfLoginAttempts($userId, $timeSpan) > 50) { // TODO: let admin customize number and time span of valid attempts
        return true;
    } else
        return false;
}