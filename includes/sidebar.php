<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
  <div class="list-group">
	<?php
		echo "<a href=\"./main.php\" class=\"list-group-item\" id=\"main\">我的主页</a>";  
		if($_SESSION["login_role"]==="0"){
			echo "<a href=\"./mycourse.php\" class=\"list-group-item\" id=\"mycourse\">我的课程</a>";
			echo "<a href=\"./todolist.php\" class=\"list-group-item\" id=\"todolist\">我的任务</a>";
			echo "<a href=\"./myactivity.php\" class=\"list-group-item\" id=\"myactivity\">我的活动</a>";
		}
		else if(($_SESSION["login_role"]==="1")){
			echo "<a href=\"./smanage.php\" class=\"list-group-item\" id=\"smanage\">管理学生</a>";
			echo "<a href=\"./cmanage.php\" class=\"list-group-item\" id=\"cmanage\">管理课程</a>";
			echo "<a href=\"./amanage.php\" class=\"list-group-item\" id=\"amanage\">管理活动</a>";
		}
		echo "<a href=\"./myinfo.php\" class=\"list-group-item\" id=\"myinfo\">我的信息</a>";

		$phpself =$_SERVER['PHP_SELF'];
		$str = end(explode("/",$phpself));
		if($str === "smanage.php"){
			echo "<div class='panel panel-default' style='margin-top:20%;'>
						<div class='panel-heading'>
							在这里上传您的数据
						</div>
						<div class='panel-body'>
						<form enctype='multipart/form-data' action='./class/import.php' method='post'>
							<input name='myFile' type='file'>
							<button type='submit' class = 'btn btn-default' value='上传文件' style='margin-top:10px;'>上传文件</button>
						</form>
						<a href='./class/export.php'><button type='button' class = 'btn btn-success' value='导出文件' style='margin-top:10px;'>导出文件</button></a>
					</div>
				  </div>";
		}
	?>    
  </div>
</div>