<?php
//function getmicrotime()
//{
//    list($usec, $sec) = explode(" ", microtime());
//    return ((float)$usec + (float)$sec);
//}
///**********************************************************************/
//$time = getmicrotime();

function getData($dbName)
{
    global $datadir;
    $oFile = $datadir . $dbName;

    $fp = fopen($oFile, "r");
    $toread = fread($fp, filesize($oFile));
    fclose($fp);

    return unserialize($toread);
}

define('STAT_BASE', dirname(__FILE__));
require STAT_BASE . '/lib/base.php';

define('LOC_UNKNOWN', 'ゼ跋');

$toShow = array();
$today  = getdate();

$datadir = STAT_BASE ."/". $conf['data'] ."/";

if (!file_exists($datadir. "start.db")) {

    $title = "Welcome";

    include T_DIR . '/common-header.inc';
    include T_DIR . '/logo.inc';

    include T_DIR . '/not_star.inc';

    include T_DIR . '/copyright.inc';
    include T_DIR . '/common-footer.inc';

    exit();

}


$actionID = getFormData('actionID', 'TotalData');


switch ($actionID) {
//******************************************************************************
    case 'TotalData'://羆砰计沮

        $starttime = file($datadir. "start.db");
        $starttime = intval($starttime[0]);

        $statdate = getData("date.db");
        $statsnap = $statdate['snap'];

        $toShow['vfirst']     = date("Y-m-d H:i:s", $starttime);
        $toShow['vtotal']     = $statsnap[0];
        $toShow['vtoday']     = $statsnap[2];
        $toShow['vthismonth'] = $statsnap[3];
        $toShow['vthisyear']  = $statsnap[4];
        $toShow['vyesterday'] = $statsnap[5];

        $toShow['vmaxday']    = $statsnap[7];
        $toShow['vdaymax']    = $statsnap[8];
        $toShow['vmaxmonth']  = $statsnap[9];
        $toShow['vmonthmax']  = $statsnap[10];

        $toShow['vdays'] = ceil((time() - $starttime)/(3600*24));
        $toShow['vdayavg'] = ceil($toShow['vtotal']/$toShow['vdays']);

        $startday = getdate($starttime);

        $vmonths = ($today['year'] - $startday['year'])*12 + ($today['mon'] - $startday['mon']) + 1;
        $toShow['vmonthavg'] = ceil($toShow['vtotal']/$vmonths);

        $whichTpl[] = '/total/total.inc';
        break;

//******************************************************************************
    case 'RecentlyRecord': //程穝砐拜癘魁
        $statrecent = getData("recent.db");
        $recentlyArray = array();

        foreach ($statrecent as $value) {
            $location = getLocationInfo($value[1]);
            array_push($value, $location);
            $recentlyArray[] = $value;
        }
        $whichTpl[] = '/recently/recently.inc';
        break;

//******************************************************************************
    case 'HoursStat': //参璸计沮
        $statdate = getData("date.db");
        $hourStat = $statdate['hour'];

        $maxhour = max($hourStat['recent']);
        $sumhour = array_sum($hourStat['recent']);
        $maxallhour = max($hourStat['all']);
        $sumallhour = array_sum($hourStat['all']);

        $vhour1 = array_slice($hourStat['recent'], $today['hours']+1);
        $vhour2 = array_slice($hourStat['recent'], 0, $today['hours']+1);
        $vhour  = array_merge($vhour1,$vhour2);

        $hourlist = array();
        foreach ($vhour as $key => $value) {
            $whichhour = $today['hours'] + $key + 1;
            if ($whichhour >= 24) $whichhour-=24;
            $hourlist[] = array("whichhour" => $whichhour,
                                "visittimes" => $value,
                                "height" => (int)ceil(($value/$maxhour)*100),
                                "percent" => round($value*100/$sumhour,1).'%');
        }

        $allhourlist = array();
        foreach ($hourStat['all'] as $key => $value) {
            $allhourlist[] = array("whichhour" => $key,
                                   "visittimes" => $value,
                                   "height" => (int)ceil(($value/$maxallhour)*100),
                                   "percent" => round($value*100/$sumallhour,1).'%');
        }

        $whichTpl[] = '/hour/recent.inc';
        $whichTpl[] = '/hour/all.inc';

        break;

//******************************************************************************
    case 'DayStat': //ぱ参璸计沮
        $statdate = getData("date.db");
        $dayStat = $statdate['day'];

        $daysnum = date("t");
        if ($today['mday'] == $daysnum) {
            $tocut = $daysnum;
        } else {
            $tocut = date("t", mktime (0,0,0, date("m")-1, date("d"), date("Y")));
        }
        array_splice($dayStat['recent'], $tocut);

        $maxday = max($dayStat['recent']);
        $sumday = array_sum($dayStat['recent']);
        $maxallday = max($dayStat['all']);
        $sumallday = array_sum($dayStat['all']);

        $vday1 = array_slice($dayStat['recent'], $today['mday']);
        $vday2 = array_slice($dayStat['recent'], 0, $today['mday']);
        $vday  = array_merge($vday1,$vday2);

        $daylist = array();
        foreach ($vday as $key => $value) {
            $whichday = $today['mday'] + $key + 1;
            if ($whichday > $tocut) $whichday-=$tocut;
            $daylist[] = array("whichday" => $whichday,
                                "visittimes" => $value,
                                "height" => (int)ceil(($value/$maxday)*100),
                                "percent" => round($value*100/$sumday,1).'%');
        }

        $alldaylist = array();
        foreach ($dayStat['all'] as $key => $value) {
            $alldaylist[] = array("whichday" => $key,
                                   "visittimes" => $value,
                                   "height" => (int)ceil(($value/$maxallday)*100),
                                   "percent" => round($value*100/$sumallday,1).'%');
        }

        $whichTpl[] = '/day/recent.inc';
        $whichTpl[] = '/day/all.inc';

        break;

//******************************************************************************
    case 'WeekStat': //琍戳参璸计沮
        $statdate = getData("date.db");
        $weekStat = $statdate['week'];

        $maxweek = max($weekStat['recent']);
        $sumweek = array_sum($weekStat['recent']);
        $maxallweek = max($weekStat['all']);
        $sumallweek = array_sum($weekStat['all']);

        $vweek1 = array_slice($weekStat['recent'], $today['wday']+1);
        $vweek2 = array_slice($weekStat['recent'], 0, $today['wday']+1);
        $vweek  = array_merge($vweek1,$vweek2);

        $weeklist = array();
        foreach ($vweek as $key => $value) {
            $whichweek = $today['wday'] + $key + 1;
            if ($whichweek >= 7) $whichweek-=7;
            $weeklist[] = array("whichweek" => $whichweek,
                                "visittimes" => $value,
                                "height" => (int)ceil(($value/$maxweek)*100),
                                "percent" => round($value*100/$sumweek,1).'%');
        }

        $allweeklist = array();
        foreach ($weekStat['all'] as $key => $value) {
            $allweeklist[] = array("whichweek" => $key,
                                   "visittimes" => $value,
                                   "height" => (int)ceil(($value/$maxallweek)*100),
                                   "percent" => round($value*100/$sumallweek,1).'%');
        }

        $whichTpl[] = '/week/recent.inc';
        $whichTpl[] = '/week/all.inc';

        break;

//******************************************************************************
    case 'MonthStat': //る㎝参璸计沮
        $statdate = getData("date.db");
        $monthStat = $statdate['month'];
        $yearStat = $statdate['year'];

        $maxmonth = max($monthStat['recent']);
        $summonth = array_sum($monthStat['recent']);
        $maxallmonth = max($monthStat['all']);
        $sumallmonth = array_sum($monthStat['all']);
        $maxallyear = max($yearStat);
        $sumallyear = array_sum($yearStat);

        $vmonth1 = array_slice($monthStat['recent'], $today['mon']);
        $vmonth2 = array_slice($monthStat['recent'], 0, $today['mon']);
        $vmonth  = array_merge($vmonth1,$vmonth2);

        $monthlist = array();
        foreach ($vmonth as $key => $value) {
            $whichmonth = $today['mon'] + $key + 1;
            if ($whichmonth > 12) $whichmonth-=12;
            $monthlist[] = array("whichmonth" => $whichmonth,
                                "visittimes" => $value,
                                "height" => (int)ceil(($value/$maxmonth)*100),
                                "percent" => round($value*100/$summonth,1).'%');
        }

        $allmonthlist = array();
        foreach ($monthStat['all'] as $key => $value) {
            $allmonthlist[] = array("whichmonth" => $key,
                                   "visittimes" => $value,
                                   "height" => (int)ceil(($value/$maxallmonth)*100),
                                   "percent" => round($value*100/$sumallmonth,1).'%');
        }

        $allyearlist = array();
        $yearnum = count($yearStat);
        foreach ($yearStat as $key => $value) {
            $whichyear = $today['year'] - $yearnum + $key + 1;
            $allyearlist[] = array("whichyear" => $whichyear,
                                   "visittimes" => $value,
                                   "height" => (int)ceil(($value/$maxallyear)*100),
                                   "percent" => round($value*100/$sumallyear,1).'%');
        }

        $whichTpl[] = '/month/recent.inc';
        $whichTpl[] = '/month/all.inc';
        $whichTpl[] = '/year/year.inc';

        break;

//******************************************************************************
    case 'ClientSoftwareStat': //聅凝竟㎝穨╰参
        $statdate = getData("date.db");
        $browserArray = $statdate['browser'];
        $osArray      = $statdate['os'];

        arsort($browserArray);
        reset($browserArray);
        arsort($osArray);
        reset($osArray);

        $maxbrowser = max($browserArray);
        $sumbrowser = array_sum($browserArray);

        $browserlist = array();
        foreach ($browserArray as $key => $value) {
            $browserlist[] = array("whichbrowser" => $key,
                                "visittimes" => $value,
                                "height" => (int)ceil(($value/$maxbrowser)*200),
                                "percent" => round($value*100/$sumbrowser,1).'%');
        }

        $maxos = max($osArray);
        $sumos = array_sum($osArray);

        $oslist = array();
        foreach ($osArray as $key => $value) {
            $oslist[] = array("whichos" => $key,
                                "visittimes" => $value,
                                "height" => (int)ceil(($value/$maxos)*200),
                                "percent" => round($value*100/$sumos,1).'%');
        }

        $whichTpl[] = '/software/browser.inc';
        $whichTpl[] = '/software/os.inc';

        break;

    default:
        exit();
}

ob_start("ob_gzhandler");

$showPopText = true;
$title = "Welcome";

include T_DIR . '/common-header.inc';
include T_DIR . '/logo.inc';

foreach ($whichTpl as $value) {
    include T_DIR . $value;
}

include T_DIR . '/copyright.inc';
include T_DIR . '/common-footer.inc';

//echo "<p>Time elapsed: ",getmicrotime() - $time, " seconds";
?>