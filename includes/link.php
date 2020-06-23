<?php

require_once "config.php";
require_once "database.php";
$link = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

$conn = $link->connect();
    
?>