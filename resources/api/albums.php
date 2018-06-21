<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 07.06.18
 * Time: 14:19
 */

header ('Content-type:application/json');
if (isset($_GET["artistid"])) {
    echo json_encode(DBConnect::getAlbumsFromArtist($_GET["artistid"]));
} else {
    echo json_encode(DBConnect::getAlbums());
}