<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 25.01.18
 * Time: 18:46
 */
?>

<div class="content container">
    <?php
    if (isset($_GET["p"])) {
        if ($_GET["p"] == "login") {
            require_once(__DIR__ . "/login.php");
        } elseif ($_GET["p"] == "register") {
            require_once(__DIR__ . "/register.php");
        }
    } else {
        require_once(__DIR__ . "/../static/index.php");
    }
    ?>
</div>