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
    <link rel="stylesheet" href="./views/css/bootstrap-datetimepicker.min.css">
    <script>
      function tasksub(){
          document.getElementById("taskform").submit();
      }
    </script>
  </head>

  <body>
    <?php include('./includes/header.php') ?>
    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <?php 
            include('./includes/db.php');
            $taskquery = "SELECT * FROM coursetask where cid = '".$_GET['course']."' order by deadline";
            $tresult = mysql_query($taskquery); 
            echo "<div style='height:50px;'><h4 style='position:absolute;'>任务列表：</h4>
            <button type'button' class='btn btn-success pull-right' data-toggle='modal' data-target='#myModal'>+添加</button>
            </div>";
            while($row = mysql_fetch_array($tresult)){
              echo "<div class = 'courseinfo panel panel-default'>";
              echo "<span class = 'teacher'>". $row['task'] ."</span>";
              echo "<br><hr>";
              echo "<span class = 'createtime'>布置时间：" . $row["createtime"] ."</span>";           
              echo "<span class = 'deadline'>截止时间：" . $row['deadline']."</span>";
              echo "<span class = 'lasttime pull-right'>剩余".intval((strtotime($row['deadline'])-strtotime(date("  Y-m-d H:i:s")))/86400)."天</span>";
              echo "<br>";
              echo "</div>";
            }
           ?>
        </div><!--/.col-xs-12.col-sm-9-->

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">添加任务</h4>
              </div>
              <div class="modal-body">
              <form action="./class/additem.php?type=1" method="post" role="form" id="taskform">
                <div class="input-group" style="margin-left:10%;margin-right:10%;">
                  <span class="input-group-addon">#</span>
                  <input size="16" type="text" class="form-control form_datetime" placeholder="截止时间" reaquired="" readonly name="deadline">
                </div>
                <br>
                <div class="input-group" style="margin-left:10%;margin-right:10%;">
                  <span class="input-group-addon">$</span>
                  <input type="text" class="form-control name" placeholder="请输入详细内容" name="detail" required="">
                </div>
              </form> 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary" id="addtask" course="<?php echo $_GET['course']?>">添加</button>
              </div>
            </div>
          </div>
        </div>

        <?php include("./includes/sidebar.php"); ?>
      </div><!--/row-->
      <?php include("./includes/footer.php"); ?>
