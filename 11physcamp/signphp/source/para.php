<?php
date_default_timezone_set('Asia/Taipei');
$deadline = mktime(0, 0, 0, 12, 04, 2010) ; //=1156953600 整數值
//int mktime(int hour, int minute, int second, int month, int day, int year);
$dataTableName = "2k11_list";
$Sex_code = array('─', '男', '女') ;
$State_code = array('─', '錄取', '備取', '未錄取', '', '', '', '', '', '已刪除') ;
$Remit_code = array('否', '是') ;
$Team_code = array('─', '１', '２', '３', '４', '５', '６', '７', '８', '９', '10') ;
$Grade_code = array('', '１', '２', '３') ;
$Size_code = array('', '１', '２', '３','４', '５', '６') ;

?>
