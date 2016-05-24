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
            $fquery = "SELECT * FROM follow_activity left join activity on activity.aid = follow_activity.aid where follow_activity.userid = '".$_SESSION['login_id']."'and atime > now() order by activity.atime";
            $cquery = "SELECT * FROM activity where activity.aid not in (select aid from follow_activity where follow_activity.userid = '".$_SESSION['login_id']."' ) and atime > now() order by activity.atime";
            $fresult = mysql_query($fquery);
            $cresult = mysql_query($cquery);
            echo "<h4 style='margin-bottom:25px;'>关注活动列表：
            <img src='./views/img/loading.gif' class='loading-img pull-right' id='ld1'></h4>";
            while($row = mysql_fetch_array($fresult)){
              echo "<div class = 'courseinfo panel panel-default'>";
              echo "<span class = 'cname'>". $row['aname'] ."</span></a>";
              echo "<span class = 'teacher pull-right'>主办方：". $row['aholder'] ."</span>";
              echo "<br>";
              echo "<span class = 'place'>地点：" . $row["aplace"] ."</span>";           
              echo "<span class = 'time pull-right'>时间：".$row['atime']."</span>";
              echo "<br>";
              echo "<span class = 'score'>主要内容：" . $row['adetail'] . "</span>";
              echo "<button class='btn btn-default pull-right btn-unavailable btn-follow' id='".$row['aid']."'>关注</button>";
              echo "<button class='btn btn-success pull-right btn-notfollow' id='".$row['aid']."'>已关注</button>";
              echo "</div>";
            }
            echo "<hr><h4 style='margin-bottom:25px;'>近期活动列表：
            <img src='./views/img/loading.gif' class='loading-img pull-right' id='ld2'></h4>";
            while($row = mysql_fetch_array($cresult)){
              echo "<div class = 'courseinfo panel panel-default'>";
              echo "<span class = 'cname'>". $row['aname'] ."</span></a>";
              echo "<span class = 'teacher pull-right'>主办方：". $row['aholder'] ."</span>";
              echo "<br>";
              echo "<span class = 'place'>地点：" . $row["aplace"] ."</span>";           
              echo "<span class = 'time pull-right'>时间：".$row['atime']."</span>";
              echo "<br>";
              echo "<span class = 'score'>主要内容：" . $row['adetail'] . "</span>";
              echo "<button class='btn btn-default pull-right btn-follow' id='".$row['aid']."'>关注</button>";
              echo "<button class='btn btn-success pull-right btn-unavailable btn-notfollow' id='".$row['aid']."'>已关注</button>";
              echo "</div>";
            }
           ?>
        </div><!--/.col-xs-12.col-sm-9-->

        <?php include("./includes/sidebar.php"); ?>
      </div><!--/row-->
      <?php include("./includes/footer.php"); ?>
