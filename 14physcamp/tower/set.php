<?php
	$str=$_GET['o1'].$_GET['s1'].$_GET['o2'].$_GET['s2'].$_GET['o3'].$_GET['s3'].$_GET['o4'].$_GET['s4'].$_GET['o5'].$_GET['s5'].$_GET['o6'].$_GET['s6'].$_GET['o7'].$_GET['s7'];
	//echo $str;
	$fp = fopen('tower.txt', 'w');
	fwrite($fp, $str);
	fclose($fp);
	//header("Location: set_tower.php");
?>