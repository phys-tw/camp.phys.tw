<?php
define('STAT_BASE', dirname(__FILE__));

require_once STAT_BASE . '/lib/d_base.php';

$datadir = STAT_BASE ."/". $conf['data'] ."/";

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

$statdate = getData("date.db");
if ($statdate === false) exit();

$statsnap = $statdate['snap'];

$vtotal     = $statsnap[0];
$vthismonth = $statsnap[3];
$vtoday     = $statsnap[2];
$vyesterday = $statsnap[5];

$now = gmdate('D, d M Y H:i:s') . ' GMT';
header('Expires: 0'); // rfc2616 - Section 14.21
header('Last-Modified: ' . $now);
header('Cache-Control: no-store, no-cache, must-revalidate'); // HTTP/1.1
header('Cache-Control: pre-check=0, post-check=0, max-age=0'); // HTTP/1.1
header('Pragma: no-cache'); // HTTP/1.0

echo"document.write(\"<table width='88' border='0' cellspacing='0' cellpadding='0' height='31' style=\\\"background: url('".$conf['stat_url']."/images/stat_counter.gif') no-repeat;\\\">\");";
echo"document.write(\"  <tr>\");";
echo"document.write(\"    <td colspan='3' height='3'></td>\");";
echo"document.write(\"  </tr>\");";
echo"document.write(\"  <tr>\");";
echo"document.write(\"    <td width='25'></td>\");";
echo"document.write(\"    <td width='58' align='center' valign='middle'>\");";
echo"document.write(\"      <marquee behavior='loop' scrollDelay='100' scrollAmount='3' onmouseover=\\\"this.stop()\\\" onmouseout=\\\"this.start()\\\" style='font-size: 11px; line-height=15px'>\");";
echo"document.write(\"        <a href='".$conf['stat_url']."/index.php' target='_blank' style='color: #ffffff; text-decoration: none'>\");";
echo"document.write(\"          <font face='Tahoma,新細明體' color='#FFFFFF'>總訪問量: ".$vtotal." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;本月訪問: ".$vthismonth." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;今日訪問: ".$vtoday." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;昨日訪問: ".$vyesterday."</font>\");";
echo"document.write(\"        </a>\");";
echo"document.write(\"      </marquee>\");";
echo"document.write(\"    </td>\");";
echo"document.write(\"    <td width='5'></td>\");";
echo"document.write(\"  </tr>\");";
echo"document.write(\"  <tr>\");";
echo"document.write(\"    <td colspan='3' height='17'></td>\");";
echo"document.write(\"  </tr>\");";
echo"document.write(\"</table>\");";

echo"document.write(\"<script language='Javascript'>\");";
echo"document.write(\"if(window.today_visit!=null)window.today_visit.innerText = '".$vtoday."';\");";
echo"document.write(\"</script>\");";

?>