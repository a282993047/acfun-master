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
          <div class="panel panel-default">
            <div class="panel-body">
            <?php 
              include('./includes/db.php');
              $cquery = "SELECT * FROM coursedata where cid = '".$_GET['cid']."'";
              $tquery = "SELECT * FROM coursetask where cid = '".$_GET['cid']."'";
              $cresult = mysql_query($cquery);
              $tresult = mysql_query($tquery);
              while($row = mysql_fetch_array($cresult)){
                $cname = $row['cname'];$teacher = $row['teacher'];$type = $row['type'];
                $score = $row['score'];$day = $row['day'];$time = $row['time'];
                $place = $row['place'];$tips = $row['tips'];
              }
              if(!$tips) $tips = "无";
            ?>
            <div class="row">
              <h4 style="margin-left:15px;margin-bottom:25px;">详细信息：</h4>
              <div class="col-xs-6 col-lg-6">
                <p>名称：<?php echo $cname ?></p>
                <hr>
                <p>教师：<?php echo $teacher ?></p>
                <hr>
                <p>类别：<?php echo $type ?></p>
                <hr>
                <p>备注：<?php echo $tips ?></p>
              </div>
              <div class="col-xs-6 col-lg-6">
                <p>学分：<?php echo $score.".0" ?></p>
                <hr>
                <p>上课时间：<?php echo $day.$time."节" ?></p>
                <hr>
                <p>地点：<?php echo $place ?> </p>
                <hr> 
              </div>
            </div>
            <h4 style="margin-top:30px;">任务列表：</h4>
            <table class="table table-striped">
              <thead><tr><th>布置时间</th><th>截止时间</th><th>内容</th><th>成绩</th></tr></thead>
              <tbody><?php 
               while($row = mysql_fetch_array($tresult)){
                echo "<tr><td>".$row['createtime']."</td><th>".$row['deadline']."</th><td>".$row['task']."</td><td>".$row['score']."</td></tr>";
               }               
               ?></tbody>
            </table>
            </div>
          </div>
        </div><!--/.col-xs-12.col-sm-9-->

        <?php include("./includes/sidebar.php"); ?>
      </div><!--/row-->
      <?php include("./includes/footer.php"); ?>