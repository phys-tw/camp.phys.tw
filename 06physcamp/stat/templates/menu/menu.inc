<script language="JavaScript" type="text/javascript">
<!--
var pHref,pA;

function hideHref(oHref)
{
    if (pA!=null) {
        pA.className = "";
    }
    oHref.className = "clicked";
    pA = oHref;
}

function formatHref()
{
    vHref = document.all.tags("A");
    if (vHref!=null) {
        for (i=0; i<vHref.length; i++)
          if (vHref[i].href == window.parent.frames(1).location.href) {
            pA = vHref[i];
            pHref = vHref[i].href;
            vHref[i].className = "clicked";
          }
    }

}
window.onload = formatHref;
// -->
</script>


<table cellpadding="0" cellspacing="0" width="100%">
    <tr><td align="center">
        <a href="http://www.bbsfans.com" target="_blank"><img src="images/title2.gif" border="0" alt="Welcome to BBSFans.com"></a>
    </td></tr>
</table>

<br>

<?php
$cycleArray['cycle'] = array('#E6E6E6','#DADADA','#DADADA','#CDCDCD','#CDCDCD','#C1C1C1','#C1C1C1','#B4B4B4','#B4B4B4','#A7A7A7','#9A9A9A');
?>

<table cellpadding="0" cellspacing="0" width="100%">
    <tr><td align="center">
        <img src="images/tongji.gif" border="0">
    </td></tr>
    <tr><td valign="top" align="center">
        <table width="120" cellspacing="4">
            <tr height="20" style="background-color: <?php cycle() ?>"><td align="left" style="padding-left: 10px">
                <a href="main.php?actionID=TotalData" target="main" onclick="hideHref(this)">總 體 資 料</a>
            </td></tr>

            <tr height="20" style="background-color: <?php cycle() ?>"><td align="left" style="padding-left: 10px">
                <a href="main.php?actionID=RecentlyRecord" target="main" onclick="hideHref(this)">最 新 記 錄</a>
            </td></tr>

            <tr height="20" style="background-color: <?php cycle() ?>"><td align="left" style="padding-left: 10px">
                <a href="main.php?actionID=HoursStat" target="main" onclick="hideHref(this)">24 小 時 統 計</a>
            </td></tr>

            <tr height="20" style="background-color: <?php cycle() ?>"><td align="left" style="padding-left: 10px">
                <a href="main.php?actionID=DayStat" target="main" onclick="hideHref(this)">日 統 計</a>
            </td></tr>

            <tr height="20" style="background-color: <?php cycle() ?>"><td align="left" style="padding-left: 10px">
                <a href="main.php?actionID=WeekStat" target="main" onclick="hideHref(this)">週 統 計</a>
            </td></tr>

            <tr height="20" style="background-color: <?php cycle() ?>"><td align="left" style="padding-left: 10px">
                <a href="main.php?actionID=MonthStat" target="main" onclick="hideHref(this)">月 統 計</a>
            </td></tr>

            <tr height="20" style="background-color: <?php cycle() ?>"><td align="left" style="padding-left: 10px">
                <a href="main.php?actionID=ClientSoftwareStat" target="main" onclick="hideHref(this)">訪 問 者 軟 體</a>
            </td></tr>

            <tr height="20"><td>&nbsp;</td></tr>

            <tr height="20" style="background-color: <?php cycle() ?>"><td align="left" style="padding-left: 10px">
                <a href="admin.php" target="main" onclick="hideHref(this)">管 理 員 登 入</a>
            </td></tr>
        </table>
    </td></tr>
</table>
