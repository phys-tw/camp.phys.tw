<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE>�ɮפW�Ǩt��</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<style type="text/css">
<!--
p {
	margin-left: 18px;
}
-->
</style>
</HEAD>
<BODY>

<?php

if($_GET['upload']==1){

if($_POST['password']=='uploadto08camp'){

$uploaddir = './';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
$uploadhttp = 'http://camp.phys.tw/08physcamp/upload/' . basename($_FILES['userfile']['name']);

if(file_exists($uploadfile))
	echo "<p><font color='red'>���ɮפw�s�b�A�Э��s�R�W�z���ɮ׫�A�A�դ@���C</font></p><hr>";

elseif(preg_match('/^\.\/[\w\-\._]+$/', $uploadfile)==0)
	echo "<p><font color='red'>�ɦW�ФŨϥΤ���ίS��r���A�Э��s�R�W�z���ɮ׫�A�A�դ@���C</font></p><hr>";

else{
	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)){
		echo "<p><font color='blue'><b>�ɮפw���\�W�ǡI</b></font></p>";
		echo '<p><b>�ɮצ�m�G</b><a href="' . $uploadhttp . '" target="_blank">' . $uploadhttp . '</a></p><hr>';
	
	}
	else echo "<p><font color='red'>�W�ǥ��ѡA�ЦA�դ@���C</font></p><hr>";
}
}

else  echo "<p><font color='red'>�W�ǱK�X���~</font></p><hr>";

}

?>
<script>
function check(){

var filename_pattern = new RegExp(/[\/\\][\w\-\._]+$/);
var filename = document.getElementById('userfile').value;

if(filename.match(filename_pattern)) {
    document.getElementById('waitmsg').style.display='';
    document.getElementById('wrongname').style.display='none';
    return true;
}
else{
    document.getElementById('waitmsg').style.display='none';
    document.getElementById('wrongname').style.display='';
    return false;
}
}
</script>

<span style="display:none;" id="wrongname"><p><font color='red'>�ɦW�ФŨϥΤ���ίS��r���A�Э��s�R�W�z���ɮ׫�A�A�դ@���C</font></p><hr></span>
<span style="display:none;" id="waitmsg"><p><font color='blue'><b>�W�Ǥ��A�еy��........</b></font></p><hr></span>

<p><b>���z�� 2008 �ɮפW�Ǩt��</b>�@�@�@<i>by maomao</i></p>
<form enctype="multipart/form-data" action="!upload.php?upload=1" method="POST" onsubmit="return check();">
<input type="hidden" name="MAX_FILE_SIZE" value="150000000">
<p>�ɮ׸��|�G<input name="userfile" id="userfile" type="file"></p>
<p>�W�ǱK�X�G<input name="password" type="password"></p>
<p>�Ъ`�N�A�ɦW�ФŨϥΤ���ίS��r���C</p>
<p><input type="submit" value="�W���ɮ�">�@<input type="button" value="�^�ɮצC��" onclick="location.href='./';"></p>
</form>

</BODY>
</HTML>
