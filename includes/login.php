<?php
    session_start();
    include 'db.php';

    $name = $_POST["user_name"]; 
    $pswd = $_POST["user_pswd"];
    $role = $_GET["role"];

    $query = sprintf("SELECT * FROM userdata where userid= '%s' and userpswd = '%s' and role = '%s'",
    mysql_real_escape_string($name),mysql_real_escape_string($pswd),mysql_real_escape_string($role));        


    $result = mysql_query($query);
    $num=mysql_num_rows($result);
    if($num == 0){
        echo 'Login failed!';
        header("Refresh:2;url=../login.html");
    }
    else{
        while($row = mysql_fetch_array($result)){
            $_SESSION['login_id'] = $row['userid'];
            $_SESSION['login_name'] = $row['username'];
            $_SESSION['login_role'] = $row['role'];
        }
        echo "<script>"; 
        echo "location.href='../'"; 
        echo "</script>"; 
    }
    mysql_close($con);        
?>