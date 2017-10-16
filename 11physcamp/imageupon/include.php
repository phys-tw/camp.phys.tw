<?php



function valid_suffix($suffix){
    global $valid_suffix;
	if (in_array($suffix,$valid_suffix)){
	    return true;
	}else{
	    return false;
	}
}

function v(){
    if ($_SERVER['QUERY_STRING']=='info'){
	    echo 'ImageUpon ' .IMAGEUPON_VERSION .'('.IMAGEUPON_LANGUAGE.')<br />';
		echo 'License:'.IMAGEUPON_LICENSE.'<br />';
		echo 'Copyright/Author:NKTM Studio<br />';
		echo 'ReferURL: http://www.neekey.com/imageupon/';
		exit;
	}
}

?>
