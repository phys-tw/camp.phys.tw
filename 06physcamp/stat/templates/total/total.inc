<?php
$cycleArray['cycle'] = array('#FFFBEE','#FFF4CE');
?>

<table class="tbody" cellspacing="1" align="center" cellpadding="0">
    <tr>
        <td class="thead">
            &nbsp; <img src="images/tb_title.gif" align="absmiddle"> &nbsp;總體資料
        </td>
    </tr>
    <tr>
        <td class="middle">
            <table cellpadding="4" style="margin-left:10px" width="80%" border="0" align="center">
                <tr style="background-color: <?php cycle() ?>"><td>開始統計: </td><td style="padding-left:20px;color:blue"  colspan="3"><?= $toShow['vfirst'] ?></td></tr>
                <tr style="background-color: <?php cycle() ?>"><td>統計天數: </td><td style="padding-left:20px;color:blue"  colspan="3"><?= $toShow['vdays']?> </td></tr>
                <tr style="background-color: <?php cycle() ?>"><td>昨日訪問: </td><td style="padding-left:20px;color:blue"  colspan="3"><?= $toShow['vyesterday'] ?> </td></tr>
                <tr style="background-color: <?php cycle() ?>">
                    <td width="25%">本日訪問: </td><td width="25%" style="padding-left:20px;color:blue"><?= $toShow['vtoday'] ?> </td>
                    <td width="25%">平均日訪問: </td><td width="25%" style="padding-left:20px;color:blue"><?= $toShow['vdayavg'] ?> </td>
                </tr>
                <tr style="background-color: <?php cycle() ?>">
                    <td>本月訪問: </td><td style="padding-left:20px;color:blue"><?= $toShow['vthismonth'] ?> </td>
                    <td>平均月訪問: </td><td style="padding-left:20px;color:blue"><?= $toShow['vmonthavg'] ?> </td>
                </tr>
                <tr style="background-color: <?php cycle() ?>">
                    <td>年度訪問: </td><td style="padding-left:20px;color:blue"><?= $toShow['vthisyear'] ?> </td>
                    <td>累計總訪問: </td><td style="padding-left:20px;color:blue"> <?= $toShow['vtotal'] ?> </td>
                </tr>
                <tr style="background-color: <?php cycle() ?>">
                    <td>最大日訪問: </td><td style="padding-left:20px;color:blue"><?= $toShow['vdaymax'] ?> </td>
                    <td>最大訪問日: </td><td style="padding-left:20px;color:blue"><?= $toShow['vmaxday'] ?> </td>
                </tr>
                <tr style="background-color: <?php cycle() ?>">
                    <td>最大月訪問: </td><td style="padding-left:20px;color:blue"><?= $toShow['vmonthmax'] ?> </td>
                    <td>最大訪問月: </td><td style="padding-left:20px;color:blue"><?= $toShow['vmaxmonth'] ?> </td>
                </tr>
            </table>
        </td>
    </tr>
</table>