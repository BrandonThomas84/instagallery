<?php
// Supply a user id and an access token
require_once(str_replace("/cron","",dirname(__FILE__))."/lib/functions.php");

$clientId = 'c6f64314c0484c1382b26739a4502cd2';


// Gets our data
function fetchData($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

$mysql_query = 'SELECT * FROM hashtag';
$mysql_results = mysql_fetchAll($mysql_query);


foreach($mysql_results as $result){
// Pulls and parses data.
   $tag = $result['hash'];
   $site_value = $result['site_value'];
   $hash = $result['hash'];

    $insta_query = fetchData("https://api.instagram.com/v1/tags/{$tag}/media/recent?client_id={$clientId}&count=0");

    $result = json_decode($insta_query);

    foreach ($result->data as $post){
        $full_img = $post->images->standard_resolution->url;
        $thumb_img = $post->images->thumbnail->url;
        $username = $post->caption->from->username;
        $text = $post->caption->text;
        $approved = 0;

        if(!findImg($full_img))
        {
            $insert_query = "INSERT INTO hashdetail (id, hash, site_value, approved, image_full, image_thumb, username, text) VALUES (NULL, '".$hash."', '".$site_value."', '0', '".$full_img."', '".$thumb_img."', '".$username."','".$text."');";
            mysql_insert($insert_query);
        }

    }
}

if(isset($_REQUEST['refresh']))
{
    header('Location:../admin/index.php');
}



