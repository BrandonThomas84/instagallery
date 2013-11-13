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

Return:


*/
require_once("../lib/sql.php");

$return=array("error"=>"", "results"=>array());

$action=(isset($_GET['a']))?$_GET['a']:null;
$key=(isset($_GET['k']))?$_GET['k']:null;
$format=(isset($_GET['f']))?$_GET['f']:"json";


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
		$return['results']=array("image1"=>array("thumb"=>"blahblah.jpg","full"=>"blahblah.jpg"));
	break;

	case "getTag":
		//check if key exists in DB
			$query="select hash from hashtag where id='$key'";
			$res = $dbh->prepare($query);
				$res->execute();
			//echo '<pre>'.print_r($res,true).'</pre>';
		//if exists return the tag
		//else generate and return
		$return['results']=array("tag"=>"randomness");
	break;

}

die(json_encode($return));
?>