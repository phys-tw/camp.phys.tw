<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php

require_once("source/para.php") ;
$messenge = "" ;
if (time() > $deadline)
  $messenge = "報名已截止。" ;
else {
  require_once("source/db.php") ;
  $db = new DB;
  if (! $db->open()) {
    $messenge = "資料查詢失敗：無法開啟資料庫。" ;
    die($db->error()) ;
  }
  else if (! $db->query("Select * From $dataTableName Where ID = '" . $_GET['ID'] . "' Order By SignTime Desc")) {
    $messenge = "資料查詢失敗：無法讀取資料。" ;
    die($db->error()) ;
  }
  else if (! ($fetch_Assoc = $db->fetchAssoc()))
    $messenge = "找不到您的資料，可能身分證字號有誤，或報名未成功。<br>若要報名請至 <a href='sign_up_form.php' target='_self'>報名系統</a> 填寫個人資料。" ;
  else {
	$p_SignTime = strtotime($fetch_Assoc['SignTime']) ;
	$p_Name = $fetch_Assoc['Name'] ;
	$p_Sex = $fetch_Assoc['Sex'] ;
	$p_ID = $fetch_Assoc['ID'] ;
	$p_Birthday = strtotime($fetch_Assoc['Birthday']) ;
	$p_Parent = $fetch_Assoc['Parent'] ;
	$p_Email = $fetch_Assoc['Email'] ;
	$p_Phone = $fetch_Assoc['Phone'] ;
	$p_CellPhone = $fetch_Assoc['CellPhone'] ;
	$p_Address = $fetch_Assoc['Address'] ;
    $p_School = $fetch_Assoc['School'] ;
	$p_Grade = $fetch_Assoc['Grade'] ;
	$p_Introduction = $fetch_Assoc['Introduction'] ;
	$p_State = $fetch_Assoc['State'] ;
	$p_Reason = $fetch_Assoc['Reason'] ;
  }
  $db->freeResult() ;
  $db->close() ;
}

?>

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="Content-Language" content="zh-TW" />
  <meta name="keywords" content="台大物理營,臺大物理營,物理營,大學營隊,物理,Physics,Camp,NTU">
  <title>2009 台大物理營 物人子弟</title>
  <link rel="stylesheet" type="text/css" href="../style/style.css" />
  <link rel="stylesheet" type="text/css" href="../style/colour.css" />
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
          <li><a id="selected" href="../p4_signup.htm">報名專區</a></li>
          <li><a href="../p5_faq.htm">常見問題</a></li>
          <li><a href="../board/board.php">留言板</a></li>
          <li><a href="../p7_contact.htm">聯絡我們</a></li>
          <li><a href="../p8_ad.htm">贊助名單</a></li>
        </ul>
      </div>
      </div>
      <div id="column2">
        <h1>線上報名系統</h1>
        <p><a href="../p4_signup.htm">回報名專區</a>　|　
        <a href="./sign_up_form.php">我要報名</a>　|　 
        查詢資料　|　
        <a href="./edit_enter.php">修改資料</a>　|　
        <a href="./delete_enter.php">取消報名</a></p>
        <br />

	<div>
	
<?php
if ($messenge != "") {
  echo "<p align='center' class='style3'>", $messenge, "</p>" ;
  echo "<p align='center'><a href='#' onclick='location.href=\"look_up_enter.php\";'>回上一頁</a></p>" ;
}
else {
?>

	  <form action="#" method="post" name="form1" target="_self">
	    <table width="500" border="0" cellspacing="0" cellpadding="0" style="margin-left: 10px">
          <tr>
            <td class="tditem">報名時間：</td>
            <td class="style4"><?= date("Y/m/d H:i:s", $p_SignTime) ?></td>
          </tr>
          <tr>
            <td class="tditem">報名狀態：</td>
            <td class="style4"><?php
			  if ($p_State == 9) echo "此份報名資料已被取消，原因：<br>&nbsp;&nbsp;$p_Reason" ; else echo "正常" ;
			?></td>
          </tr>
          <?php if ($p_State == 9) { ?>
		  <tr>
            <td height="40" colspan="2" style="padding-top: 2px; padding-bottom: 2px" class="style3">若要重新報名請再次至 <a href="sign_up_form.php">報名系統</a> 填寫個人資料。</td>
          </tr>
		  <?php } ?>
          <tr>
            <td class="tditem">姓名：</td>
            <td class="style4"><?= $p_Name ?></td>
          </tr>
          <tr>
            <td class="tditem">性別：</td>
            <td class="style4"><?php
			  if ($p_Sex == 1) echo "男" ; else if ($p_Sex == 2) echo "女" ;
			?></td>
          </tr>
          <tr>
            <td class="tditem">身分證字號：</td>
            <td class="style4"><?= $p_ID ?></td>
          </tr>
          <tr>
            <td class="tditem">出生年月日：</td>
            <td class="style4"><?= date("Y/m/d", $p_Birthday) ?></td>
          </tr>
          <tr>
            <td class="tditem">監護人姓名：</td>
            <td class="style4"><?= $p_Parent ?></td>
          </tr>
          <tr>
            <td class="tditem">E-mail：</td>
            <td class="style4"><?= $p_Email ?></td>
          </tr>
          <tr>
            <td class="tditem">家裡電話：</td>
            <td class="style4"><?= $p_Phone ?></td>
          </tr>
          <tr>
            <td class="tditem">手機：</td>
            <td class="style4"><?= $p_CellPhone ?></td>
          </tr>
          <tr>
            <td class="tditem">地址：</td>
            <td class="style4"><?= $p_Address ?></td>
          </tr>
          <tr>
            <td class="tditem">就讀高中：</td>
            <td class="style4"><?= $p_School ?></td>
          </tr>
          <tr>
            <td class="tditem">年級：</td>
            <td class="style4"><?php
			  if ($p_Grade == 1) echo "一年級" ; else if ($p_Grade == 2) echo "二年級" ; else if ($p_Grade == 3) echo "三年級" ;
			?></td>
          </tr>
          <tr>
            <td class="tditem" valign="top" style="padding-top: 2px">自我介紹：</td>
            <td valign="top" style="padding-top: 2px" class="style4"><?= $p_Introduction ?></td>
          </tr>
        </table>
	  </form>

<?php
}
?>

	</div>
      </div>
    </div>
    <div id="footer">
    Copyright &copy; <a href="http://www.phys.ntu.edu.tw" target="_blank">台大物理系</a>系學會 | template designed by <a href="http://www.dcarter.co.uk" target="_blank">dcarter</a> | best view in <a href="http://www.moztw.org/" target="_blank">Firefox</div>
  </div>
  </div>
</body>
</html>

