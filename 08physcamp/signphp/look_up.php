<?php

require_once("source/para.php") ;
$messenge = "" ;
if (time() > $deadline)
  $messenge = "���W�w�I��C" ;
else {
  require_once("source/db.php") ;
  $db = new DB;
  if (! $db->open()) {
    $messenge = "��Ƭd�ߥ��ѡG�L�k�}�Ҹ�Ʈw�C" ;
    die($db->error()) ;
  }
  else if (! $db->query("Select * From $dataTableName Where ID = '" . $_GET['ID'] . "' Order By SignTime Desc")) {
    $messenge = "��Ƭd�ߥ��ѡG�L�kŪ����ơC" ;
    die($db->error()) ;
  }
  else if (! ($fetch_Assoc = $db->fetchAssoc()))
    $messenge = "�䤣��z����ơA�i�ਭ���Ҧr�����~�A�γ��W�����\�C<br>�Y�n���W�Ц� <a href='sign_up_form.php' target='_self'>���W�t��</a> ��g�ӤH��ơC" ;
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

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>2008 �x�j���z�� ���̥@�� ���W�t��</title>
<style type="text/css">
<!--
body {
	background-color: #ECE9D8;
	background-attachment: fixed;
	margin-left: 0px;
	margin-top: 18px;
	margin-right: 0px;
	margin-bottom: 12px;
	background-color: transparent;
	font-size: 11pt;
	font-family: �ө���;
}
td {
	font-size: 11pt;
	font-family: �ө���;
}
p {
    margin-top: 6px;
	margin-bottom: 6px;
}
ul {
    margin-top: 6px;
    margin-bottom: 6px;
	margin-left: 32px;
}
li {
    margin-top: 3px;
    margin-bottom: 3px;
}
a {
	color: #000000;
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
.form1 {
	font-size: 11pt;
	font-family: �ө���;
	padding-left: 4px;
	padding-right: 4px;
}
.style2 {
	font-size: 15pt;
	font-weight: bold;
	font-family: �з���;
	padding-top: 4px;
	line-height: 1;
}
.style3 {color: #FF0000}
.style4 {color: #1D2C8A}
-->
</style></head>

<body>
<table width="580" border="0" cellspacing="0" cellpadding="0" style="margin-left: 12px">
  <tr><td>
	
	<table width="574" height="26" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="148" background="../images/caption_green_2.gif" class="style2">&nbsp;�d�߳��W���</td>
        <td width="18" background="../images/caption_green_3.gif"></td>
        <td background="../images/caption_green_4.gif">&nbsp;</td>
      </tr>
    </table>

	<div style="margin-top: 12px; margin-bottom: 8px">
	
<?php
if ($messenge != "") {
  echo "<p align='center' class='style3'>", $messenge, "</p>" ;
  echo "<p align='center'><a href='#' onclick='location.href=\"look_up_enter.php\";'>�^�W�@��</a></p>" ;
}
else {
?>

	  <form action="#" method="post" name="form1" target="_self">
	    <table width="560" border="0" cellspacing="0" cellpadding="0" style="margin-left: 10px">
          <tr>
            <td width="120" height="24" class="style3">���W�ɶ��G</td>
            <td width="440" class="style3"><?= date("Y/m/d H:i:s", $p_SignTime) ?></td>
          </tr>
          <tr>
            <td width="120" valign="top" style="padding-top: 2px; padding-bottom: 2px" class="style3">���W���A�G</td>
            <td width="440" valign="top" style="padding-top: 2px; padding-bottom: 2px" class="style3"><?php
			  if ($p_State == 9) echo "�������W��Ƥw�Q�����A��]�G<br>&nbsp;&nbsp;$p_Reason" ; else echo "���`" ;
			?></td>
          </tr>
          <?php if ($p_State == 9) { ?>
		  <tr>
            <td height="40" colspan="2" style="padding-top: 2px; padding-bottom: 2px" class="style3">�Y�n���s���W�ЦA���� <a href='sign_up_form.php' target='_self'>���W�t��</a> ��g�ӤH��ơC</td>
          </tr>
		  <?php } ?>
          <tr>
            <td width="120" height="24">�m�W�G</td>
            <td width="440" class="style4"><?= $p_Name ?></td>
          </tr>
          <tr>
            <td height="24">�ʧO�G</td>
            <td class="style4"><?php
			  if ($p_Sex == 1) echo "�k" ; else if ($p_Sex == 2) echo "�k" ;
			?></td>
          </tr>
          <tr>
            <td height="24">�����Ҧr���G</td>
            <td class="style4"><?= $p_ID ?></td>
          </tr>
          <tr>
            <td height="24">�X�ͦ~���G</td>
            <td class="style4"><?= date("Y/m/d", $p_Birthday) ?></td>
          </tr>
          <tr>
            <td height="24">���@�H�m�W�G</td>
            <td class="style4"><?= $p_Parent ?></td>
          </tr>
          <tr>
            <td height="24">E-mail�G</td>
            <td class="style4"><?= $p_Email ?></td>
          </tr>
          <tr>
            <td height="24">�a�̹q�ܡG</td>
            <td class="style4"><?= $p_Phone ?></td>
          </tr>
          <tr>
            <td height="24">����G</td>
            <td class="style4"><?= $p_CellPhone ?></td>
          </tr>
          <tr>
            <td height="24">�a�}�G</td>
            <td class="style4"><?= $p_Address ?></td>
          </tr>
          <tr>
            <td height="24">�NŪ�����G</td>
            <td class="style4"><?= $p_School ?></td>
          </tr>
          <tr>
            <td height="24">�~�šG</td>
            <td class="style4"><?php
			  if ($p_Grade == 1) echo "�@�~��" ; else if ($p_Grade == 2) echo "�G�~��" ; else if ($p_Grade == 3) echo "�T�~��" ;
			?></td>
          </tr>
          <tr>
            <td valign="top" style="padding-top: 2px">�ۧڤ��СG</td>
            <td valign="top" style="padding-top: 2px" class="style4"><?= $p_Introduction ?></td>
          </tr>
          <tr align="center" valign="bottom">
            <td colspan="2" height="40">
              <input name="Back" type="button" value="��^" onClick="location.href='../b4_signup.htm';">
			</td>
          </tr>
        </table>
	  </form>

<?php
}
?>

	</div>
	
	<table width="574" height="6" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td background="../images/caption_green_5.gif"></td>
      </tr>
    </table>

  </td>
  </tr>
</table>
</body>
</html>
