<?php
if($_REQUEST["form"]=="signup")
{
echo <<<END
<div class="register_hide_div" id="signup">
				<h2>我要報名</h2>
				<div style="color:red;font-style:italic;font-size:16px;text-align:right;width:100%;margin-top:-20px;">E-mail 欄位請填寫您經常使用的電子郵件信箱，以免遺漏任何重要資訊。</div>
				<form name="reg_form" action="upload_data.php" method="POST">
					<div class="reg_wrap"><div class="reg_q">姓名：</div><div class="reg_a"><input name="name" onkeydown="if (event.keyCode == 13) { return false;}" type="text" id="reg_name" maxlength="10" /></div></div>
					<div class="reg_wrap"><div class="reg_q">性別：</div><div class="reg_a">男<input type="radio" id="reg_sex" name="sex" value="1" checked />　女<input name="sex" type="radio" name="sex" value="2" /></div></div>
					<div class="reg_wrap"><div class="reg_q">身分證字號：</div><div class="reg_a"><input name="id" onkeydown="if (event.keyCode == 13) { return false;}" type="text" id="reg_id" maxlength="10" /></div></div>
					<div class="reg_wrap"><div class="reg_q">生日：</div>
					<div class="reg_a">
						<input onkeydown="if (event.keyCode == 13) { return false;}" type="text" name="year" id="reg_year" maxlength="4" width="4" size="3" />年(西元)
						<input onkeydown="if (event.keyCode == 13) { return false;}" type="text" name="month" id="reg_month" maxlength="2" max="12" size="1" />月
						<input onkeydown="if (event.keyCode == 13) { return false;}" type="text" name="day" id="reg_day" maxlength="2" max="31" size="1" />日
					</div></div>
					<div class="reg_wrap"><div class="reg_q">監護人姓名：</div><div class="reg_a"><input name="parent" onkeydown="if (event.keyCode == 13) { return false;}" type="text" id="reg_parent" maxlength="10" /></div></div>
					<div class="reg_wrap"><div class="reg_q">E-mail：</div><div class="reg_a"><input name="email" onkeydown="if (event.keyCode == 13) { return false;}" type="text" id="reg_email" /></div></div>
					<div class="reg_wrap"><div class="reg_q">家裡電話：</div><div class="reg_a"><input name="home_phone" onkeydown="if (event.keyCode == 13) { return false;}" type="text" id="reg_home_phone" />(XX-XXXXXXXX)</div></div>
					<div class="reg_wrap"><div class="reg_q">手機：</div><div class="reg_a"><input name="cell_phone" onkeydown="if (event.keyCode == 13) { return false;}" type="text" id="reg_cell_phone" maxlength="10" /></div></div>
					<div class="reg_wrap"><div class="reg_q">地址：</div><div class="reg_a"><input name="addr" onkeydown="if (event.keyCode == 13) { return false;}" type="text" id="reg_addr" /></div></div>
					<div class="reg_wrap"><div class="reg_q">就讀高中：</div><div class="reg_a"><input name="school" onkeydown="if (event.keyCode == 13) { return false;}" type="text" id="reg_school" /></div></div>
					<div class="reg_wrap"><div class="reg_q">年級：</div><div class="reg_a"><input name="grade" onkeydown="if (event.keyCode == 13) { return false;}" type="text" id="reg_grade" maxlength="1" /></div></div>
					<div class="reg_wrap"><div class="reg_q">自我介紹：</div><div class="reg_a"><textarea name="intro" id="reg_intro" style="width:95%;" rows="6">自我介紹是我們篩選的重要標準，請盡量地填寫</textarea></div></div>
					<input type="hidden" name="type" value="new_reg" />
					<div class="reg_q" style="float:right;margin-right:20%;"><input type="button" value="送出" style="width:150px;height:30px;border:2px black outset" onclick="submit_form()" /></div>
				</form>
			</div>

END;
}
elseif($_REQUEST["form"]=="lookup")
{
echo <<<END

<div class="register_hide_div" id="lookup">
				<h2>查詢資料</h2>
				
					<div class="reg_q">身分證字號：</div><div class="reg_a"><input type="text" name="id" maxlength="10" id="lookup_id" /></div>
					<input type="hidden" name="type" value="lookup" />
					<div class="reg_q" style="float:right;margin-right:20%;"><input type="button" value="送出" onclick="showData()" style="width:150px;height:30px;border:2px black outset" /></div>
				
			</div>

END;
}
elseif($_REQUEST["form"]=="edit")
{
echo <<<END

<div class="register_hide_div" id="edit">
				<h2>修改資料</h2>
				
					<div class="reg_q">身分證字號：</div><div class="reg_a"><input type="text" name="id" maxlength="10" id="edit_id" /></div>
					<input type="hidden" name="type" value="lookup" />
					<div class="reg_q" style="float:right;margin-right:20%;"><input type="button" value="送出" onclick="editData()" style="width:150px;height:30px;border:2px black outset" /></div>
				
			</div>

END;
}
elseif($_REQUEST["form"]=="cancel")
{
echo <<<END

<div class="register_hide_div" id="edit">
				<h2>取消報名</h2>
				
					<div class="reg_q">身分證字號：</div><div class="reg_a"><input type="text" name="id" maxlength="10" id="cancel_id" /></div>
					<input type="hidden" name="type" value="lookup" />
					<div class="reg_q" style="float:right;margin-right:20%;"><input type="button" value="送出" onclick="cancel()" style="width:150px;height:30px;border:2px black outset" /></div>
				
			</div>

END;
}		
			
	