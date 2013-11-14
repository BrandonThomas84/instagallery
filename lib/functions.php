<?php
require_once("../data/settings.php");
require_once("../lib/sql.php");


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

function get_hash($key){
	global $error;
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

	if(is_null($hash)|| $hash==""){ $error.="Hash for key $key could not be found or created"; }
	return $hash;
}

function get_images($hash,$limit){
	$query="SELECT site_value,image_full, image_thumb FROM hashdetail where approved=1 and hash='$hash' limit 0,$limit;";
	$result = mysql_fetchAll($query);
	$images=array();
	foreach ($result as $row) {
		$images[$row['site_value']]=array("thumb"=>$row['image_thumb'],"full"=>$row['image_full']);
	}
	return $images;
}
