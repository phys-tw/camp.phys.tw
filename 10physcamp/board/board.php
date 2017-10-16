<?php
include("function.php");
session_save_path ('../session');
$db = sqlite_open('board_qV3j4G83Ki4.db', 0666, $errorMsg);
//check session 
session_start();
$auth = ($_SESSION['auth']=="SYSOP");
if(time()-$_SESSION['time']>1200 || $auth==false) endSession();
else $_SESSION['time']=time();

//count page and open db
$limit = 10;

$board_data = sqlite_query($db, 'SELECT postTime FROM board;');
$ttl_pages = ceil(sqlite_num_rows($board_data)/$limit);

if($ttl_pages==0)$ttl_pages=1;
$page = floor($_GET['page']);
if($page<1) $page = 1;
elseif ($page>$ttl_pages) $page = $ttl_pages;

//delete message
if($_GET['delete']=="1" and $auth){
	$query = 'DELETE FROM board WHERE (postTime==' . $_GET['time'] . ');';
	if(sqlite_query($db, $query))
		echo "<script>window.location.href='board.php?page=" . $page . "';</script>";
	else echo "刪除失敗！";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-TW">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="Content-Language" content="zh-TW" />
  <meta name="keywords" content="台大物理營,臺大物理營,物理營,大學營隊,物理,Physics,Camp,NTU">
  <title>2010 台大物理營 不可能的任物</title>
  <link rel="stylesheet" type="text/css" href="../style/style.css" />
  <link rel="stylesheet" type="text/css" href="../style/green.css" />
</head>

<body>
  <div id="main">
    <div id="logo"><h1>2010 台大物理營 不可能的任物</h1></div>
    <div id="content">
      <div id="menu">
        <ul>
          <li><a href="../index.htm">不可能的任物</a></li>
          <li><a href="../p2_intro.htm">營隊簡史</a></li>
          <li><a href="../p3_activity.htm">活動資訊</a></li>
          <li><a href="../p4_signup.htm">錄取名單</a></li>
          <li><a href="../p5_faq.htm">活動剪影</a></li>
          <li><a id="selected" href="../board/board.php">留言板</a></li>
          <li><a href="../p7_contact.htm">聯絡方式</a></li>
        </ul>
      </div>
      <div id="column1">
        <div class="sidebaritem">  
	<div class="sbihead">
            <h1>最新消息</h1>
	  </div>
          <!-- **** INSERT NEWS ITEMS HERE **** -->
          <h2>2010/02/17</h2>
          <font color="red"><pnews>照片放上去囉</pnews></font>
          <h2>2010/02/08</h2>
          <pnews>開始建置活動剪影</pnews>
          <h2>2010/01/16</h2>
          <pnews>備取已截止</pnews>
          <h2>2009/12/21</h2>
          <pnews>公布匯款退費相關事宜</pnews>
          <pnews>請參見錄取名單下方</pnews>
          <h2>2009/12/21</h2>
          <pnews>正取與備取名單已出爐</pnews>
          <h2>2009/12/19</h2>
          <pnews>報名已截止</pnews>
          <h2>2009/12/16</h2>
          <pnews>行前通知已上線</pnews>
          <h2>2009/11/22</h2>
          <pnews>網站正式上線</pnews>
		  <h2>2009/11/12</h2>
          <pnews>網站製作開始</pnews>
          <h2></h2>
          <p></p>
          <p></p>
        </div>
      </div>
      <div id="column2">
    <h1>留言板</h1>

<p><a href="board_write.php">我要留言</a></p>

<table width="500" cellspacing="0" style="border: 0px;">

<tr><td align="left" style="border: 0px; font-size: 80%;">
<?php
echo '您目前在第&nbsp;' . $page . '&nbsp;頁，共&nbsp;' . $ttl_pages . '&nbsp;頁</td><td align="right"  style="border: 0px; font-size: 80%;" >';
if ($page == 1 and $ttl_pages == 1)
	echo '第一頁';
elseif ($page == 1)
	echo '<font color="#808080">第一頁</font>　' . 
		 '<font color="#808080">上一頁</font>　　' . 
		 '<a href="board.php?page=2">下一頁</a>　' . 
		 '<a href="board.php?page=' . $ttl_pages . '">最末頁</a>';
elseif ($page == $ttl_pages)
	echo '<a href="board.php?page=1">第一頁</a>　' . 
		 '<a href="board.php?page=' . ($page-1) . '">上一頁</a>　　' . 
		 '<font color="#808080">下一頁</font>　' . 
		 '<font color="#808080">最末頁</font>';
else
	echo '<a href="board.php?page=1">第一頁</a>　' . 
		 '<a href="board.php?page=' . ($page-1) . '">上一頁</a>　　' . 
		 '<a href="board.php?page=' . ($page+1) . '">下一頁</a>　' . 
		 '<a href="board.php?page=' . $ttl_pages . '">最末頁</a>';
?>
</td></tr>

<tr><td colspan="2" style="border: 0px;">

<?php

$query = 'SELECT * FROM board ORDER BY postTime DESC LIMIT ' . $limit . ' OFFSET ' . (($page-1)*$limit);
$board_data = sqlite_query($db, $query);
$master = '<font color="#495845"><b>物理營幹部</b></font>';

while ($row = sqlite_fetch_array($board_data)){
    
	echo "<hr><p class='boardsmall'><u>" . ($row['master']=="1"? $master:preedit(htmlspecialchars($row['name'],ENT_NOQUOTES,"UTF-8"))) . "&nbsp;說：</u></p>";
    
    echo "<p>" . preedit($row['message']) . "</p>";
    
    echo "<p class='boardsmall'><i>" . date('Y/m/d H:i:s', $row['postTime']) . "</i>";
    if($auth) echo "　　<a href='board.php?page=$page&delete=1&time=" . $row['postTime'] . "' onclick='return window.confirm(\"確認刪除此篇留言者為" . preedit($row['name']) . "之留言？\\n此動作無法復原！ \");'>刪除</a>　　<a href='board_write.php?time=" . $row['postTime'] . "'>回覆</a>　　IP = " . $row['ip']; 
    echo  "</p>";
    
    if ($row['reply']!=""){
        echo "<blockquote><p class='boardsmall'><u>" . $master . "&nbsp;回覆：</u></p>";
        echo "<p>" . preedit($row['reply']) . "</p>";
        echo "<p class='boardsmall'><i>" . date('Y/m/d H:i:s', $row['replytime']) . "</i></p></blockquote>";
    }

}

sqlite_close($db);

?>

</td></tr>

<tr><td colspan="2" style="border: 0px;"><hr></td></tr>

<tr><td align="left" style="border: 0px; font-size: 80%;">
<?php
echo '您目前在第&nbsp;' . $page . '&nbsp;頁，共&nbsp;' . $ttl_pages . '&nbsp;頁</td><td align="right" style="border: 0px; font-size: 80%;">';
if ($page == 1 and $ttl_pages == 1)
	echo '第一頁';
elseif ($page == 1)
	echo '<font color="#808080">第一頁</font>　' . 
		 '<font color="#808080">上一頁</font>　　' . 
		 '<a href="board.php?page=2">下一頁</a>　' . 
		 '<a href="board.php?page=' . $ttl_pages . '">最末頁</a>';
elseif ($page == $ttl_pages)
	echo '<a href="board.php?page=1">第一頁</a>　' . 
		 '<a href="board.php?page=' . ($page-1) . '">上一頁</a>　　' . 
		 '<font color="#808080">下一頁</font>　' . 
		 '<font color="#808080">最末頁</font>';
else
	echo '<a href="board.php?page=1">第一頁</a>　' . 
		 '<a href="board.php?page=' . ($page-1) . '">上一頁</a>　　' . 
		 '<a href="board.php?page=' . ($page+1) . '">下一頁</a>　' . 
		 '<a href="board.php?page=' . $ttl_pages . '">最末頁</a>';
?>
</td></tr>

</table>
      </div>
    </div>
     <div id="footer">
    Copyright &copy; <a href="http://www.phys.ntu.edu.tw" target="_blank">台大物理系</a>系學會 | template designed by <a href="http://www.dcarter.co.uk" target="_blank">dcarter</a> | best view in <a href="http://www.moztw.org/" target="_blank">Firefox</div>
  </div>
  </div>
</body>
</html>
