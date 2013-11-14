<?php
require_once("../data/settings.php");
try {
	$dbh = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass, array(
	    PDO::ATTR_PERSISTENT => true
	));

} catch (PDOException $e) {
    print "Mysql Error!: " . $e->getMessage() . "<br/>";
    die();
}

function mysql_fetch($query){
	global $dbh;
	$res = $dbh->prepare($query);
	if (!$res) {
	    echo "\nPDO::errorInfo():\n";
	    print_r($dbh->errorInfo());
	}
	$res->execute();
	if (!$res) {
	    echo "\nPDO::errorInfo():\n";
	    echo '<pre>'.print_r($dbh->errorInfo(),true).'</pre>';
	}
	return $res->fetch(PDO::FETCH_ASSOC);
}

function mysql_insert($query){
	global $dbh;
	$res = $dbh->prepare($query);
	if (!$res) {
	    echo "\nPDO::errorInfo():\n";
	    print_r($dbh->errorInfo());
	}
	$res->execute();
	$errors=$res->errorInfo();
	if(is_array($errors) && !empty($errors[2])){
		echo $query."<br>";
		echo '<pre>'.print_r($res->errorInfo(),true).'</pre>';
		die();
	}
	
	if (!$res) {
	    echo "\nPDO::errorInfo():\n";
	    echo '<pre>'.print_r($dbh->errorInfo(),true).'</pre>';
	    die();
	}else{
		//return $res->lastInsertId();
	}
}

?>