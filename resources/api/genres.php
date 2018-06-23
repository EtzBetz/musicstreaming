<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 07.06.18
 * Time: 14:24
 */

header ('Content-type:application/json');
echo json_encode(DBConnect::getGenres());