<meta charset="UTF-8">
<?php
    include "../includes/db.php";
    function input_csv($handle) { 
        $out = array (); 
        $n = 0; 
        while ($data = fgetcsv($handle, 10000)) { 
            $num = count($data); 
            for ($i = 0; $i < $num; $i++) { 
                $out[$n][$i] = $data[$i]; 
            } 
            $n++; 
        } 
        return $out; 
    }  

    $filename = $_FILES['myFile']['tmp_name'];   
    if(empty ($filename))   
    {   
        echo '请选择要导入的CSV文件！';   
        exit;   
    }
    $handle = fopen($filename, 'r');
    $result = input_csv($handle); //解析csv   
    $len_result = count($result);
    if($len_result==0)   
    {   
        echo '没有任何数据！';   
        exit;   
    }   
    for($i = 0; $i < $len_result; $i++) //循环获取各字段值   
    {   
        $userid = $result[$i][0];
        $username = $result[$i][1];   
        $sex = $result[$i][2];
        $depart = $result[$i][3];
        $major = $result[$i][4];
        $class = $result[$i][5];
        $grade = $result[$i][6];
        $birth = $result[$i][7];
        $phone = $result[$i][8];
        $role = "0";

        $sql = "INSERT INTO userdata(ID, userid, username, userpswd, sex, depart, major, class, grade, birth, phone, role)
                VALUES (NULL, '$userid','$username', '$userid', '$sex','$depart', '$major', '$class', '$grade', '$birth', '$phone', '$role')";

        $query = mysql_query($sql);
    } 
    fclose($handle); //关闭指针   

    if($query)   
    {  
        echo " <script>alert('导入成功！');window.history.back();</script>";
    }
    else
    {   
        echo " <script>alert('导入失败！');window.history.back();</script>";
    }   
?>