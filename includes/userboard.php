<div class="row">
  <div class="col-xs-6 col-lg-4">
    <h2>今日课程</h2>
    <div class="recent-course">
      <?php 
        include('./includes/db.php');
        $weekarray=array("日","一","二","三","四","五","六");
        $weekday = "周".$weekarray[date("w")];
        $getquery = "SELECT * FROM user_course left join coursedata on coursedata.cid = user_course.cid where coursedata.day = '".$weekday."' and user_course.userid = '".$_SESSION['login_id']."'";
        $result = mysql_query($getquery);
        while($row = mysql_fetch_array($result)){
          echo "<div class='panel panel-default'><div class='panel-body'>".$row['cname']."
          <br>时间：".$row['time']."节<br>地点：".$row['place']."<br></div></div>";
        }
       ?>
    </div>
    <p><a class="btn btn-default" href="./mycourse.php" role="button">所有课程 &raquo;</a></p>
  </div><!--/.col-xs-6.col-lg-4-->
  <div class="col-xs-6 col-lg-4">
    <h2>最近任务</h2>
    <div class="recent-task">
      <?php 
        include('./includes/db.php');
        $taskquery = "SELECT * FROM user_course right join coursetask on coursetask.cid = user_course.cid where user_course.userid = '".$_SESSION['login_id']."' and deadline > now() order by deadline limit 0,3";
        $tresult = mysql_query($taskquery);
        while($row = mysql_fetch_array($tresult)){
          echo "<div class='panel panel-default'><div class='panel-body'>".$row['task']."<br><p style='font-weight:bold;margin-bottom:5px;'>截止时间：".$row['deadline']."</p></div></div>";
        }
       ?>
    </div>              
    <p><a class="btn btn-default" href="./todolist.php" role="button">更多 &raquo;</a></p>
  </div><!--/.col-xs-6.col-lg-4-->
  <div class="col-xs-6 col-lg-4">
    <h2>关注活动</h2>
      <?php 
        include('./includes/db.php');
        $fquery = "SELECT * FROM follow_activity left join activity on activity.aid = follow_activity.aid where follow_activity.userid = '".$_SESSION['login_id']."' and atime > now() order by activity.atime";
        $fresult = mysql_query($fquery);
        while($row = mysql_fetch_array($fresult)){
          echo "<div class='panel panel-default'><div class='panel-body'><p style='font-weight:bold;margin-bottom:5px;'>".$row['aname']."</p>
          <p style='margin-bottom:5px;'>地点：".$row['aplace']."</p>
          <p style='margin-bottom:5px;'>举办时间：".$row['atime']."</p></div></div>";
        }
       ?>
    <p><a class="btn btn-default" href="./myactivity.php" role="button">更多 &raquo;</a></p>
  </div><!--/.col-xs-6.col-lg-4-->
</div><!--/row-->