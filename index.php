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
    <link rel="icon" href="../../favicon.ico">

    <title>AfterClassFun - Index</title>
    <link href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="./views/css/carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="./views/css/custom.css">
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand barcode" href="#" data-container="body" data-toggle="popover" data-placement="bottom" 
                data-content="<img src='./views/img/barcode.png'>" data-html="true">AfterClass Fun</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">首页</a></li>
                <?php if($user){echo '<li><a href="./main.php">功能</a></li>';}?>
                <li><a href="http://www.xgb.ecnu.edu.cn/system/zxtz_list.asp">公告</a></li>
                <li><a href="#contact">联系我们</a></li>              
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li>
      					<?php 
      						if($user){
      							echo '<a href="./myinfo.php">'.$user.'</a></li>
      							<li><a href="./includes/logout.php">登出</a>';
      						}
      						else {
      							echo '<a href="login.html">登录</a>';
      						}
      					 ?>                	
                </li>              	
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="./views/img/title1.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1 class="slide-title1">Welcome to AfterClass Fun!</h1>
              <p>欢迎来到AfterClass Fun在线教学辅助平台！在这里您可以获得定制化的各种课程信息，活动公告。请将鼠标移动至左上角Logo获取微信平台二维码。</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">了解更多</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="./views/img/title2.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1 class="slide-title2">个人微信定制化信息</h1>
              <p class="slide-msg2">关注我们的微信平台并绑定个人信息后，您可以通过微信平台获取到专属于您的信息。方便快捷，免去了许多繁琐的操作。令您与学习更近一步！</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">了解更多</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img src="./views/img/red-book.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>课程</h2>
          <p>自动同步你每学期的课程，生成课程列表。令你的学习生活更为便利！</p>
          <p><a class="btn btn-default" href="<?php if(!$user) echo './login.html';else echo './mycourse.php'; ?>" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img src="./views/img/list.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>任务</h2>
          <p>整合你课程、活动中被布置的任务，生成任务列表。让我们替你规划时间，让你的生活更有效率！</p>
          <p><a class="btn btn-default" href="<?php if(!$user) echo './login.html';else echo './todolist.php'; ?>" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img src="./views/img/activity.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>活动</h2>
          <p>查找学校里各种丰富的活动，根据的你的喜好向你推荐你可能喜欢的活动。让你的生活更加精彩！</p>
          <p><a class="btn btn-default" href="<?php if(!$user) echo './login.html';else echo './myactivity.php'; ?>" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

<!--       <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">数据绑定</h2>
          <p class="lead">通过绑定微信号，实现数据的双向同步。关注我们的微信公共平台，方便的获取最新最快的讯息！</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-5">
          <img class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
        <div class="col-md-7">
          <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
      </div> -->
      <hr class="featurette-divider">
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2016 ECNU SIST, Inc. &middot; By XUE&LIAO&LIU</p>
      </footer>

    </div><!-- /.container -->
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="./views/js/doc.min.js"></script>
    <script>
      $(".barcode").on("mouseenter mouseleave",function(){
        $(".barcode").popover('toggle');
      });
    </script>
  </body>
</html>
