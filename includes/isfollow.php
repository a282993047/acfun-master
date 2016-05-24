<?php
	session_start();
	include("db.php");
	$id = $_POST['id'];
	$token = $_POST['token'];
	if($token === '1'){
		$query = "INSERT INTO follow_activity(userid, aid) VALUES ('".$_SESSION['login_id']."','".$id."')";
		$result = mysql_query($query);
		mysql_close($con);
	}
	else{
		$query = "DELETE FROM follow_activity WHERE userid = '".$_SESSION['login_id']."' and aid = '".$id."'";
		$result = mysql_query($query);
		mysql_close($con);
	}
	echo $query;
 ?>