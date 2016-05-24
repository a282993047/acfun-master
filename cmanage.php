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
            include("./includes/db.php");
            if(!isset($_GET['course'])){
              $query = "SELECT * FROM coursedata WHERE ";
              $require = "tid = '".$_SESSION['login_id']."'";
              $order = " order by cid";
              $query = $query.$require.$order;
              $result = mysql_query($query);
              echo "<h3 style='margin-top:0px;'>您的课程：</h3>";
              echo "<table class='table table-bordered'>";
              echo "<thead><tr><th>课程名</th><th>类型</th><th>学分</th><th>时间</th><th>节</th>
                    <th>地点</th><th>备注</th></tr></thead>";         

              while($row = mysql_fetch_array($result)){
                  echo "<tbody>";
                  echo '<tr>';
                  echo "<td><a href=\"./cmanage.php?course=".$row['cid']."\">" . $row['cname'] . "</a></td>";
                  echo "<td>" . $row['type'] . "</td>";
                  echo "<td>" . $row['score'] . ".0</td>";
                  echo "<td>" . $row['day'] . "</td>";
                  echo "<td>" . $row['time'] . "</td>";
                  echo "<td>" . $row['place'] . "</td>";
                  echo "<td>" . $row['tips'] . "</td>";
                  echo '</tr>';
                  echo "</tbody>";
              }
              echo "</table>";
            }
            else{
              $query = "SELECT * FROM coursedata WHERE cid = '".$_GET["course"]."'";
              $result = mysql_query($query);
              echo "<div class=\"row panel panel-default course-info\">";
              echo "<a class='btn btn-default' href='./mtask.php?course=".$_GET["course"]."' role='button' style='margin-bottom:10px;'>课程任务</a>";
              //echo "<a class='btn btn-info' href='#' role='button' style='margin-left:10px;margin-bottom:10px;'>导出名单</a>";
              echo "<div class=\"panel-body\">";
              while ( $row = mysql_fetch_array ($result) ) {
                echo "<div class=\"col-xs-6 col-lg-6\">
                  <p>课程：".$row['cname']."</p><hr>
                  <p>学分：".$row['score'].".0</p><hr>
                  <p>时间：".$row['day'].$row['time']."节</p></div>
                  <div class=\"col-xs-6 col-lg-6\">
                  <p>类型：".$row['type']."</p><hr>
                  <p>地点：".$row['place']."</p><hr>
                  <p>备注：".$row['tips']."</p></div></div>
                  <hr>
                ";
              }
              $squery = "select * from user_course left join userdata on user_course.userid = userdata.userid where user_course.cid = '".$_GET["course"]."' order by userdata.userid";
              $sresult = mysql_query($squery);
              echo "<table class='table table-hover table-striped'>";
              echo "<thead><tr><th>学号</th><th>姓名</th><th>性别</th><th>学院</th><th>专业</th>
                    <th>班级<th>年级</th><th>生日</th><th>电话</th></tr></thead>";         
              echo "<tbody>";
              while($row = mysql_fetch_array($sresult)){
                  echo '<tr>';
                  echo "<td>" . $row['userid'] . "</td>";
                  echo "<td>" . $row['username'] . "</td>";
                  echo "<td>" . $row['sex'] . "</td>";
                  echo "<td>" . $row['depart'] . "</td>";
                  echo "<td>" . $row['major'] . "</td>";
                  echo "<td>" . $row['class'] . "</td>";
                  echo "<td>" . $row['grade'] . "</td>";
                  echo "<td>" . $row['birth'] . "</td>";
                  echo "<td>" . $row['phone'] . "</td>";
                  echo '</tr>';
              }
              echo "</tbody>";
              echo "</table>";              
              echo "</div>";
            }
         ?>
        </div><!--/.col-xs-12.col-sm-9-->

        <?php include("./includes/sidebar.php"); ?>
      </div><!--/row-->
      <?php include("./includes/footer.php"); ?>
