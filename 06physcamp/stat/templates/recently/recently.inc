<table style="background-color: #000000; width: 100%; border: 0px;" cellspacing="1" align="center" cellpadding="4">
    <tr style="background-color: #CCE483">
        <td colspan="5">
            &nbsp; <img src="images/tb_title.gif" align="absmiddle"> &nbsp;最新<?= $conf['record_limit'] ?>條訪問記錄
        </td>
    </tr>
    <tr style="background-color: #CCE483">
        <td>訪問時間</td>
        <td>IP地址</td>
        <td>被訪頁面</td>
        <td>來路頁面</td>
        <td>來自</td>
    </tr>
    <?php foreach ($recentlyArray as $value) { ?>
    <tr style="background-color: #FFFBEE">
    <td><?= strftime("%Y-%m-%d %H:%M:%S", $value[0]) ?></td>
    <td><?= $value[1] ?></td>
    <td><?php if (trim($value[2]) != "") { ?><a href="<?= $value[2] ?>" title="<?= $value[2] ?>" target="_blank"><?= substr($value[2], 0, 25)."......" ?></a><?php } ?></td>
    <td><?php if (trim($value[3]) != "") { ?><a href="<?= $value[3] ?>" title="<?= $value[3] ?>" target="_blank"><?= substr($value[3], 0, 25)."......" ?></a><?php } ?></td>
    <td><?= $value[4] ?></td>
    </tr>
    <?php } ?>
</table>
