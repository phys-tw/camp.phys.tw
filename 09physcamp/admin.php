<?php
include("board/function.php");
session_save_path ('session');
session_start();

if($_GET['logout']=="true") endSession();
else if($_POST['password']=="camp09board" && $_POST['which']=="board"){
    	$_SESSION['auth'] = "SYSOP";
		$_SESSION['time'] = time();
        echo "<script>location.href='board/board.php';</script>";
        exit(0);
}
else if($_POST['password']=="adregmin09camp" && $_POST['which']=="reg"){
    	$_SESSION['auth'] = "reg_SYSOP";
		$_SESSION['time'] = time();
        echo "<script>location.href='signphp/list.php';</script>";
        exit(0);
}

?>
    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-TW">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="Content-Language" content="zh-TW" />
  <meta name="keywords" content="台大物理營,臺大物理營,物理營,大學營隊,物理,Physics,Camp,NTU">
  <title>2009 台大物理營 物人子弟</title>
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <link rel="stylesheet" type="text/css" href="style/colour.css" />
</head>

<body>
  <div id="main">
    <div id="logo"><h1>2009 台大物理營 物人子弟</h1></div>
    <div id="content">
     <div id="column1">
      <div id="menu">
        <ul>
          <li><a href="index.htm">物人子弟</a></li>
          <li><a href="p1_news.htm">最新消息</a></li>
          <li><a href="p2_intro.htm">營隊介紹</a></li>
          <li><a href="p3_activity.htm">活動資訊</a></li>
          <li><a href="p4_signup.htm">報名專區</a></li>
          <li><a href="p5_faq.htm">常見問題</a></li>
          <li><a href="board/board.php">留言板</a></li>
          <li><a href="p7_contact.htm">聯絡我們</a></li>
          <li><a href="p8_ad.htm">贊助名單</a></li>
        </ul>
      </div>
      </div>
      <div id="column2">
      
        <h1>留言板管理員登入</h1>
          <form name="form2" method="post" action="admin.php">
          <p>管理密碼：<input type="password" name="password" />
          <input type="hidden" value="board" name="which" />
          <input type="submit" name="Submit" value="送出" class="submit" /></p>
          </form>
          <p><font color="red">使用完畢請務必登出。</font></p>
          <br />
          
        <h1>報名系統管理介面</h1>
          <form name="form1" method="post" action="admin.php">
          <p>管理密碼：<input type="password" name="password" />
          <input type="hidden" value="reg" name="which" />
          <input type="submit" name="Submit" value="送出" class="submit" /></p>
          </form>
          <p><font color="red">使用完畢請務必登出。</font></p>
          <h2>版本紀錄</h2>
          <ul>
          <li>2006 物理營：小連製作本系統。</li>
          <li>2007 物理營：小飛俠將 GET method 改為 POST method。無法使用刪除功能。</li>
          <li>2009 物理營：茅茅將登入資料庫的資訊移到 source 內；將整個系統改為 utf-8 編碼；將 GET method 改為 session，所有功能可用。</li>
          </ul>
          <p>註：亦可直接使用 <a href="../phpMyAdmin/">phpMyAdmin 管理介面</a>。</p>

    </div>
      </div>
    <div id="footer">
    Copyright &copy; <a href="http://www.phys.ntu.edu.tw" target="_blank">台大物理系</a>系學會 | template designed by <a href="http://www.dcarter.co.uk" target="_blank">dcarter</a> | best view in <a href="http://www.moztw.org/" target="_blank">Firefox</div>
  </div>
</body>
</html>
