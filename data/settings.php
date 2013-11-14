<?php

$error="";

/* db connect */
$dbname="instagallery";
$user="root";
$pass="root";

/* hash */
$numHashChars=4;

/*images*/
$defaultLimit=10;

/*status*/
$statusvalue = array("New","Approved","Blocked");


$rootPath=str_replace("/data","",dirname(__FILE__));
?>