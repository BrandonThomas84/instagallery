<?php
/*
row_id:
task:approve(1)/block(2)
*/

require_once("../lib/functions.php");

$return=array("error"=>"", "response"=>"fail");

$row_id=(isset($_GET['row_id']))?$_GET['row_id']:null;
$task=(isset($_GET['task']))?$_GET['task']:null;

if(is_null($row_id)){
	$return['error']="Please provide a row id;".$error;
	die(json_encode($return));
}


switch($task){
	default:
		$return['error']="Please provide a task to do";
	break;
		
	case "approve":
		$query="UPDATE `hashdetail` SET `approved`='1' WHERE `id`='$row_id';";
		if(mysql_update($query)){
			$return['response']="success";
		}
	break;

	case "block":
		$query="UPDATE `hashdetail` SET `approved`='2' WHERE `id`='$row_id';";
		if(mysql_update($query)){
			$return['response']="success";
		}
	break;
}
$return['error'].=$error;

die(json_encode($return));