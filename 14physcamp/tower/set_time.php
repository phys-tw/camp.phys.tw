<?php
	if($_GET['s'])
	{
		$str=time();
	}
	else
	{
		$str=-1;
	}
	$fp = fopen('tower'.$_GET['t'].'.txt', 'w');
	fwrite($fp, $str);
	fclose($fp);
?>