<?php
// Supply a user id and an access token
require_once("../lib/sql.php");

$clientId = 'c6f64314c0484c1382b26739a4502cd2';
$tag = 'SAM_1234';

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

echo '<pre>';
print_r($mysql_results);
echo '</pre>';

foreach($mysql_results as $result){
// Pulls and parses data.
   $tag = $result['hash']
$insta_query = fetchData("https://api.instagram.com/v1/tags/{$tag}/media/recent?client_id={$clientId}&count=0");

$result = json_decode($insta_query);


foreach ($result->data as $post){

    echo '<a class="group" rel="group1" href="' . $post->images->standard_resolution->url . '"><img src="'. $post->images->thumbnail->url .'"></a>';

}
?>