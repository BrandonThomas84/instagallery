<?php

require 'instagram.class.php';

// Initialize class
      $instagram = new Instagram(array(
        'apiKey'      => 'c6f64314c0484c1382b26739a4502cd2',
        'apiSecret'   => '0000614e9afb40b9bd78c4cef20bb7c4',
        'apiCallback' => 'http://local.instagallery.com/api/success.php' // must point to success.php
      ));

// Receive OAuth code parameter
$code = $_GET['code'];
// Check whether the user has granted access
if (true === isset($code)) {

  // Receive OAuth token object
  $data = $instagram->getOAuthToken($code);
  //echo 'Your username is: '.$data->user->username;

  // Store user access token
  $instagram->setAccessToken($data);

  // Now you can call all authenticated user methods
  // Get all user likes
//  $likes = $instagram->getUserLikes();

  // Display all user likes
 // foreach ($likes->data as $entry) {
 //   echo "<img src=\"{$entry->images->thumbnail->url}\">";
 // }




    // Set keyword for #hashtag
    $tag = 'Kasi';

    // Get latest photos according to #hashtag keyword
    $media = $instagram->getTagMedia($tag);

    // Set number of photos to show
    $limit = 50;

    // Set height and width for photos
    $size = '200';

    // Show results
    // Using for loop will cause error if there are less photos than the limit
    foreach(array_slice($media->data, 0, $limit) as $data)
    {
        // Show photo
       // print_r($media->data);
        echo '<img src="'.$data->images->thumbnail->url.'" height="'.$size.'" width="'.$size.'" alt="SOME TEXT HERE"></p>';
    }



} else {

  // Check whether an error occurred
  if (true === isset($_GET['error'])) {
    echo 'An error occurred: '.$_GET['error_description'];
  }





}

?>