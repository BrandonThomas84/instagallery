<?php

ini_set('display_errors',1); 
error_reporting(E_ALL);

require_once("../lib/sql.php");

$query="SELECT id, hash, site_value, approved, image_full, image_thumb FROM hashdetail where approved=0;";
$result = mysql_fetchAll($query);

echo "<table border=1>";
foreach ($result as $row)
{
   echo "<tr>";
   echo "<td>".$row["id"]."</td>";
   echo "<td>".$row["hash"]."</td>";
   echo "<td>".$row["site_value"]."</td>";
   echo "<td>".$row["image_thumb"]."</td>";
   echo "</tr>";
}
echo "</table>";

//echo '<pre>'.print_r($result,true).'</pre>';


?>