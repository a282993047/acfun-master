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

    <title><?php echo "主页 - ".$user ?></title>

    <!-- Bootstrap core CSS -->
    <link href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
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
            $taskquery = "SELECT * FROM user_course right join coursetask on coursetask.cid = user_course.cid where user_course.userid = '".$_SESSION['login_id']."' and deadline > now() order by deadline";
            $tresult = mysql_query($taskquery); 
            while($row = mysql_fetch_array($tresult)){
              $cquery = "select * from coursedata where cid = ".$row['cid'];
              $cresult = mysql_query($cquery);
              while($crow = mysql_fetch_array($cresult)){$cid = $crow['cid'];$cname=$crow['cname'];}
              echo "<div class = 'courseinfo panel panel-default'>";
              echo "<a href='./coursedata.php?cid=".$cid."'><span class = 'cname'>". $cname ."</span></a>";
              echo "<br><span class = 'teacher'>". $row['task'] ."</span>";
              echo "<br><hr>";
              echo "<span class = 'createtime'>布置时间：" . $row["createtime"] ."</span>";           
              echo "<span class = 'deadline'>截止时间：" . $row['deadline']."</span>";
              echo "<span class = 'lasttime pull-right'>剩余".intval((strtotime($row['deadline'])-strtotime(date("  Y-m-d H:i:s")))/86400)."天</span>";
              echo "<br>";
              echo "</div>";
            }
           ?>
        </div><!--/.col-xs-12.col-sm-9-->

        <?php include("./includes/sidebar.php"); ?>
      </div><!--/row-->
      <?php include("./includes/footer.php"); ?>
