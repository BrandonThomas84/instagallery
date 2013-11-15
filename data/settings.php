<?php

$error="";
$currenturl = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

/* db connect */
if (false !== strpos($currenturl,'local')) {
	$dbname="instagallery";
	$user="root";
	$pass="snapple";
	$dbhost="localhost";
} else {
/* db connect production */
	$dbname="instagallery";
	$user="ngoc";
	$pass="CwioKnVW";
	$dbhost="tunnel.pagodabox.com";
}


/* hash */
$numHashChars=4;

/*images*/
$defaultLimit=10;

/*status*/
$statusvalue = array("New","Approved","Blocked");


$rootPath=str_replace("/data","",dirname(__FILE__));
?>