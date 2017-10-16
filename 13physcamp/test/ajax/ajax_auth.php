<?php
switch ($_GET['method']) {
case 'lookup':
    echo '<h2>查詢資料</h2>';
    break;
case 'edit':
    //echo "<script>showMessage('報名已截止');//$('#look-up').click();</script>";
    //exit();
    echo '<h2>修改資料</h2>';
    break;
case 'upload':
    //echo "<script>showMessage('報名已截止');//$('#look-up').click();</script>";
    //exit();
    echo '<h2>上傳照片</h2>';
    break;
}

?>

<form id="ajax-form" method="POST" action="">
<table><tbody>
<tr style="display:none;"><td></td><td><input name="method" type="hidden" value="<?=$_GET['method']?>" /></td></tr>
<tr><td>身分證字號：</td><td><input name="ID" type="text" size="12" maxlength="10" /></td></tr>
<tr style="text-align:center;"><td colspan="2"><input name="Submit" type="submit" value="送出" id="submit" />&nbsp;<input name="Reset" type="reset" value="重新填寫" /></tr>
</tbody></table>
</form>
<script>
$('#ajax-form').submit(function(){
    e = $(this).serialize();
    $.get('./ajax/ajax_get_data.php', e, function(data,textStatus){
        showData(data);
    });
    return false;
});
</script>
