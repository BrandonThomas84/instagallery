<?php
require_once(str_replace("/lib","",dirname(__FILE__))."/data/settings.php");
require_once($rootPath."/lib/sql.php");


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
	if($result===false){
		$numHashChars = 5;
		//not found, generate
		$hash="build".generateRandomString($numHashChars);
		//need to check if unique
		$originurl = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

		$query="insert into hashtag (site_value,hash,lastupdate,origin) values ('$key','$hash', now(),'$originurl')";
		$result = mysql_insert($query);
	}else{
		$hash=$result['hash'];
	}	

	if(is_null($hash)|| $hash==""){ $error.="Hash for key $key could not be found or created"; }
	return $hash;
}

function get_images($hash,$limit){
	$query="SELECT id,site_value,image_full, image_thumb FROM hashdetail where approved=1 and hash='$hash' limit 0,$limit;";
	$result = mysql_fetchAll($query);
	$images=array();
	foreach ($result as $row) {
		$images[$row['id']]=array("thumb"=>$row['image_thumb'],"full"=>$row['image_full']);
	}
	return $images;
}

function findImg($img)
{
    $noImg = true;
    $mysql_find_img_query = "SELECT * FROM hashdetail WHERE image_full = '{$img}';";

    $img_fetch = mysql_fetch($mysql_find_img_query);
    if(!$img_fetch){
        $noImg = false;
    }
    return $noImg;
}