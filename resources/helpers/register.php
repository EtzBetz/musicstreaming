<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 23.02.18
 * Time: 14:23
 */

if (isset($_POST['email'], $_POST['username'], $_POST['password'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);   //Strip tags, encode special characters
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);          //Remove all characters except letters, digits and !#$%&'*+-/=?^_`{|}~@.[]
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {                                              //Validate mail string, local domains not valid, returns null when invalid
        InfoList::addInfo(new Info("The email address you entered is not valid.", "I'll try again", Config::configArr["urls"]["register"], "red"));
        return;     // Abort register.php and return to index.php
    }
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);   //Strip tags, encode special characters

    if (DBConnect::checkIfEmailExists($email)) {
        InfoList::addInfo(new Info("The email address you entered is already used.", "I'll try again", Config::configArr["urls"]["register"], "yellow"));
        return;
    }

    if (DBConnect::checkIfUsernameExists($username)) {
        InfoList::addInfo(new Info("The username you entered is already taken.", "I'll try again", Config::configArr["urls"]["register"], "yellow"));
        return;
    }

    if (empty($error_msg)) {
        $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));

        $password = hash('sha512', $password . $random_salt);

        if (DBConnect::insertUser($email, $username, $password, $random_salt)) {
            header('Location: .' . Config::configArr["urls"]["user"] . "&id=" . DBConnect::getUserIdFromEmail($email)); // TODO: redirect to userpage of newly created user
        }
    }
} else {
    InfoList::addInfo(new Info("An error occurred. A post parameter isn't set.", "I'll try again", Config::configArr["urls"]["register"], "red"));
}