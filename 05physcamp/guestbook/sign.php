<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>G</title>
<style type="text/css">
.d4s { font-family:"Times New Roman",Verdana,Helvetica,Arial,sans-serif; font-size:9pt }
.d4b { font-family:"Times New Roman",Verdana,Helvetica,Arial,sans-serif; font-size:11pt }
a:hover { color:#FFC933; text-decoration:none }
a:link { text-decoration:none }
a:visited { text-decoration:none }
</style>

<?php
function make_seed() {
    list($usec, $sec) = explode(' ', microtime());
    return (float) $sec + ((float) $usec * 100000);
}
?>

</head>
<body bgcolor=#ffffff topmargin=2 leftmargin=5 link=#777777 vlink=#777777 alink=#777777>
<span class=d4s>
<font color=#bbbbbb>
§&nbsp;
<?php
$succ=1;
if ($username=="") {
echo ("name can't be empty");
$succ=0;
} elseif ($comments=="") {
echo ("message can't be empty");
$succ=0;
} else {
$file=fopen("guestbook.txt","a");
if($userurl=="http://") $userurl="";
$ad2=getenv("REMOTE_ADDR");
fputs($file,"guestbook∥" . date("Y/m/d∥H:i:s∥") . stripslashes($username) . "∥" . $ad2 . " / " . gethostbyaddr($ad2) . "∥" . stripslashes(htmlspecialchars($useremail)) . "∥" . stripslashes(htmlspecialchars($userurl)) . "∥" . stripslashes(str_replace("\r\n","<br>",$comments)) . "\n");
echo ("success");
fclose($file);
}
srand(make_seed());
$randval = rand(1000,2000);
if ($succ) echo ("<br>&nbsp;&nbsp;&nbsp;&nbsp;<a href=guestbook.php?timestamp" . $randval . ">back</a>");
else echo("<br>&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:history.back()'>back</a>");
?>

</font>
</span>

</body>
</html>
