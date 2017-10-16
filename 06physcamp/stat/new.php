<?php

define('STAT_BASE', dirname(__FILE__));

function setData($dbName, $dbContent)
{
    global $datadir;
    $oFile = $datadir . $dbName;
    $towrite = serialize($dbContent);

    $oFile = fopen($oFile, 'w');
    flock($oFile, 2);
    fwrite($oFile, $towrite);
    fclose($oFile);
}

$datadir = STAT_BASE ."/data/";

$statday['all']   = array(1=>250659, 231232, 241449, 242310, 267773, 277038, 264813, 278144, 272719, 267101, 247088, 255952, 265210, 253482, 252651, 235780, 239791, 224617, 240242, 211992, 215306, 240537, 235127, 239090, 245141, 252202, 233690, 257700, 261988, 254293, 180739);

$statday['recent']= array(1=>47042, 34504, 41332, 32097, 33405, 34442, 27269, 34852, 36291, 31779, 28840, 30494, 32615, 23275, 24609, 23380, 22855, 24223, 21314, 10079, 49125, 62851, 63884, 63652, 58699, 57778, 34685, 55138, 63460, 61518, 53114);

$stathour['all'] = array(398437, 374595, 291129, 205368, 141803, 112067, 120592, 176551, 248230, 308776, 354195, 375444, 370261, 373079, 363303, 369502, 378435, 376853, 362661, 380861, 386800, 395810, 380913, 390195);
$stathour['recent'] = array(745, 1238, 1187, 1129, 830, 642, 705, 908, 961, 953, 777, 863, 1006, 1096, 873, 1044, 988, 938, 873, 1003, 996, 643, 620, 389);

$statmonth['recent']   = array(1=>0,0,0,0,0,0, 1065374, 2044961, 1960349, 1970438, 594720, 0);
$statmonth['all']      = array(1=>0,0,0,0,0,0, 1065374, 2044961, 1960349, 1970438, 594720, 0);

$statsnap = array(7635878, 778, 10080, 594727, 7635878, 21314, time(), "2002-09-30", 81302, "2002-08", 2044962);

$statweek['recent']   = array(22855, 24223, 21314, 10079, 23275, 24609,23380);
$statweek['all']      = array(1100973, 1067824, 1104974, 1087147, 1080208, 1074272, 1120438);

$statyear[] = 7635878;

$statuseros["Windows 2000"] = 1;
$statbrowser["Internet Explorer 6.0"] = 1;

$statdate['snap']     = $statsnap;
$statdate['hour']     = $stathour;
$statdate['day']      = $statday;
$statdate['month']    = $statmonth;
$statdate['week']     = $statweek;
$statdate['year']     = $statyear;
$statdate['browser']  = $statbrowser ;
$statdate['os']       = $statuseros;

setData("date.db", $statdate);

$starttime = strtotime('2002-07-05 11:41:15');

$oFile = fopen($datadir."start.db", 'w');
flock($oFile, 2);
fwrite($oFile, $starttime);
fclose($oFile);

echo strtotime('2002-07-05 11:41:15');
?>