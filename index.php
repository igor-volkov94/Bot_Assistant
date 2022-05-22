<?php
ini_set('max_execution_time',0);
date_default_timezone_set("Europe/Moscow");

include_once "local/php_interface/init.php";
$uID = 0; #Системная переменная, не изменять не удалять

while (!$start) {
    include "logic.php";
//    $start = true;
}
