<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 11.01.18
 * Time: 16:10
 */

require_once(__DIR__ . "/../resources/config.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo($title) ?></title>
        <link rel="stylesheet" href="./css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400|Roboto:400,600" rel="stylesheet">
    </head>
    <body>
    <?php
        include_once(__DIR__ . "/../resources/forms/header.php");
        include_once(__DIR__ . "/../resources/forms/info.php");
        include_once(__DIR__ . "/../resources/forms/content.php");
        include_once(__DIR__ . "/../resources/forms/footer.php");
    ?>
    </body>
    <script src="./js/javascript.js"></script>
</html>