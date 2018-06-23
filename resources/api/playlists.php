<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 07.06.18
 * Time: 14:32
 */

header ('Content-type:application/json');
echo json_encode(DBConnect::getPlaylists());