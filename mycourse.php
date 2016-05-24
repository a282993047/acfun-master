<?php
  session_start();
  $user = $_SESSION['login_name'];
  include('./includes/checktoken.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo "课程 - ".$user ?></title>
    <link href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="./views/css/offcanvas.css" rel="stylesheet">
    <link rel="stylesheet" href="./views/css/custom.css">

  </head>
  <body>
    <?php include('./includes/header.php') ?>
    <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <?php 
            include('./includes/db.php');
            $cquery = "SELECT * FROM user_course left join coursedata on coursedata.cid = user_course.cid where user_course.userid = '".$_SESSION['login_id']."'";
            $result = mysql_query($cquery);
            while($row = mysql_fetch_array($result)){
              echo "<div class = 'courseinfo panel panel-default'>";
              echo "<a href='./coursedata.php?cid=".$row['cid']."'><span class = 'cname'>". $row['cname'] ."</span></a>";
              echo "<span class = 'teacher pull-right'>教师：". $row['teacher'] ."</span>";
              echo "<br>";
              echo "<span class = 'place'>上课地点：" . $row["place"] ."</span>";           
              echo "<span class = 'time pull-right'>上课时间：" . $row['day'].$row['time']."节</span>";
              echo "<br>";
              echo "<span class = 'score'>学分：" . $row['score'] . "</span>";
              echo "</div>";
            }
           ?>
        </div><!--/.col-xs-12.col-sm-9-->

        <?php include("./includes/sidebar.php"); ?>
      </div><!--/row-->
      <?php include("./includes/footer.php"); ?>
