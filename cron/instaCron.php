<?php
// Supply a user id and an access token

$clientId = 'c6f64314c0484c1382b26739a4502cd2';
$tag = 'Kasi';

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

// Pulls and parses data.
$query = fetchData("https://api.instagram.com/v1/tags/{$tag}/media/recent?client_id={$clientId}&count=0");

$result = json_decode($query);

?>
<?php foreach ($result->data as $post): ?>

    <!-- Renders images. @Options (thumbnail,low_resoulution, high_resolution) -->
    <a class="group" rel="group1" href="<?php echo $post->images->standard_resolution->url ?>"><img src="<?php echo $post->images->thumbnail->url ?>"></a>
<?php endforeach ?>
</html>