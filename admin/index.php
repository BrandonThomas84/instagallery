<?php

ini_set('display_errors',1); 
error_reporting(E_ALL);

require_once("../lib/sql.php");


echo "here";

$query="SELECT id, hash, site_value, approved, image_full, image_thumb FROM hashdetail where approved=0;";
$result = mysql_fetchAll($query);


echo '<pre>'.print_r($result,true).'</pre>';

echo "here";

?>