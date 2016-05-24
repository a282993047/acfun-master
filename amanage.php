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

        </div><!--/.col-xs-12.col-sm-9-->

        <?php include("./includes/sidebar.php"); ?>
      </div><!--/row-->
      <?php include("./includes/footer.php"); ?>
