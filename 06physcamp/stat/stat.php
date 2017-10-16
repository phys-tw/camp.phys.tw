<?php
//$time = getmicrotime();
//
//set_time_limit(1);
//error_reporting(E_ALL);

define('STAT_BASE', dirname(__FILE__));
require STAT_BASE . '/config/system.php';
require STAT_BASE . '/config/config.php';

$visitpage = isset($HTTP_SERVER_VARS['HTTP_REFERER']) ? $HTTP_SERVER_VARS['HTTP_REFERER'] : "";

if ($conf['avoid_refresh'] == true) {
    if (isset($HTTP_COOKIE_VARS['refresh_page']) && $HTTP_COOKIE_VARS['refresh_page'] == $visitpage) {
        exit();
    } else {
        setcookie('refresh_page', $visitpage, time()+$conf['refresh_cookietime']);
    }
}

define('OS_UNKNOWN', 'Others');
define('BROWSER_UNKNOWN', 'Others');

$visitip   = $HTTP_SERVER_VARS['REMOTE_ADDR'];
$frompage  = isset($HTTP_GET_VARS['referrer']) ? $HTTP_GET_VARS['referrer'] : "";

$browser   = getBrowserInfo();
$useros    = getOsInfo();

$datadir = STAT_BASE ."/". $conf['data'] ."/";

$notfirst = file_exists($datadir . "start.db");

function getData($dbName)
{
    global $datadir;
    $oFile = $datadir . $dbName;

    $oFileSize = filesize($oFile);
    if ($oFileSize > 0) {
        $fp = fopen($oFile, "r");
        $toread = fread($fp, $oFileSize);
        fclose($fp);
        return unserialize($toread);
    } else {
        return false;
    }
}

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

