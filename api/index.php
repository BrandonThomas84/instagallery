<?php

/* 
index.php?a=action&k=key&f=format

Actions (a):
	getPhotos
	getTag

Key (k):
	Unique id passed to the service per product.

Fromat (f):
	Return format
	-j for json

Optional:	
Limit (l):
	Upper limit for number of images to return... default is set in the settings file

Return:
	{"error":"<error_message>","results":{"<site_key>":{"thumb":"<url>","full":"<url>"}},"tag":"<tag_name>"}

*/
require_once("../lib/functions.php");

$return=array("error"=>"", "results"=>array(), "tag"=>"");

$action=(isset($_GET['a']))?$_GET['a']:null;
$key=(isset($_GET['k']))?$_GET['k']:null;
$format=(isset($_GET['f']))?$_GET['f']:"json";
$limit=(isset($_GET['l']))?$_GET['l']:$defaultLimit;


//default with no parameters
if(is_null($action) || is_null($key)){
	$return['error']="Key and Action are required, please see documentation!";
	die(json_encode($return));
}


switch($action){
	default:
		$return['error']="Valid actions are getPhotos/GetTags";
	break;

	case "getPhotos":
		$return['tag']=get_hash($key);
		$return['results']=get_images($return['tag'],$limit);
	break;

	case "getTag": 
		$return['tag']=get_hash($key);
	break;

}
$return['error']=$return['error']."; ".$error;

die(json_encode($return));

?>