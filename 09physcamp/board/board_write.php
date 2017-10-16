<?php
include("function.php");
session_save_path ('../session');
//check session 
session_start();
$auth = ($_SESSION['auth']=="SYSOP");
if(time()-$_SESSION['time']>1200 || $auth==false) endSession();
else $_SESSION['time']=time();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-TW">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="Content-Language" content="zh-TW" />
  <meta name="keywords" content="台大物理營,臺大物理營,物理營,大學營隊,物理,Physics,Camp,NTU">
  <title>2009 台大物理營 物人子弟</title>
  <link rel="stylesheet" type="text/css" href="../style/style.css" />
  <link rel="stylesheet" type="text/css" href="../style/colour.css" />
  <script type="text/javascript" src="../jquery.js"></script>
<script>
    $(document).ready(function() {

        $('.warning').remove();
        
        $.get("token.php",function(txt){
          $(".secure").append('<input type="hidden" name="ts" value="'+txt+'" />');
        });

    });

    function msgcheck(){
        var str = document.getElementById("msg2984ut8t2").value;
        var str2 = document.getElementById("name").value;
        if(str=="" || str2==""){
            window.alert("請輸入姓名與留言！");
            return false;
        }
        else {
            str = str.replace(/\'/g, "’");
            str = str.replace(/情好/g, "情 好");
            str2 = str2.replace(/\'/g, "’");
            str2 = str2.replace(/情好/g, "情 好");
            
            document.getElementById("msg2984ut8t2").value = str;
            document.getElementById("name").value = str2;
            return true;
        }
    }

</script>
</head>

<body>
  <div id="main">
    <div id="logo"><h1>2009 台大物理營 物人子弟</h1></div>
    <div id="content">
     <div id="column1">
      <div id="menu">
        <ul>
          <li><a href="../index.htm">物人子弟</a></li>
          <li><a href="../p1_news.htm">最新消息</a></li>
          <li><a href="../p2_intro.htm">營隊介紹</a></li>
          <li><a href="../p3_activity.htm">活動資訊</a></li>
          <li><a href="../p4_signup.htm">報名專區</a></li>
          <li><a href="../p5_faq.htm">常見問題</a></li>
          <li><a id="selected" href="./board.php">留言板</a></li>
          <li><a href="../p7_contact.htm">聯絡我們</a></li>
          <li><a href="../p8_ad.htm">贊助名單</a></li>
        </ul>
      </div>
      </div>
      <div id="column2">
    <h1>留言板</h1>
    <p>本留言板已關閉留言功能<!--我要留言-->　|　<a href="board.php">回留言板</a><?php if($auth) echo "　|　<a href='../admin.php?logout=true'>管理者登出</a>"; ?></p>
    <br />
<?php

//if($_GET['submit']==1){
if(false){
//檢查 block list
    $blocklist = array("194.8.75.159", "210.52.15.210", "69.46.16.14", "221.255.206.249");
    $block = false;
    foreach ($blocklist as $blockip) {
        if ($_SERVER['REMOTE_ADDR'] == $blockip){
            $block = true;
            break;
        }
    }

//檢查連結數量
    $msg_http = explode('http://',$_POST['msg2984ut8t2']);
    $count_http = count($msg_http)-1;

//檢查檢核碼
    $proceed = false;
    $seconds = 60*10;
    if(isset($_POST['ts']) && isset($_COOKIE['token']) && $_COOKIE['token'] == md5('gwMV8934KJBN983whh34yu9238uIEUHGWIUHG9384GFEg'.$_POST['ts'])) $proceed = true;

    if($block){
        echo '<p>您可能是留言機器人，請重試。</p>';    
    }
    else if(!$proceed) { 
        echo '<p>您可能是留言機器人，請重試。</p>';
    }
    else if($count_http >= 4){
        echo '<p>您的留言有太多連結，請重試。</p>';
    }
    else if(((int)$_POST['ts'] + $seconds) < mktime()) {
        echo '<p>您停留在留言頁面過久，請重試。</p>';
    }
    else{ //進行留言
	$db = sqlite_open('board_qw4cuj982.db', 0666, $errorMsg);
    
    if($_POST['reply']!="" and $auth){
        $query = 'SELECT * FROM board WHERE (postTime==' . $_POST['reply'] . ');';
        $board_data = sqlite_query($db, $query);
        if(sqlite_num_rows($board_data)>0){
            $row = sqlite_fetch_array($board_data);
            $query = "INSERT OR REPLACE INTO board VALUES ('" . 
                    $row['postTime'] . "', '" . //postTime
                    $row['name'] . "', '" . //name
                    $row['master'] . "', '" . //master
                    $row['message'] . "', '" . //message
                    $_POST['msg2984ut8t2'] . "', '" . //reply
                    time() . "', '" . //replytime
                    $_SERVER['REMOTE_ADDR'] . "');"; //ip
        }
        else $query = "";
    }
    else if($_POST['name']=="物理營幹部" and $auth==false){
        $query = "";
    }
    else{
        $query = "INSERT INTO board VALUES ('" . 
                    time() . "', '" . //postTime
                    ($auth? "物理營幹部":$_POST['name']) . "', '" . //name
                    ($auth? "1":"0") . "', '" . //master
                    $_POST['msg2984ut8t2'] . "', '" . //message
                    "" . "', '" . //reply
                    "" . "', '" . //replytime
                    $_SERVER['REMOTE_ADDR'] . "');"; //ip
    }
    if($query != ""){
        if(sqlite_query($db, $query)){
            echo "<p>留言已成功送出！</p>";
            echo "<script>window.location.href='board.php';</script>";
            sqlite_close($db);
            exit(0);
        }
        else echo "<p>留言失敗，請重試。</p>";
    }
	else echo "<p>留言失敗，請重試。</p>";
	sqlite_close($db);
    }
}

if($_GET['time']!="" and $auth){
    $db = sqlite_open('board_qw4cuj982.db', 0666, $errorMsg);
    $query = 'SELECT * FROM board WHERE (postTime==' . $_GET['time'] . ');';
    $board_data = sqlite_query($db, $query);
    if(sqlite_num_rows($board_data)>0){
        $row = sqlite_fetch_array($board_data);
        echo "<p>你正要回覆&nbsp;" . preedit($row['name']) . "&nbsp的留言</p>";
        echo "<blockquote><p>" . preedit($row['message']) . "</p></blockquote><br />";
        $oldreply = $row['reply'];
        $postTime = $row['postTime'];
    }
    sqlite_close($db);
}

?>
	<!--
    <form method="post" action="board_write.php?submit=1" onsubmit="return msgcheck();" class="secure">
    <p class="warning">您必須啟用 javascript 才能正確留言。</p>
    <p>姓名：<input name="name" id="name" <?php echo ($auth? 'value="物理營幹部" disabled':''); ?> /></p>
    <p><textarea name="message" id="message" style="display:none;"></textarea><textarea name="msg2984ut8t2" id="msg2984ut8t2" style="width: 450px; height: 150px;"><?php echo $oldreply; ?></textarea></p>
    <p><input class="submit" type="submit" value="送出留言"></p>
    <input type="hidden" name="reply" id="reply" value="<?php echo $postTime; ?>"></input>
    </form>
    -->
      </div>
    </div>
     <div id="footer">
    Copyright &copy; <a href="http://www.phys.ntu.edu.tw" target="_blank">台大物理系</a>系學會 | template designed by <a href="http://www.dcarter.co.uk" target="_blank">dcarter</a> | best view in <a href="http://www.moztw.org/" target="_blank">Firefox</div>
  </div>
  </div>
</body>
</html>
