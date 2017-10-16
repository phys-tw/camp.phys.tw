<?php
//function list
function preedit($str){
	$str = nl2br($str);
	$str = preg_replace("/’/","'", $str);
	$str = preg_replace('/\\\(.)/', '\1', $str);
	$str = preg_replace("#(http://[0-9a-z._/?=&;~-]+)#i","<a href=\"\\1\"target=\"_blank\">\\1</a>", $str);
	$str = preg_replace("#([0-9a-z._]+@[0-9a-z._?=]+)#i","<a href=\"mailto:\\1\">\\1</a>", $str);
	return $str;
}

function endSession(){
	$_SESSION = array();
	if (isset($_COOKIE[session_name()]))
		setcookie(session_name(), '', time()-90000, '/');
	session_destroy();
}

?>