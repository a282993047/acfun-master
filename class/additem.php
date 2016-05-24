<?php
    session_start();
    include("../includes/db.php");
    $cid = $_POST['cid'];
    $deadline = $_POST['deadline'];
    $task = $_POST['task'];
    $query = "INSERT INTO coursetask(cid,task,deadline) VALUES ('$cid','$task','$deadline')";
    $result = mysql_query($query);
    mysql_close($con);
?>