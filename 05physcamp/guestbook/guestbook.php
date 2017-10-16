<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>G</title>
<style type="text/css">
.d4s { font-family:"Times New Roman",Verdana,Helvetica,Arial,sans-serif; font-size:10pt }
.d4b { font-family:"Times New Roman",Verdana,Helvetica,Arial,sans-serif; font-size:12pt }
a:hover { color:#FFC933; text-decoration:none }
a:link { text-decoration:none }
a:visited { text-decoration:none }
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<style type="text/css">
<!--
.fix {
	position: static;
	height: 33px;
	width: 428px;
}
-->
</style>
</head>
<body bgcolor=#ffffff topmargin=20 leftmargin=15 link=#777777 vlink=#777777 alink=#777777>
<div id="Layer1" style="position:absolute; left:430; top:23px; width:267px; height:98px; z-index:1;" class="fix"> 
  <form name=guestbook method=post action=sign.php>
    <p align="left"><strong><span class=d4s><font color=#666666>§&nbsp;name<br>
      <input type=text name=username size=32 style='color:rgb(0,0,0);font-size:11pt;font-family:"Times New Roman",Verdana,Helvetica,Arial,sans-serif;border:0px solid #FFFFFF;background-color:#F7FF7F'>
      <br>
      §&nbsp;email<br>
      <input type=text name=useremail size=32 style='color:rgb(0,0,0);font-size:11pt;font-family:"Times New Roman",Verdana,Helvetica,Arial,sans-serif;border:0px solid #FFFFFF;background-color:#E7FF6F'>
      <br>
      §&nbsp;homepage<br>
      <input type=text name=userurl value=http:// size=32 style='color:rgb(0,0,0);font-size:11pt;font-family:"Times New Roman",Verdana,Helvetica,Arial,sans-serif;border:0px solid #FFFFFF;background-color:#D7FF5F'>
      <br>
      </font></span></strong><strong><span class=d4s><font color=#666666>§&nbsp;message<br>
      <textarea name=comments rows=7 cols=42 style='color:rgb(0,0,0);font-size:11pt;font-family:"Times New Roman",Verdana,Helvetica,Arial,sans-serif;border:0px solid #FFFFFF;background-color:#C7FF4F'></textarea>
      <br>
      <input name="submit" type=submit style='font-family:"Times New Roman",Verdana,Helvetica,Arial,sans-serif; font-size:9pt' value="送出">
      <input name="submit" type=reset style='font-family:"Times New Roman",Verdana,Helvetica,Arial,sans-serif; font-size:9pt' value="清空">
      </font></span></strong> </p>
  </form>
  <p>&nbsp;</p>
</div>
<table width="401" border=1 cellpadding=5 cellspacing=0 bordercolor="#000000">
  <tr> 
    <td width=393 valign=top> <p><strong><span class=d4s><font color=#000000>is 
        for Guestbook</font></span></strong> </p>
      <p><strong><br>
        <?php
define("ONEPAGE",10);
$saveMessage=file("guestbook.txt");
$total=count($saveMessage);
if ($page=="") $page=1;
$i=$total-(($page-1)*ONEPAGE);
$end=$i-ONEPAGE;
if ($end<0) $end=0;
for (;$i>$end;$i--) {
	$str=$saveMessage[$i-1];
	$pat="∥";
	$arr=split($pat,$str);
	echo ("<span class=d4s><font color=#000000>§&nbsp;$arr[3]</font><br>");
	echo ("<font color=#bbbbbb>&nbsp;&nbsp;&nbsp;$arr[1]");
	if (date("Y/m/d")==$arr[1]) echo("&nbsp;(today)");
	echo ("<br>&nbsp;&nbsp;&nbsp;$arr[2]<br></font>");
	if (($arr[5]!="")||($arr[6]!="")) echo("&nbsp;&nbsp;&nbsp;");
	if ($arr[5]!="") echo ("<a href=mailto:$arr[5]>email</a>");
	if (($arr[5]!="")&&($arr[6]!="")) echo("&nbsp;");
	if ($arr[6]!="") echo ("<a href=$arr[6] target=_blank>page</a>");
	echo ("<br><br></span><table cellspacing=0 cellpadding=8 border=0 width=100%><tr><td><span class=d4b><font color=#000000>$arr[7]</font></span></td></tr></table>");
	echo ("<br><br><br><br><br>\n");

}
?>
        <span class=d4s> <font color=#666666>§&nbsp;Page</font><br>
        <font color=#bbbbbb>&nbsp;&nbsp;&nbsp; 
        <?php
$totalPage=((int)($total/ONEPAGE))+1;
for($j=0;$j<$totalPage;$j++) {
if ($page==($j+1)) echo(($j+1) . " ");
else echo ("<a href=guestbook.php?page=" . ($j+1) . ">" . ($j+1) . "</a> ");
}
?>
        </font> </span> <br>
        </strong> </p></td>
  </tr>
</table>

</body>
</html>