//如果不是第一次，就更新所有數據檔案********************************************
if ($notfirst) {

    $statdate = getData("date.db");
    if ($statdate === false) exit();

    // Update snap **********************************************************
    $statsnap = $statdate['snap'];

    $today     = getdate();
    $lasttime  = $statsnap[6];
    $nowtime   = time();

    $statsnap[0]++;

    if (date("Y-m-d H", $lasttime) == date("Y-m-d H", $nowtime)) {
        $statsnap[4]++;
        $statsnap[3]++;
        $statsnap[2]++;
        $statsnap[1]++;
    } elseif (date("Y-m-d", $lasttime) == date("Y-m-d", $nowtime)) {
        $statsnap[4]++;
        $statsnap[3]++;
        $statsnap[2]++;
        $statsnap[1] = 1;
    } elseif (date("Y-m", $lasttime) == date("Y-m", $nowtime)) {
        $statsnap[4]++;
        $statsnap[3]++;
        if (date("Y-m-d", $nowtime-3600*24) == date("Y-m-d", $lasttime)) {
            $statsnap[5] = $statsnap[2];
        } else {
            $statsnap[5] = 0;
        }
        $statsnap[2] = 1;
        $statsnap[1] = 1;
    } elseif (date("Y", $lasttime) == date("Y", $nowtime)) {
        $statsnap[4]++;
        $statsnap[3] = 1;
        $statsnap[2] = 1;
        $statsnap[1] = 1;
    } else {
        $lastyear = $statsnap[4];
        $statsnap[4] = 1;
        $statsnap[3] = 1;
        $statsnap[2] = 1;
        $statsnap[1] = 1;
    }

    $statsnap[6] = $nowtime;

    if ($statsnap[2] > $statsnap[8]) {
        $statsnap[8] = $statsnap[2];
        $statsnap[7] = date("Y-m-d");
    }
    if ($statsnap[3] > $statsnap[10]) {
        $statsnap[10] = $statsnap[3];
        $statsnap[9]  = date("Y-m");
    }

    // Update hour **********************************************************
    $stathour = $statdate['hour'];
    $stathour['all'][$today['hours']]++;
    $stathour['recent'][$today['hours']] = $statsnap[1];//小時

    // Update day **********************************************************
    $statday = $statdate['day'];
    $statday['all'][$today['mday']]++;
    $statday['recent'][$today['mday']] = $statsnap[2];//日

    // Update month **********************************************************
    $statmonth = $statdate['month'];
    $statmonth['all'][$today['mon']]++;
    $statmonth['recent'][$today['mon']] = $statsnap[3];//月

    // Update week **********************************************************
    $statweek = $statdate['week'];
    $statweek['all'][$today['wday']]++;
    $statweek['recent'][$today['wday']] = $statsnap[2];//周

    // Update year **********************************************************
    $statyear = $statdate['year'];
    if (isset($lastyear)) {
        array_push($statyear,1);
    } else {
        $statyear[count($statyear)-1] = $statsnap[4];//年
    }

    // Update browser **********************************************************
    $statbrowser = $statdate['browser'];
    if (isset($statbrowser[$browser])) {
        $statbrowser[$browser]++;
    } else {
        $statbrowser[$browser] = 1;//瀏覽器
    }

    // Update os **********************************************************
    $statuseros = $statdate['os'];
    if (isset($statuseros[$useros])) {
        $statuseros[$useros]++;
    } else {
        $statuseros[$useros] = 1;//作業系統
    }

    // 更新date.db **********************************************************
    $statdate['snap']     = $statsnap;
    $statdate['hour']     = $stathour;
    $statdate['day']      = $statday;
    $statdate['month']    = $statmonth;
    $statdate['week']     = $statweek;
    $statdate['year']     = $statyear;
    $statdate['browser']  = $statbrowser ;
    $statdate['os']       = $statuseros;

    setData("date.db", $statdate);

    // 更新recent.db **********************************************************
    $statrecent = getData("recent.db");
    if ($statrecent === false) exit();

    $cur_click = array($nowtime, $visitip, $visitpage, $frompage);

    if (count($statrecent) > $conf['record_limit']) {
        array_splice($statrecent, $conf['record_limit']-1);
        array_unshift($statrecent, $cur_click);
    } elseif (count($statrecent) == $conf['record_limit']) {
        array_pop($statrecent);
        array_unshift($statrecent, $cur_click);
    } else {
        array_unshift($statrecent, $cur_click);
    }
    setData("recent.db", $statrecent);


//如果是第一次，就初始化所有數據檔案********************************************
} else {

    $today     = getdate();
    $starttime = time();

    $oFile = fopen($datadir."start.db", 'w');
    flock($oFile, 2);
    fwrite($oFile, $starttime);
    fclose($oFile);

    $statsnap = array(1, 1, 1, 1, 1, 0, $starttime, date("Y-m-d"), 1, date("Y-m"), 1);

    $hour_tmp = array();
    for ($i=0; $i<24; $i++) {
        if ($i == $today['hours']) {
            $hour_tmp[] = 1;
        } else {
            $hour_tmp[] = 0;
        }
    }
    $stathour['recent']   = $hour_tmp;
    $stathour['all']      = $hour_tmp;

    $day_tmp = array();
    for ($i=1; $i<=31; $i++) {
        if ($i == $today['mday']) {
            $day_tmp[$i] = 1;
        } else {
            $day_tmp[$i] = 0;
        }
    }
    $statday['recent']   = $day_tmp;
    $statday['all']      = $day_tmp;

    $month_tmp = array();
    for ($i=1; $i<=12; $i++) {
        if ($i == $today['mon']) {
            $month_tmp[$i] = 1;
        } else {
            $month_tmp[$i] = 0;
        }
    }
    $statmonth['recent']   = $month_tmp;
    $statmonth['all']      = $month_tmp;

    $week_tmp = array();
    for ($i=0; $i<7; $i++) {
        if ($i == $today['wday']) {
            $week_tmp[] = 1;
        } else {
            $week_tmp[] = 0;
        }
    }
    $statweek['recent']   = $week_tmp;
    $statweek['all']      = $week_tmp;

    $statyear[] = 1;

    $statbrowser[$browser] = 1;
    $statuseros[$useros] = 1;

    $statdate['snap']     = $statsnap;
    $statdate['hour']     = $stathour;
    $statdate['day']      = $statday;
    $statdate['month']    = $statmonth;
    $statdate['week']     = $statweek;
    $statdate['year']     = $statyear;
    $statdate['browser']  = $statbrowser ;
    $statdate['os']       = $statuseros;
    setData("date.db", $statdate);


    $statrecent[] = array($starttime, $visitip, $visitpage, $frompage);
    setData("recent.db", $statrecent); //最新訪問記錄
}

$now = gmdate('D, d M Y H:i:s') . ' GMT';
header('Expires: 0'); // rfc2616 - Section 14.21
header('Last-Modified: ' . $now);
header('Cache-Control: no-store, no-cache, must-revalidate'); // HTTP/1.1
header('Cache-Control: pre-check=0, post-check=0, max-age=0'); // HTTP/1.1
header('Pragma: no-cache'); // HTTP/1.0



