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
require_once("../lib/functions.php");
require_once("../lib/sql.php");

$return=array("error"=>"", "results"=>array(), "tag"=>"");

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
		$return['tag']=get_hash($key);
		$return['results']=array("image1"=>array("thumb"=>"blahblah.jpg","full"=>"blahblah.jpg"));
	break;

	case "getTag":
		$return['tag']=get_hash($key);
	break;

}

die(json_encode($return));


function get_hash($key){
	//check if key exists in DB
		$query="select hash from hashtag where site_value='$key'";
		$result = mysql_fetch($query);
		// $res = $dbh->prepare($query);
		// 	$res->execute();
		// 	$result = $res->fetch(PDO::FETCH_ASSOC);
		
	if($result===false){
		//not found, generate
		$hash="build".generateRandomString($numHashChars);
		//need to check if unique
		
		$query="insert into hashtag (site_value,hash,lastupdate) values ('$key','$hash', now())";
		$result = mysql_insert($query);
	}else{
		$hash=$result['hash'];
	}	

	if(is_null($hash)|| $hash==""){ die("Hash for key $key could not be found or created"); }
	return $hash;
}
?>