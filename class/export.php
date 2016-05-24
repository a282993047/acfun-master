<?php 
	include "../includes/db.php";
	error_reporting(E_ALL^E_NOTICE);
	function export_csv($filename,$data)   
	{   
	    header("Content-type:text/csv");   
	    header("Content-Disposition:attachment;filename=".$filename);   
	    header('Cache-Control:must-revalidate,post-check=0,pre-check=0');   
	    header('Expires:0');   
	    header('Pragma:public');   
	    echo $data;   
	}
	$query = "select * from userdata where 1";

	$result = mysql_query($query);
	$str = "ID,学号,姓名,密码,性别,学院,专业,班级,年级,生日,电话,权限\n";
	while($row = mysql_fetch_array($result)){
		$str .= $row['ID'].",".$row['userid'].",".$row['username'].",".$row['userpswd'].",".$row['sex'].",".$row['depart']
				.",".$row['major'].",".$row['class'].",".$row['grade'].",".$row['birth'].",".$row['phone'].",".$row['role']."\n";
	}
	$filename = "UserData".date('Ymd').".csv";
	export_csv($filename,$str);
 ?>
