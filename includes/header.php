<nav class="navbar navbar-fixed-top navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">AfterClass Fun</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li id="index"><a href="./index.php">首页</a></li>
        <?php if($user){echo '<li id="function"><a href="./main.php">功能</a></li>';}?>
        <li id="news"><a href="http://www.xgb.ecnu.edu.cn/system/zxtz_list.asp">公告</a></li>
        <li id="contact"><a href="#contact">联系我们</a></li>              
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
  </div><!-- /.container -->
</nav><!-- /.navbar -->