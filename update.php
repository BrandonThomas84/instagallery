<?php

ini_set('display_errors',1); 
error_reporting(E_ALL);

require_once("lib/sql.php");

$query=file_get_contents("data/update.sql");
mysql_insert($query);
