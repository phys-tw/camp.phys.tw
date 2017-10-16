<?php
    include '../include/connect.php';
    
    $method = $_GET['method'];
    $AutoNo = $_GET['AutoNo'];
    
    switch ($method) {
    case 'edit':
        if ($AutoNo=='0') {
            //echo "<script>showMessage('Will open soon');//$('#look-up').click();</script>";
            //exit();
            ?>
            <h2>我要報名</h2>
            <p>E-mail 欄位請填寫您經常使用的電子郵件信箱，以免遺漏任何重要資訊。</p>
            <form id="ajax-form" method="POST" action="" enctype="multipart/form-data">
            <table class="form"><tbody>
            <tr style="display:none;"><td>編號：</td><td><input name="AutoNo" type="hidden" value="0" /></td></tr>
            <tr><td>姓名：</td><td><input name="Name" type="text" size="12" maxlength="5" value="" /></td></tr>
            <tr><td>性別：</td><td><input name="Sex" type="radio" value="1"/>男&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="Sex" type="radio" value="2"/>女</td></tr>
            <tr><td>身分證字號：</td><td><input name="ID" type="text" size="12" maxlength="10" /></td></tr>
            <tr><td>出生年月日：</td>
                <td><select name="B_Year">
                    <option value="" selected="selected"></option>
                    <option value="1988">1988</option>
                    <option value="1989">1989</option>
                    <option value="1990">1990</option>
                    <option value="1991">1991</option>
                    <option value="1992">1992</option>
                    <option value="1993">1993</option>
                    <option value="1994">1994</option>
                    <option value="1995">1995</option>
                    <option value="1996">1996</option>
                    <option value="1997">1997</option>
                </select>年
                <select name="B_Month">
                    <option value="" selected="selected"></option>
                    <option value="1"<?= ($p_B_Month == "01" ? ' selected' : '') ?>>01</option>
                    <option value="2"<?= ($p_B_Month == "02" ? ' selected' : '') ?>>02</option>
                    <option value="3"<?= ($p_B_Month == "03" ? ' selected' : '') ?>>03</option>
                    <option value="4"<?= ($p_B_Month == "04" ? ' selected' : '') ?>>04</option>
                    <option value="5"<?= ($p_B_Month == "05" ? ' selected' : '') ?>>05</option>
                    <option value="6"<?= ($p_B_Month == "06" ? ' selected' : '') ?>>06</option>
                    <option value="7"<?= ($p_B_Month == "07" ? ' selected' : '') ?>>07</option>
                    <option value="8"<?= ($p_B_Month == "08" ? ' selected' : '') ?>>08</option>
                    <option value="9"<?= ($p_B_Month == "09" ? ' selected' : '') ?>>09</option>
                    <option value="10"<?= ($p_B_Month == "10" ? ' selected' : '') ?>>10</option>
                    <option value="11"<?= ($p_B_Month == "11" ? ' selected' : '') ?>>11</option>
                    <option value="12"<?= ($p_B_Month == "12" ? ' selected' : '') ?>>12</option>
                </select>月
                <select name="B_Day">
                    <option value="" selected="selected"></option>
                    <option value="1"<?= ($p_B_Day == "01" ? ' selected' : '') ?>>01</option>
                    <option value="2"<?= ($p_B_Day == "02" ? ' selected' : '') ?>>02</option>
                    <option value="3"<?= ($p_B_Day == "03" ? ' selected' : '') ?>>03</option>
                    <option value="4"<?= ($p_B_Day == "04" ? ' selected' : '') ?>>04</option>
                    <option value="5"<?= ($p_B_Day == "05" ? ' selected' : '') ?>>05</option>
                    <option value="6"<?= ($p_B_Day == "06" ? ' selected' : '') ?>>06</option>
                    <option value="7"<?= ($p_B_Day == "07" ? ' selected' : '') ?>>07</option>
                    <option value="8"<?= ($p_B_Day == "08" ? ' selected' : '') ?>>08</option>
                    <option value="9"<?= ($p_B_Day == "09" ? ' selected' : '') ?>>09</option>
                    <option value="10"<?= ($p_B_Day == "10" ? ' selected' : '') ?>>10</option>
                    <option value="11"<?= ($p_B_Day == "11" ? ' selected' : '') ?>>11</option>
                    <option value="12"<?= ($p_B_Day == "12" ? ' selected' : '') ?>>12</option>
                    <option value="13"<?= ($p_B_Day == "13" ? ' selected' : '') ?>>13</option>
                    <option value="14"<?= ($p_B_Day == "14" ? ' selected' : '') ?>>14</option>
                    <option value="15"<?= ($p_B_Day == "15" ? ' selected' : '') ?>>15</option>
                    <option value="16"<?= ($p_B_Day == "16" ? ' selected' : '') ?>>16</option>
                    <option value="17"<?= ($p_B_Day == "17" ? ' selected' : '') ?>>17</option>
                    <option value="18"<?= ($p_B_Day == "18" ? ' selected' : '') ?>>18</option>
                    <option value="19"<?= ($p_B_Day == "19" ? ' selected' : '') ?>>19</option>
                    <option value="20"<?= ($p_B_Day == "20" ? ' selected' : '') ?>>20</option>
                    <option value="21"<?= ($p_B_Day == "21" ? ' selected' : '') ?>>21</option>
                    <option value="22"<?= ($p_B_Day == "22" ? ' selected' : '') ?>>22</option>
                    <option value="23"<?= ($p_B_Day == "23" ? ' selected' : '') ?>>23</option>
                    <option value="24"<?= ($p_B_Day == "24" ? ' selected' : '') ?>>24</option>
                    <option value="25"<?= ($p_B_Day == "25" ? ' selected' : '') ?>>25</option>
                    <option value="26"<?= ($p_B_Day == "26" ? ' selected' : '') ?>>26</option>
                    <option value="27"<?= ($p_B_Day == "27" ? ' selected' : '') ?>>27</option>
                    <option value="28"<?= ($p_B_Day == "28" ? ' selected' : '') ?>>28</option>
                    <option value="29"<?= ($p_B_Day == "29" ? ' selected' : '') ?>>29</option>
                    <option value="30"<?= ($p_B_Day == "30" ? ' selected' : '') ?>>30</option>
                    <option value="31"<?= ($p_B_Day == "31" ? ' selected' : '') ?>>31</option>
                </select>日</td>
            </tr>
            <tr><td>監護人姓名：</td><td><input name="ParentName" type="text" size="12" maxlength="5" value="" /></td></tr>
            <tr><td>E-mail：</td><td><input name="Email" type="text" size="40" maxlength="60" value="" /></td></tr>
            <tr><td>家裡電話：</td><td> ( <input name="P_Prefix" type="text" size="3" maxlength="3" value="" /> ) <input name="P_Code" type="text" size="11" maxlength="9" value="" /></td></tr>
            <tr><td>手機：</td><td><input name="CellPhone" type="text" size="12" maxlength="11" value="" /></td></tr>
            <tr><td>地址：</td><td><input name="Address" type="text" size="52" maxlength="150" value="" /></td></tr>
            <tr><td>就讀高中：</td><td><input name="School" type="text" size="30" maxlength="20" value="" /></td></tr>
            <tr><td>年級：</td><td><select name="Grade"><option value="" selected="selected"></option><option value="1"<?= ($p_Grade == 1 ? ' selected' : '') ?>>一年級</option><option value="2"<?= ($p_Grade == 2 ? ' selected' : '') ?>>二年級</option><option value="3"<?= ($p_Grade == 3 ? ' selected' : '') ?>>三年級</option></select></td></tr>
            <tr><td>營服大小：</td><td><select name="size">
		        <option value="" selected="selected"></option>
		        <option value="XS"<?= ($p_Size == 'XS' ? ' selected' : '') ?>>XS</option>
		        <option value="S"<?= ($p_Size == 'S' ? ' selected' : '') ?>>S</option>
		        <option value="M"<?= ($p_Size == 'M' ? ' selected' : '') ?>>M</option>
		        <option value="L"<?= ($p_Size == 'L' ? ' selected' : '') ?>>L</option>
		        <option value="XL"<?= ($p_Size == 'XL' ? ' selected' : '') ?>>XL</option>
		        <option value="2L"<?= ($p_Size == '2L' ? ' selected' : '') ?>>2L</option>
		        <option value="3L"<?= ($p_Size == '3L' ? ' selected' : '') ?>>3L</option>
            </select></td></tr>
            <tr><td>自我介紹：<br>自我介紹是我們篩選的重要標準，請盡量地填寫</td><td><textarea name="Introduction" cols="53" rows="25"></textarea></td></tr>
            <tr style="text-align:center;"><td colspan="2"><input name="Submit" type="submit" value="送出" id="submit" />&nbsp;<input name="Reset" type="reset" value="重新填寫" /></tr>
            </tbody></table>
            </form>
            <script>
            $('#ajax-form').submit(function(){
                if ($('#ajax-form #submit').val()=="送出") {
                    showMessage("麻煩請再檢查資料，確認無誤後送出");
                    $('#ajax-form #submit').val("確認送出");
                    return false;
                }
                e = $(this).serialize();
                
                $.post('./ajax/ajax_save_data.php', e, function(data,textStatus){
					var obj = jQuery.parseJSON(data);
                    if (typeof(obj['error'])!='undefined') {
                        alert(obj['error']);
                        return false;
                    } else {
                        showData(obj['data']);
                        showMessage(obj['message']);
                        $('#button-state').html("");
                    }
                });
                return false;
            });
            $('#ajax-form input,select,textarea').change(function(){
                $('#button-state').html("sign-up");
            });
            </script>
            <?php
        } else {
            //echo "<script>showMessage('報名已截止');//$('#look-up').click();</script>";
            //exit();
            $p_ID = strtoupper($_GET['ID']);
            $sql = sprintf("SELECT * FROM `$table_name` WHERE `ID`='%s' AND `State`='0'", mysql_real_escape_string($p_ID));
            $result = mysql_query($sql) or die('Server Error');
            if (mysql_num_rows($result)!=1) {
                echo "<script>showMessage('查詢不到資料，請重新輸入。');$('#edit').click();</script>";
                exit();
            }
            $row = mysql_fetch_row($result);
            
            ?>
            <h2>修改資料</h2>
            <p>E-mail 欄位請填寫您經常使用的電子郵件信箱，以免遺漏任何重要資訊。</p>
            <!--<p>並請於填寫完報名表單後，至上傳照片系統上傳一張你的照片，才算報名成功喔^^</p>-->
            <form id="ajax-form" method="POST" action="">
            <table class="form"><tbody>
            <tr style="display:none;"><td>編號：</td><td><input name="AutoNo" type="hidden" value="<?=$row[0]?>" /><?=$row[0]?></td></tr>
            <tr><td>姓名：</td><td><input name="Name" type="text" size="12" maxlength="5" value="<?=$row[3]?>" /></td></tr>
            <tr><td>性別：</td><td><input name="Sex" type="hidden" size="12" maxlength="5" value="<?=$row[4]?>" /><?php echo $row[4]=='1'?'男':'女';?></tr>
            <tr><td>身分證字號：</td><td><input name="ID" type="hidden" size="12" maxlength="10" value="<?=$row[5]?>" /><?=$row[5]?></td></tr>
            <?php
                $p_Birthday = strtotime($row[6]);
                $p_B_Year= date("Y",$p_Birthday);
                $p_B_Month = date("m",$p_Birthday);
                $p_B_day = date("d",$p_Birthday);
            ?>
            <tr><td>出生年月日：</td>
                <td><?=$p_B_Year?> 年 <?=$p_B_Month?> 月 <?=$p_B_day?> 日<input name="B_Year" type="hidden" size="12" maxlength="5" value="<?=$p_B_Year?>" /><input name="B_Month" type="hidden" size="12" maxlength="5" value="<?=$p_B_Month?>" /><input name="B_Day" type="hidden" size="12" maxlength="5" value="<?=$p_B_day?>" /></td>
            </tr>
            <tr><td>監護人姓名：</td><td><input name="ParentName" type="text" size="12" maxlength="5" value="<?=$row[7]?>" /></td></tr>
            <tr><td>E-mail：</td><td><input name="Email" type="text" size="40" maxlength="60" value="<?=$row[8]?>" /></td></tr>
            <?php
                $p_phone = preg_split('/[\(,\)]/', $row[9]);
                $p_prefix = $p_phone[1];
                $p_code = $p_phone[2];
            ?>
            <tr><td>家裡電話：</td><td> ( <input name="P_Prefix" type="text" size="3" maxlength="3" value="<?=$p_prefix?>" /> ) <input name="P_Code" type="text" size="11" maxlength="9" value="<?=$p_code?>" /></td></tr>
            <tr><td>手機：</td><td><input name="CellPhone" type="text" size="12" maxlength="11" value="<?=$row[10]?>" /></td></tr>
            <tr><td>地址：</td><td><input name="Address" type="text" size="52" maxlength="150" value="<?=$row[11]?>" /></td></tr>
            <tr><td>就讀高中：</td><td><input name="School" type="text" size="30" maxlength="20" value="<?=$row[12]?>" /></td></tr>
            <?php
                $p_Grade = $row[13];
                $p_Size = $row[22];
            ?>
            <tr><td>年級：</td><td><select name="Grade"><option value="" selected="selected"></option><option value="1"<?= ($p_Grade == 1 ? ' selected' : '') ?>>一年級</option><option value="2"<?= ($p_Grade == 2 ? ' selected' : '') ?>>二年級</option><option value="3"<?= ($p_Grade == 3 ? ' selected' : '') ?>>三年級</option></select></td></tr>
            <tr><td>營服大小：</td><td><select name="size">
		        <option value="" selected="selected"></option>
		        <option value="XS"<?= ($p_Size == 'XS' ? ' selected' : '') ?>>XS</option>
		        <option value="S"<?= ($p_Size == 'S' ? ' selected' : '') ?>>S</option>
		        <option value="M"<?= ($p_Size == 'M' ? ' selected' : '') ?>>M</option>
		        <option value="L"<?= ($p_Size == 'L' ? ' selected' : '') ?>>L</option>
		        <option value="XL"<?= ($p_Size == 'XL' ? ' selected' : '') ?>>XL</option>
		        <option value="2L"<?= ($p_Size == '2L' ? ' selected' : '') ?>>2L</option>
		        <option value="3L"<?= ($p_Size == '3L' ? ' selected' : '') ?>>3L</option>
            </select></td></tr>
            <tr><td>自我介紹：<br>自我介紹是我們篩選的重要標準，請盡量地填寫</td><td><textarea name="Introduction" cols="53" rows="25"><?=htmlentities_m($row[14]) ?></textarea></td></tr>
            <tr style="text-align:center;"><td colspan="2"><input name="Submit" type="submit" value="送出" id="submit" />&nbsp;<input name="Reset" type="reset" value="重新填寫" /></tr>
            </tbody></table>
            </form>
            <script>
            $('#ajax-form').submit(function(){
                if ($('#ajax-form #submit').val()=="送出") {
                    showMessage("麻煩請再檢查資料，確認無誤後送出");
                    $('#ajax-form #submit').val("確認送出");
                    return false;
                }
                e = $(this).serialize();
                
                $.post('./ajax/ajax_save_data.php', e, function(data,textStatus){
					var obj = jQuery.parseJSON(data);
                    if (typeof(obj['error'])!='undefined') {
                        alert(obj['error']);
                        return false;
                    } else {
                        showData(obj['data']);
                        showMessage(obj['message']);
                        $('#button-state').html("");
                    }
                });
                return false;
            });
            $('#ajax-form input,select,textarea').change(function(){
                $('#button-state').html("sign-up");
            });
            </script>
            <?php
        }
        break;
    case 'lookup':
        $p_ID = strtoupper($_GET['ID']);
        //echo $p_ID;
        $sql = sprintf("SELECT * FROM `$table_name` WHERE `ID`='%s' AND `State`='0'", mysql_real_escape_string($p_ID));
        $result = mysql_query($sql) or die('Server Error');
        if (mysql_num_rows($result)!=1) {
            echo "<script>showMessage('查詢不到資料，請重新輸入。');$('#look-up').click();</script>";
            exit();
        }
        $row = mysql_fetch_row($result);
        //print_r($row);
        ?>
        <h2>查詢資料</h2>
        <table class="form"><tbody>
        <tr><td>姓名：</td><td><?=$row[3]?></td></tr>
        <tr><td>性別：</td><td><?php echo $row[4]=='1'?'男':'女';?></td></tr>
        <tr><td>身分證字號：</td><td><?=$row[5]?></td></tr>
        <tr><td>出生年月日：</td><td><?=$row[6]?></td></tr>
        <tr><td>監護人姓名：</td><td><?=$row[7]?></td></tr>
        <tr><td>E-mail：</td><td><?=$row[8]?></td></tr>
        <tr><td>家裡電話：</td><td><?=$row[9]?></td></tr>
        <tr><td>手機：</td><td><?=$row[10]?></td></tr>
        <tr><td>地址：</td><td><?=$row[11]?></td></tr>
        <tr><td>就讀高中：</td><td><?=$row[12]?></td></tr>
        <tr><td>年級：</td><td><?=$row[13]?></td></tr>
        <tr><td>衣服尺寸：</td><td><?=$row[22]?></td></tr>
        <tr><td>自我介紹：<br>(請盡量填寫)</td><td><?=str_replace("\n", "<br>", htmlentities_m($row[14]) ) ?></td></tr>
        <tr><td>照片：</td><td><img src="/13physcamp/upload/<?=htmlentities_m($row[21])?>"/ ></td></tr>
        </tbody></table>
        <?php
        break;
    case 'upload':
    	$p_ID = strtoupper($_GET['ID']);
        //echo $p_ID;
        $sql = sprintf("SELECT * FROM `$table_name` WHERE `ID`='%s' AND `State`='0'", mysql_real_escape_string($p_ID));
        $result = mysql_query($sql) or die('Server Error');
        if (mysql_num_rows($result)!=1) {
            echo "<script>showMessage('查詢不到資料，請重新輸入。');$('#look-up').click();</script>";
            exit();
        }
    	?>
    	<h2>照片上傳</h2>
    	<p>檔案大小需小於1Mb，副檔名只可以是jpg,png,gif</p>
    	<iframe style="border:none;width:100%;height:200px;" src="./ajax/frame.php?ID=<?=$p_ID?>"></iframe>
    	<?php
    	break;
    default:
        echo json_encode(array('error'=>"error"));
	}
?>
<?php
    function htmlentities_m($x) {
        return htmlentities($x, ENT_QUOTES, "UTF-8");
    }
?>
