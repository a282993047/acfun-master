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
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
        <?php 
            include("./includes/db.php");
            $query = "SELECT * FROM userdata WHERE ";
            $require = "role = '0'";
            $order = " order by userid";
            $query = $query.$require.$order;
            $result = mysql_query($query);

            echo "<div class=\"keyword\">
                  <p>条件：</p>
                  <div></div>
                  </div>";
          
            echo "<table class='table table-bordered'>";
            echo "<thead><tr><th>学号</th><th>姓名</th><th>性别</th><th>学院</th><th>专业</th>
                  <th>班级<th>年级</th><th>生日</th><th>电话</th></tr></thead><tbody>";         

            while($row = mysql_fetch_array($result)){
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
            echo "</tbody></table>";
         ?>
        </div><!--/.col-xs-12.col-sm-9-->

        <?php include("./includes/sidebar.php"); ?>
      </div><!--/row-->
      <?php include("./includes/footer.php"); ?>
