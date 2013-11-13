<?php
require_once("../data/settings.php");
$result=array();

try {
	$dbh = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass, array(
	    PDO::ATTR_PERSISTENT => true
	));

} catch (PDOException $e) {
    print "Mysql Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>