//:~返回作業系統信息
function getOsInfo()
{
    global $HTTP_SERVER_VARS;
    $os = "";
    $Agent = $HTTP_SERVER_VARS["HTTP_USER_AGENT"];

    if (eregi('win',$Agent) && strpos($Agent, '95')) {
        $os = "Windows 95";
    } elseif (eregi('win 9x',$Agent) && strpos($Agent, '4.90')) {
        $os = "Windows ME";
    } elseif (eregi('win',$Agent) && ereg('98',$Agent)) {
        $os = "Windows 98";
    } elseif (eregi('win',$Agent) && eregi('nt 5.1',$Agent)) {
        $os = "Windows XP";
    } elseif (eregi('win',$Agent) && eregi('nt 5',$Agent)) {
        $os = "Windows 2000";
    } elseif (eregi('win',$Agent) && eregi('nt',$Agent)) {
        $os = "Windows NT";
    } elseif (eregi('win',$Agent) && ereg('32',$Agent)) {
        $os = "Windows 32";
    } elseif (eregi('linux',$Agent)) {
        $os = "Linux";
    } elseif (eregi('unix',$Agent)) {
        $os = "Unix";
    } elseif (eregi('sun',$Agent) && eregi('os',$Agent)) {
        $os = "SunOS";
    } elseif (eregi('ibm',$Agent) && eregi('os',$Agent)) {
        $os = "IBM OS/2";
    } elseif (eregi('Mac',$Agent) && eregi('PC',$Agent)) {
        $os = "Macintosh";
    } elseif (eregi('PowerPC',$Agent)) {
        $os = "PowerPC";
    } elseif (eregi('AIX',$Agent)) {
        $os = "AIX";
    } elseif (eregi('HPUX',$Agent)) {
        $os = "HPUX";
    } elseif (eregi('NetBSD',$Agent)) {
        $os = "NetBSD";
    } elseif (eregi('BSD',$Agent)) {
        $os = "BSD";
    } elseif (ereg('OSF1',$Agent)) {
        $os = "OSF1";
    } elseif (ereg('IRIX',$Agent)) {
        $os = "IRIX";
    } elseif (eregi('FreeBSD',$Agent)) {
        $os = "FreeBSD";
    }
    if ($os == '') $os = OS_UNKNOWN;
    return $os;
}

//:~返回瀏覽器信息
function getBrowserInfo()
{
    global $HTTP_SERVER_VARS;

    $browser = "";
    $browserver = "";
    $Browsers = array("Lynx","MOSAIC","AOL","Opera","JAVA","MacWeb","WebExplorer","OmniWeb");
    $Agent = $HTTP_SERVER_VARS["HTTP_USER_AGENT"];

    for ($i=0,$sum=count($Browsers); $i<$sum; $i++) {
        if (strpos($Agent,$Browsers[$i])) {
            $browser = $Browsers[$i];
            $browserver = "";
        }
    }
    if (ereg("Mozilla",$Agent) && !ereg("MSIE",$Agent)) {
        $temp = explode("(", $Agent); $Part=$temp[0];
        $temp = explode("/", $Part); $browserver=$temp[1];
        $temp = explode(" ",$browserver); $browserver=$temp[0];
        $browserver =preg_replace("/([\d\.]+)/","\\1",$browserver);
        $browserver = " $browserver";
        $browser = "Netscape Navigator";
    }
    if (ereg("Mozilla",$Agent) && ereg("Opera",$Agent)) {
        $temp = explode("(", $Agent); $Part=$temp[1];
        $temp = explode(")", $Part); $browserver=$temp[1];
        $temp = explode(" ",$browserver);$browserver=$temp[2];
        $browserver =preg_replace("/([\d\.]+)/","\\1",$browserver);
        $browserver = " $browserver";
        $browser = "Opera";
    }
    if (ereg("Mozilla",$Agent) && ereg("MSIE",$Agent)) {
        $temp = explode("(", $Agent); $Part=$temp[1];
        $temp = explode(";",$Part); $Part=$temp[1];
        $temp = explode(" ",$Part);$browserver=$temp[2];
        $browserver = preg_replace("/([\d\.]+)/","\\1",$browserver);
        $browserver = " $browserver";
        $browser = "Internet Explorer";
    }
    if ($browser != "") {
        $browseinfo = "$browser$browserver";
    } else {
        $browseinfo = BROWSER_UNKNOWN;
    }
    return $browseinfo;
}


/*******************************************************************************/
//echo "<p>Time elapsed: ",getmicrotime() - $time, " seconds</p>";
//
//function getmicrotime()
//{
//    list($usec, $sec) = explode(" ", microtime());
//    return ((float)$usec + (float)$sec);
//}
?>