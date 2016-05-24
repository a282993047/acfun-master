<?php
/**
 * 微信公众平台 PHP SDK 示例文件
 *
 * @author NetPuter <netputer@gmail.com>
 */

  require('./wechat/Wechat.php');
  require('./includes/db.php');

  /**
   * 微信公众平台演示类
   */
  class MyWechat extends Wechat { 
    protected function onSubscribe() {
      $this->responseText('欢迎关注，初次使用请发送您的学号给我们以便绑定您的平台账号。（格式：绑定10112130271）');
    }

    protected function onUnsubscribe() {
      // 「悄悄的我走了，正如我悄悄的来；我挥一挥衣袖，不带走一片云彩。」
    }

    protected function menuFunction($eventID,$openID) {
      //get userid
      include('./includes/db.php');
      $idquery = "select * from userbind where openid = '".$openID."'";
      $idresult = mysql_query($idquery);
      while($row = mysql_fetch_array($idresult)){
        $userid = $row['userid'];
      }
      switch ($eventID) {
        case 'user_info':
          include('./includes/checktoken.php');
          //info from weixin
          $checkquery = "SELECT AccessToken FROM accesstoken WHERE ID = 1";
          $result = mysql_query($checkquery);
          while ( $row = mysql_fetch_array ($result) ) {
            $token = $row['AccessToken'];
          }          
          $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$token."&openid=".$openID."&lang=zh_CN";
          $response_json = file_get_contents($url);
          $json_data = json_decode($response_json, true);
          if($json_data["sex"] === 1){$sex = "男";}else{$sex = "女";}
          //info from acfun db
          $getquery = "SELECT * FROM userbind LEFT JOIN userdata ON userbind.userid = userdata.userid WHERE userbind.openid = '".$openID."'";
          $dbresult = mysql_query($getquery);
          while ( $row = mysql_fetch_array ($dbresult) ) {
            $name = $row['username'];
            $depart = $row['depart'];
            $major = $row['major'];
            $class = $row['class'];
          }
          $this->responseText("昵称:".$json_data["nickname"]."\n".
                              "姓名:".$name."\n".
                              "性别:".$sex."\n".
                              "所在地:".$json_data["country"].$json_data["province"].$json_data["city"]."\n".
                              "学院:".$depart."\n".
                              "专业:".$major."系 ".$class."\n");
          break;
        case 'course':
          $cquery = "SELECT * FROM user_course left join coursedata on coursedata.cid = user_course.cid where user_course.userid = '".$userid."' order by day";
          $result = mysql_query($cquery);
          $msg = "";
          while($row = mysql_fetch_array($result)){
            $msg .= $row['cname']."\n时间：".$row['day'].$row['time']."节\n地点：".$row['place']."\n-----------------------------\n";
          }
          $this->responseText($msg);
          break;
        case 'activity':
          $fquery = "SELECT * FROM follow_activity left join activity on activity.aid = follow_activity.aid where follow_activity.userid = '".$userid."' and atime > now() order by activity.atime";
          $fresult = mysql_query($fquery);
          $activity = "";
          while($row = mysql_fetch_array($fresult)){
            $activity .= $row['aname']."\n地点：".$row['aplace']."\n时间：".$row['atime']."\n-----------------------------\n";
          }
          $this->responseText($activity);
          break;
        case 'task':
          $taskquery = "SELECT * FROM user_course right join coursetask on coursetask.cid = user_course.cid where user_course.userid = '".$userid."' and deadline > now() order by deadline";
          $result = mysql_query($taskquery);
          $taskmsg = "";
          while($row = mysql_fetch_array($result)){
            $taskmsg .= $row['task']."\n截止时间：".$row['deadline']."\n-----------------------------\n";
          }
          $this->responseText($taskmsg);
          break;
        case 'contact':
          $this->responseText('邮箱:d.ebony.ivory@gmail.com');
          break;        
        default:
          $this->responseText('发生了一些未知的错误=.=!我们正在处理中~');
          break;
      }
    }

    protected function onText() {
      if(substr($this->getRequest('content'),0,6) === '绑定'){
        include('./includes/checktoken.php');
        include('./includes/db.php');
        $bindquery = "INSERT INTO userbind ('openid','userid') VALUES ('" .$this->getRequest('FromUserName'). "','" .substr($this->getRequest('content'),6). "')";
        $result = mysql_query($bindquery);
        if($result){
           $this->responseText('绑定成功！');
        }
      }
      else{
        $this->responseText('收到了文字消息：' . $this->getRequest('content'));
      }
    }

    protected function onImage() {
      $items = array(
        new NewsResponseItem('标题一', '描述一', $this->getRequest('picurl'), $this->getRequest('picurl')),
        new NewsResponseItem('标题二', '描述二', $this->getRequest('picurl'), $this->getRequest('picurl')),
      );

      $this->responseNews($items);
    }

    /**
     * 收到地理位置消息时触发，回复收到的地理位置
     *
     * @return void
     */
    protected function onLocation() {
      $num = 1 / 0;
      // 故意触发错误，用于演示调试功能

      $this->responseText('收到了位置消息：' . $this->getRequest('location_x') . ',' . $this->getRequest('location_y'));
    }

    /**
     * 收到链接消息时触发，回复收到的链接地址
     *
     * @return void
     */
    protected function onLink() {
      $this->responseText('收到了链接：' . $this->getRequest('url'));
    }

    /**
     * 收到未知类型消息时触发，回复收到的消息类型
     *
     * @return void
     */
    protected function onUnknown() {
      $this->responseText('收到了未知类型消息：' . $this->getRequest('msgtype'));
    }

  }

  $wechat = new MyWechat('weixin', TRUE);
  $wechat->run();
