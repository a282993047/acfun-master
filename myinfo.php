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
    <title><?php echo "个人信息 - ".$user ?></title>
    <link href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="./views/css/offcanvas.css" rel="stylesheet">
    <link rel="stylesheet" href="./views/css/custom.css">
  </head>

  <body>
    <?php include('./includes/header.php') ?>
    <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
          <div class="jumbotron info-head">
            <?php
            $con =  mysql_connect("localhost","root","");
            mysql_query("SET NAMES 'utf8'",$con);
            mysql_select_db("app_afterclassfun", $con);
            $getquery = "SELECT * FROM userdata WHERE userid = '".$_SESSION['login_id']."'";
                $dbresult = mysql_query($getquery);
                while ( $row = mysql_fetch_array ($dbresult) ) {
                  $name = $row    ['username'];$depart = $row['depart'];$major = $row['major'];
                  $class = $row['class'];$grade = $row['grade'];$birth = $row['birth'];
                  $phone = $row['phone'];$sex = $row['sex'];
                }
             ?>
            <p id="info-name"><?php echo $name ?></p>
            <p id="info-depart"><?php echo $depart ?></p>
          </div>
          <div class="row info-body">
            <div class="col-xs-6 col-lg-6">
              <p>年级：<?php echo $grade."级" ?></p>
              <hr>
              <p>系别：<?php echo $major ?></p>
              <hr>
              <p>班级：<?php echo $class ?></p>
            </div>
            <div class="col-xs-6 col-lg-6">
              <p>性别：<?php echo $sex ?></p>
              <hr>
              <p>生日：<?php echo $birth ?></p>
              <hr>
              <p>电话：<?php echo $phone ?> </p>
            </div>
          </div>
        </div><!--/.col-xs-12.col-sm-9-->

        <?php include("./includes/sidebar.php"); ?>
      </div><!--/row-->
      <?php include("./includes/footer.php"); ?>
