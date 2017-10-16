#!/usr/bin/perl

#### Script作成品 ####################
##									##
## YY-BOARD v3.21 (00/06/26) 		##
##   Copyright(C) KENT WEB 2000		##
##   E-MAIL: webmaster@kent-web.com	##
##   WWW: http://www.kent-web.com/	##
##----------------------------------##
#	中文化 by Blue EV's Studio
#	網址		http://cgiunion.hypermart.net/
#	Edmond
#	網址		http://edmonddomain.hypermart.net/
#	電郵		cyvc@netvigator.com
#	Vivienne
#	網址		http://viviennechan.hypermart.net/
#	電郵		vivien90@netvigator.com
#-----------------------------------------------------------------------------------
#使用守則															
#	1.	Blue EV's Studio的CGI是免費軟件，希望是用作個人網頁之用，禁止任何商業組織使用
#
#	2.	未經同意，嚴禁私自轉載或複製或提供此說明檔及本中文化程式
#
#	3.	不得刪除任何版權宣告，否則Blue EV's Studio會停止所有CGI的開放下載
#
#	4.	本CGI對閣下做成之任何損失,將不會負上任何責任
#
#	5.	希望使用本CGI時,發現有錯誤之處,請告知作者
######################################


##+--------------------------------+##
##									##
##CUTE BBS -Blue- v0.0716 (00.07.16)##
##									##
## Edit By CGI Cafe.		�j		##
##	URL: http://saya.g--z.com/		##
##									##
##+--------------------------------+##

$ver = 'CUTE BBS[B] v0.0716'; # 版本

## ---[注意事項]------------------------------------------------##
##
##
##	CGI架構	##
##								##
##	|--cutebbs.cgi ---[755]					##
##	|--cutebbs2.cgi --[755}					##
##	|--ccount.dat ----[666}					##
##	|--pastno.dat ----[666]					##
##	|--cutebbs.log ---[666]					##
##	|--1.html --------[666]					##
##								##
##--------------------------------------------------------------##


#============#
#  設定項目  #
#============#

#require './jcode.pl';		

$title = "++ 2007 NTU PhysCamp 留言版 ++";	# 標題名稱
$t_color = "#008080";		# 標題顏色
$t_point = '12';			# 標題大小(以PT計)
$t_face = "Comic Sans MS";	# 標題字型

$pt = '10';					# 文字大小(以PT計)
$backgif = "http://st.phys.ntu.edu.tw/~physcamp/07physcamp/img/physcampbg01.jpg";				# 背景圖檔(以http://為先)
$bgcolor = "#FFFFFF";		# 背景顏色
$text = "#808080";			# 文字色

$homepage = "http://st.phys.ntu.edu.tw/physcamp";# 首頁位置
$bbstop = "./cutebbs.cgi";	# 留言板首頁(不用更改)
$max = 1000;					# 最大留言編數
$pass = 'physland';				# 管理者密碼(8個英數字以內)

#--Style 樣式----------------------
$a_link = "#1a99ff";		# Link顏色
$hb_link = "#99ccff";		# 指示時背景色
$h_link = "#0066ff";		# 指示時文字色
$border_c = "#80e6ff";		# 記事外框色
$tback_color = "#ffffff";	# 記事部份背景色
$tfont_color = "#0066ff";	# 記事部份文字色

#--Icon位置--------
$icon_dir = "http://st.phys.ntu.edu.tw/~b93202001/img/";		# 不是和cutebbs.cgi在同一目錄下時,就以http://表示

#--圖檔設定(要上下對應)------
@icon1 = ('happy.gif','no.gif','pu.gif','sad.gif','very_happy.gif','what.gif');

@icon2 =  ('快樂','不要','伸舌頭','傷心','很高興','什麼');


#--使用icon? (0=no 1=yes)-------------
$icon_mode = 1;			

#--管理者專用icon (0=no 1=yes)-----
$my_icon = 1;			# 在留言時,於刪除位置輸入密碼
$my_gif  = 'kid2.gif';		# icon檔名稱

$res_sort = 1;			# 回覆留言放置上最前 (0=no 1=yes)

#--HOST取得方法----------------------
$get_remotehost = 0;		# 0-->$ENV{'REMOTE_HOST'} 1-->gethostbyaddr 

#--標題圖檔 
$title_gif = "http://st.phys.ntu.edu.tw/physcamp/07physcamp/img/guestbg01.jpg";	# 圖檔位置http://以先
$tg_w = '588';				# 圖檔闊
$tg_h = '61';				# 圖檔高

#--鎖定設定----------------------
#  --> 0=no		1=symlink	2=open
$lockkey = 0;

$lockfile = "./cutebbs.lock";	# 鎖定檔名稱
$cntlock = "./cutecnt.lock";	# 人數計鎖定檔名稱

#--人數計設定----------------------
$counter = 1;			# 0=不用, 1=純文字, 2=圖像
$mini_fig = 5;			# 顯示位數
$cnt_color = "#0066ff";		# 純文字時的文字色
$gif_path = "./img";		# 人數計的圖檔位置
$mini_w = 15;			# 圖檔闊度
$mini_h = 15;			# 圖檔高度
$cntfile = "./ccount.dat";	# 人數記錄檔名稱

$tagkey = 0;				# 語法使用? (0=no 1=yes)
$script  = "./cutebbs.cgi";	# CGI主程式的位置

$logfile = "./cutebbs.log";	# 記錄檔位置
$sub_color = "#3366ff";		# 留言標題背景色
$tbl_color = "#d8f8ff";		# 留言顯示部份背景色
$t_w = 65;					# 留言顯示框的闊度(是以%計算,至少要有50)
$home_icon = 1;				# home icon使用? (0=no 1=yes)
$home_gif = "home.gif";		# home icon圖檔名
$home_wid = 21;				# 圖檔闊度
$home_hei = 21;				# 圖檔高度

$method = 'POST';		# method形式 (POST/GET)
$pagelog = 10;			# 一頁顯示留言數
$mailing = 0;			# 留言通知 (0=no 1=yes)
$mailto = 'cyvc@netvigator.com';	# 留言通知的email地址
$sendmail = '/usr/lib/sendmail';# sendmail的位置
$mail_me = 0;			# 有人留言時通知自己 (0=no 1=yes)
$base_url = "";			# 其他留言時去到的位置

#--文字色設定--
@COLORS = ('808080','4080f0','40a0c0','00ff00','8060c0','ff80e6','ff6680','ff9900');

$wrap = 'soft';			# 留言是否自動轉行 (soft=手動 hard=自動)
$autolink = 1;			# 自動連結形成? (0=no 1=yes)

#    <!--上方--> <!--下方--> 位置是放廣告碼的!!
#    除廣告外.可以插入midi,自計人數計或其他東東都可以!~
$banner1 = '<!--上方-->';	# 在留言板上方插入
$banner2 = '<!--下方-->';	 # 在留言板下方插入

#--禁止ip----------
@deny = (
	"anonymizer",
	"cache*.*.interlog.com",
	"219.131.179.178",
	"",
	"",
	"",
	"",
	"",
	""
	);

#--舊留言設定---------------------------
$pastkey = 0;			# 舊留言編集使用? (0=no 1=yes)
$nofile  = "./pastno.dat";	# 舊留言用NO檔
$past_dir = ".";		# 記錄檔位置
$log_line = '100';		# 一個編集可存留言數
$yybbs2 = "./cutebbs2.cgi";	# 舊編集管理檔位置


#============#
#  設定完成  #
#============#

## --- 開始
&decode;
if ($mode eq "howto") { &howto; }
if ($mode eq "find") { &find; }
if ($mode eq "usr_del") { &usr_del; }
if ($mode eq "msg_del") { &msg_del; }
if ($mode eq "msg") { &regist; }
if ($mode eq "res_msg") { &res_msg; }
if ($mode eq "admin") { &admin; }
if ($mode eq "admin_del") { &admin_del; }
if ($mode eq "image") { &image; }
&axs_check;
&html_log;

#----------------#
#  禁止IP  #
#----------------#
sub axs_check {
	# HOST取得
	&get_host;

	if ($deny[0]) {
		$flag=0;
		foreach (@deny) {
			if ($_ eq '') { next; }
			$_ =~ s/\*/\.\*/g;
			if ($host =~ /$_/) { $flag=1; last; }
		}
		if ($flag) { &error("你的已經被禁止留言") }
	}
}

## --- �L?�\��?
sub html_log {
	# �N�b�L�[������
	&get_cookie;

	# �t�H�[?��������
	&get_agent;

	# ?�O������?��
	open(IN,"$logfile") || &error("不能打開 $logfile",'NOLOCK');
	@lines = <IN>;
	close(IN);

	# �L?��?���J�b�g
	shift(@lines);

	# �e�L?�������z���f�[�^������
	@new = ();
	foreach $line (@lines) {
		local($num,$k,$dt,$na,$em,$sub,$com,
			$url,$host,$pw,$color,$icon) = split(/<>/, $line);

		# �e�L?���W��
		if ($k eq "") { push(@new,$line); }
	}

	# ?�X�L?��?�X?�������������z�����t?������
	@lines = reverse(@lines);

	# �w�b�_���o��
	&header;

	# �J�E?�^??
	if ($counter) { &counter; }

	# �^�C�g??
	print "<center>$banner1<P>\n";
	if ($title_gif eq '') {
		print "<font color=\"$t_color\" size=6 face=\"$t_face\"><b><SPAN>$title</SPAN></b></font>\n";
	}
	else {
		print "<img src=\"$title_gif\" width=\"$tg_w\" height=\"$tg_h\">\n";
	}

	print "<font color=\"#0066ff\"><br>+------------------------------------------------------------------+<br></font>\n";
	print "[<a href=\"$homepage\" target=_top>回台大物理營網站</a>]\n";
	#print "[<a href=\"$bbstop\">回留言板</a>]\n";
	print "[<a href=\"$script?mode=howto\">使用方法</a>]\n";
	print "[<a href=\"$script?mode=find\">搜尋</a>]\n";

	# ��??�O��??�N?���\��
	if ($pastkey) {
		print "[<a href=\"$yybbs2\">舊留言編集</a>]\n";
	}

	print <<"EOM";
[<a href="$script?mode=msg_del">刪除留言</a>]
[<a href="$script?mode=admin">管理用</a>]

<STYLE type="text/css">
<!--
A{color:$a_link;text-decoration:none;}
A:hover,A:active{text-decoration:underline overline;background-color:$hb_link; color:$h_link;}
TABLE,TD{font-size:9pt;}
input,textarea { 
cursor:hand;
border-top : 3px double $border_c ; border-bottom : 3px double $border_c ;
border-left :3px double $border_c ; border-right : 3px double $border_c ;
background-color :$tback_color;
font-size : 9pt ; color : $tfont_color ; 
}
input,textarea,select {
border-left:1px solid $input_border;
border-right:1px solid $input_border;
border-top:1px solid $input_border;
border-bottom:1px solid $input_border; 
background-color : $input_bg; color : $input_color;}

body{
	scrollbar-face-color:#99ccff;
	scrollbar-shadow-color:#99ccff;
	scrollbar-highlight-color:white;
	scrollbar-3dlight-color:#99ccff;
	scrollbar-darkshadow-color:#6699ff;
	scrollbar-track-color:#66ccfff;
	scrollbar-arrow-color:white;}
-->
</STYLE>

<font color="#0066ff">
<br>+------------------------------------------------------------------+<br>
如果你是針對營隊內容有疑問，請到[<a href="http://phpbb.phys.tw/viewforum.php?f=14&sid=44cdd0a3bcbd53402652b138662dd142">討論區</a>]，能更快得到解答喔！
<br>+------------------------------------------------------------------+<br>
</font>
<form method="$method" action="$script">
<input type=hidden name=mode value="msg">
<blockquote>
<table border=0 cellspacing=0>
<tr>
  <td nowrap><b>姓名</b></td>
  <td><input type=text name=name size="$nam_wid" value="$c_name"></td>
</tr>
<tr>
  <td nowrap><b>電郵</b></td>
  <td><input type=text name=email size="$nam_wid" value="$c_email"></td>
</tr>
<tr>
  <td nowrap><b>標題</b></td>
  <td nowrap>
    <input type=text name=sub size="$subj_wid">
�@  <input type=submit value="確定"><input type=reset value="重整">
  </td>
</tr>
<tr>
  <td colspan=2>
    <b>Message</b><br>
    <textarea cols="$com_wid" rows=7 name=comment wrap="$wrap"></textarea>
  </td>
</tr>
<tr>
  <td nowrap><b>網址</b></td>
  <td><input type=text size="$url_wid" name=url value="http://$c_url"></td>
</tr>
EOM

	# ��?���A�C�R?���z�����t��
	if ($my_icon) {
		push(@icon1,"$my_gif");
		push(@icon2,"管理用");
	}

	if ($icon_mode) {
		print "<tr><td nowrap><b>圖檔</b></td><td><select name=icon>\n";
		foreach(0 .. $#icon1) {
			if ($c_icon eq "$icon1[$_]") {
				print "<option value=\"$icon1[$_]\" selected>$icon2[$_]\n";			   } else {
				print "<option value=\"$icon1[$_]\">$icon2[$_]\n";
			}
		}
	print "</select> <small>選擇圖檔\n";
	print "[<a href=\"$script?mode=image\" target='_blank'>圖檔一覽</a>]</td></tr>\n";
	}

	print "<tr><td nowrap><b>密碼</b></td>\n";
	print "<td><input type=password name=pwd size=8 maxlength=8 value=\"$c_pwd\">\n";
	print "<small>刪除用密碼</small></td></tr>\n";
	print "<tr><td nowrap><b>Color</b></td><td>\n";

	# �N�b�L�[���F������������?
	if ($c_color eq "") { $c_color = $COLORS[0]; }

	foreach (0 .. $#COLORS) {
		if ($c_color eq "$COLORS[$_]") {
			print "<input type=radio name=color value=\"$COLORS[$_]\" checked> ";
			print "<font color=\"$COLORS[$_]\">★</font>\n";
		} else {
			print "<input type=radio name=color value=\"$COLORS[$_]\"> ";
			print "<font color=\"$COLORS[$_]\">★</font>\n";
		}
	}

	print "</td></tr></table></form></blockquote><font color=\"#0066ff\">+-----------------------------------------------------------------------+<p></font>\n";

	if ($FORM{'page'} eq '') { $page = 0; } 
	else { $page = $FORM{'page'}; }

	# �L??������
	$end_data = @new - 1;
	$page_end = $page + ($pagelog - 1);
	if ($page_end >= $end_data) { $page_end = $end_data; }

	foreach ($page .. $page_end) {
		($number,$k,$date,$name,$email,$sub,
			$comment,$url,$host,$pwd,$color,$icon) = split(/<>/, $new[$_]);

		if ($email) { $name = "<a href=\"mailto:$email\">$name</a>"; }

		# URL�\��
		if ($url && $home_icon) {
			$url = "<a href=\"http://$url\" target='_blank'><img src=\"$icon_dir\/$home_gif\" border=0 align=top HSPACE=10 WIDTH=\"$home_wid\" HEIGHT=\"$home_hei\" alt='首頁'></a>";
		} elsif ($url && !$home_icon) {
			$url = "&lt;<a href=\"http://$url\" target='_blank'>首頁</a>&gt;";
		}

		print "<center><TABLE border=2 bordercolor=\"#80e6ff\" width='$t_w%' cellspacing=0 bgcolor=\"$tbl_color\">\n";
		print "<TR><TD>\n";
		print "<table border=0 cellspacing=0 cellpadding=0><tr>\n";
		print "<td valign=top>[<b>$number</b>] <font color=$sub_color><b>$sub</b></font>\n";
		print "by <b>$name</b></font> ";
		print "<small> - $date</small> <font face=\"Arial,verdana\">&nbsp;</font> $url</td>\n";
		print "<td><form action=\"$script\" method=\"$method\">\n";
		print "<input type=hidden name=mode value=\"res_msg\">\n";
		print "<input type=hidden name=resno value=\"$number\">\n";
		print "<input type=submit value=\"回覆\"></td></form>";
		print "</tr></table>\n";
		print "<table border=0 cellspacing=7><tr>\n";

		if ($icon ne "") { print "<td><img src=\"$icon_dir\/$icon\"></td>\n"; }
		else { print "<td width=37>�@</td>\n"; }

		# ����??�N
		if ($autolink) { &auto_link($comment); }

		print "<td><font color=\"$color\">$comment</font></td></tr></table>\n";

		## ?�X?�b�Z�[�W���\��
		foreach $line (@lines) {
		  ($rnum,$rk,$rd,$rname,$rem,$rsub,
			$rcom,$rurl,$rho,$rp,$rc,$ri) = split(/<>/,$line);

		  if ($rem) { $rname = "<a href=\"mailto:$rem\">$rname</a>"; }

		  if ($number eq "$rk") {

			print "<center><hr width='90%' size=1 noshade></center>\n";
			print "<table cellspacing=0 cellpadding=0 border=0><tr><td width=37>�@</td>\n";

			if ($ri ne "") {
				print "<td><img src=\"$icon_dir\/$ri\"></td><td><font face=\"Arial,verdana\">&nbsp;&nbsp;</font></td>\n";
			} else {
				print "<td width=35>�@</td><td align=\"right\"><font face=\"Arial,verdana\">&nbsp;&nbsp;</font></td>\n";
			}

			print "<td><font color=\"$sub_color\"><b>$rsub</b></font> ";
			print "by <b>$rname</b></font> - ";
			print "<small>$rd</small> ";

			# URL�\��
			if ($rurl && !$home_icon) {
				print "&lt;<a href=\"http://$rurl\" target='_blank'>首頁</a>&gt;";
			} elsif ($rurl && $home_icon) {
				print "<a href=\"http://$rurl\" target='_blank'><img src=\"$icon_dir\/$home_gif\" border=0 align=top HSPACE=10 WIDTH=\"$home_wid\" HEIGHT=\"$home_hei\" alt=\"Home\"></a>";
			}

			# ����??�N
			if ($autolink) { &auto_link($rcom); }

			print "<br><font color=\"$rc\">$rcom</font></td></tr></table>\n";
		  }
		}
		print "</TD></TR></TABLE><P>\n";

	}
	print "<table border=0><tr>\n";

	# ����??
	$next_line = $page_end + 1;
	$back_line = $page - $pagelog;

	# �O��??
	if ($back_line >= 0) {
		print "<td><form method=\"$method\" action=\"$script\">\n";
		print "<input type=hidden name=page value=\"$back_line\">\n";
		print "<input type=submit value=\"上$pagelog個\">\n";
		print "</form></td>\n";	
	}

	# ?��??
	if ($page_end ne "$end_data") {
		print "<td><form method=\"$method\" action=\"$script\">\n";
		print "<input type=hidden name=page value=\"$next_line\">\n";
		print "<input type=submit value=\"下$pagelog個\">\n";
		print "</form></td>\n";
	}

	print "</tr></table><P>\n";
	&footer;
	exit;
}

## --- ?�O?��?��??
sub regist {
	# ���T�C�g�������A�N�Z�X���r?
	if ($base_url) {
		$ref_url = $ENV{'HTTP_REFERER'};
		$ref_url =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;

		if ($ref_url !~ /$base_url/) {
			&error("不正確留言",'NOLOCK');
		}
	}

	# ���O���R??�g���K�{
	if ($name eq "") { &error("請輸入姓名",'NOLOCK'); }
	if ($comment eq "") { &error("請輸入留言內容",'NOLOCK'); }
	if ($email && $email !~ /(.*)\@(.*)\.(.*)/) {
		&error("電郵地址不正確",'NOLOCK');
	}

	# ��?�A�C�R?���`�F�b�N
	if ($my_icon && $icon eq "$my_gif") {
		if ($pwd ne "$pass") { &error("只有管理者才可用",'NOLOCK'); }
	}

	# �z�X�g��������
	&get_host;

	# ?��������
	&get_time;

	# �N�b�L�[�����s
	&set_cookie;

	# �t�@�C??�b�N
	if ($lockkey == 1) { &lock1; }
	elsif ($lockkey == 2) { &lock2; }

	# ?�O���J��
	open(IN,"$logfile") || &error("Can't open $logfile");
	@lines = <IN>;
	close(IN);

	# �L?NO??
	$oya = $lines[0];
	$oya =~ s/\n//;
	shift(@lines);

	# ���d?�e�����~
	local($flag) = 0;
	foreach $line (@lines) {
		($knum,$kk,$kd,$kname,$kem,$ksub,$kcom) = split(/<>/,$line);
		if ($name eq "$kname" && $comment eq "$kcom") {
			$flag=1; last;
		}
	}
	if ($flag) { &error("不可連續作相同留言"); }

	# �e�L?����?�A�L?No���J�E?�g�A�b�v
	if ($FORM{'resno'} eq "") { $oya++; $number=$oya; }
	else { $number = $oya; }

	# ��?�L�[����?��
	if ($FORM{'pwd'} ne "") { &passwd_encode($FORM{'pwd'}); }

	# ?�O���t�H�[�}�b�g
	$new_msg = "$number<>$FORM{'resno'}<>$date<>$name<>$email<>$sub<>$comment<>$url<>$host<>$ango<>$color<>$FORM{'icon'}<>\n";

	## �����\�[�g?���A?�X�L??�e?���e�L?���g�b�v������
	if ($res_sort && $FORM{'resno'} ne "") {
		@res_data = ();
		@new = ();
		foreach $line (@lines) {
		  $flag = 0;
		  ($num,$k,$d,$na,$em,$sb,$com,$u,$ho,$p,$c,$ico) = split(/<>/,$line);

		  # �e�L?�������o��
		  if ($k eq "" && $FORM{'resno'} eq "$num") {
			$new_line = "$line";
			$flag = 1;
		  }
		  # ���A��?�X�L?�������o��
		  elsif ($k eq "$FORM{'resno'}") {
			push(@res_data,$line);
			$flag = 1;
		  }
		  if ($flag == 0) { push(@new,$line); }
		}

		# ���A?�X�L?���g�b�v��
		unshift(@new,@res_data);

		# �V�K?�b�Z�[�W���g�b�v��
		unshift(@new,$new_msg);

		# �e�L?���g�b�v��
		unshift(@new,$new_line);


	## �e�L?����?�A�����L??���������L?���J�b�g
	} elsif ($FORM{'resno'} eq "") {

		$i = 0;
		$stop = 0;
		foreach $line (@lines) {
		    ($num,$k,$d,$na,$em,$sb,$com,$u,$ho,$p,$c,$ico)=split(/<>/,$line);

		    if ($k eq "") { $i++; }
		    if ($i > $max-1) {
			$stop = 1;
			if ($pastkey == 0) { last; }
			else {
				if ($k eq "") { $kflag=1; push(@past_data,$line); }
				else { push(@past_res,$line); }
			}
		    }
		    if ($stop == 0) { push(@new,$line); }
		}

		## ��?�L?����
		if ($kflag) {
			@past_res = reverse(@past_res);
			push(@past_data,@past_res);
			&pastlog;
		}

		unshift(@new,$new_msg);

	## ?�X�L?���L??��������������
	} else {
		@res_data = ();
		@new = ();

		foreach $line (@lines) {
		  $flag = 0;
		  ($num,$k,$d,$na,$em,$sb,$com,$u,$ho,$p,$c,$ico) = split(/<>/,$line);

		  # �e�L?�������o��
		  if ($k eq "" && $FORM{'resno'} eq "$num") {
			$new_line = "$line";
			$flag = 2;
		  }

		  if ($flag == 0) { push(@new,$line); }
		  elsif ($flag == 2) {
			push(@new,$new_line);
			push(@new,$new_msg);
		  }
		}
	}

	# �e�L?NO���t��
	unshift (@new,"$oya\n");

	# ?�O���X�V
	open(OUT,">$logfile") || &error("Can't write $logfile");
	print OUT @new;
	close(OUT);

	# ?�b�N��?
	if (-e $lockfile) { unlink($lockfile); }

	# ?�[???
	if ($mailing && $mail_me) { &mail_to; }
	elsif ($mailing && $email ne "$mailto") { &mail_to; }
}

## --- ���M�t�H�[?
sub res_msg {
	# ?�O������?��
	open(DB,"$logfile") || &error("Can't open $logfile",'NOLOCK');
	@lines = <DB>;
	close(DB);

	# �e�L?NO���J�b�g
	@lines = splice(@lines,1);

	# �t�H�[?�������`
	&get_agent;

	# �N�b�L�[������
	&get_cookie;

	&header;
	print "以下的留言NO <B>$FORM{'resno'}</B> 是關於回覆留言<hr>\n";
	print "<center><table border=0 width=\"60%\" cellpadding=10 bgcolor=\"$tbl_color\">\n";
	print "<tr><td>\n";

	$flag=0;
	foreach $line (@lines) {
		local($num,$k,$date,$name,$email,$sub,$com) = split(/<>/, $line);

		# �e�L?���o��
		if ($k eq "" && $FORM{'resno'} eq "$num") {
			$resub = $sub;
			$flag=1;
			print "<B>[留言]</B><P>\n";
			print "<font color=\"$sub_color\"><B>$sub</B></font>\n";
			print "姓名 <B>$name</B></font>\n";
			print "<small> - $date</small><br>\n";
			print "<blockquote>$com</blockquote><P>\n";

		# ?�X�L?�� @res ���i�[
		} elsif ($k ne "" && $FORM{'resno'} eq "$k") {

			push(@res,$line);
		}
	}

	# ?�X�L?���\��
	if (@res) {
		# �L?���t?��
		@res = reverse(@res);

		$flag = 0;
		foreach $line (@res) {
			local($num,$k,$date,$name,$email,$sub,$com) = split(/<>/,$line);

			if ($flag == 0) {
				$flag=1;
				print "<hr size=2><B>[回覆留言]</B><br>\n";
			}

			print "<blockquote><font color=\"$sub_color\"><B>$sub</B></font>\n";
			print "Name�F<B>$name</B></font> - \n";
			print "<small>$date</small><br>\n";
			print "<blockquote>$com</blockquote></blockquote><br>\n";
		}
	}

	# �^�C�g?��
	if ($resub !=~ /^Re\:/) { $resub = "Re\: $resub"; }

	print <<"EOM";
</td></tr></table></center><hr>
<form action="$script" method="$method">
<input type=hidden name=mode value="msg">
<input type=hidden name=resno value="$FORM{'resno'}">
<blockquote>
<table>
<tr>
  <td nowrap><b>姓名</b></td>
  <td><input type=text name=name value="$c_name" size=$nam_wid></td>
</tr>
<tr>
  <td nowrap><b>電郵</b></td>
  <td><input type=text name=email value="$c_email" size=$nam_wid></td>
</tr>
<tr>
  <td nowrap><b>標題</b></td>
  <td><input type=text name=sub value="$resub" size=$subj_wid>
  <input type=submit value="確定"><input type=reset value="重整"></td>
</tr>
<tr>
  <td colspan=2><b>留言</b><br>
  <textarea cols=$com_wid rows=5 name=comment wrap="$wrap"></textarea></td>
</tr>
<tr>
  <td nowrap><b>網頁</b></td>
  <td><input type=text name=url value="http://$c_url" size=$url_wid></td>
</tr>
EOM

	# ��?���A�C�R?���z�����t��
	if ($my_icon) {
		push(@icon1,"$my_gif");
		push(@icon2,"管理者用");
	}

	if ($icon_mode) {
		print "<tr><td nowrap><b>Icon</b></td><td><select name=icon>\n";
		foreach(0 .. $#icon1) {
			if ($c_icon eq "$icon1[$_]") {
				print "<option value=\"$icon1[$_]\" selected>$icon2[$_]\n";
			} else {
				print "<option value=\"$icon1[$_]\">$icon2[$_]\n";
			}
		}
		print "</select> <small>選擇圖檔\n";
		print "[<a href=\"$script?mode=image\" target=_blank>圖檔一覽</a>]</small></td></tr>\n";
	}

	print "<tr><td nowrap><b>密碼</b>";
	print "<td><input type=password name=pwd size=8 maxlength=8 value=\"$c_pwd\">\n";
	print "<small>#刪除用密碼</small></td></tr>\n";
	print "<tr><td nowrap><b>文字色</b></td><td>\n";

	# �N�b�L�[���F������������?
	if ($c_color eq "") { $c_color = $COLORS[0]; }

	foreach (0 .. $#COLORS) {
		if ($c_color eq "$COLORS[$_]") {
			print "<input type=radio name=color value=\"$COLORS[$_]\" checked>";
			print "<font color=\"$COLORS[$_]\">★</font>\n";

		} else {
			print "<input type=radio name=color value=\"$COLORS[$_]\">";
			print "<font color=$COLORS[$_]>★</font>\n";
		}
	}

	print "</td></tr></table></form>\n";
	print "</blockquote><P><hr><P>\n";
	&footer;
	exit;
}

## --- �t�H�[?�������f�[�^??
sub decode {
	if ($ENV{'REQUEST_METHOD'} eq "POST") {
		if ($ENV{'CONTENT_LENGTH'} > 51200) {
			&error("留言過多",'NOLOCK');
		}
		read(STDIN, $buffer, $ENV{'CONTENT_LENGTH'});
	} else { $buffer = $ENV{'QUERY_STRING'}; }

	@pairs = split(/&/, $buffer);
	foreach $pair (@pairs) {
		($name, $value) = split(/=/, $pair);
		$value =~ tr/+/ /;
		$value =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;

		# ��?�R�[�h�盬-JIS����
		#&jcode'convert(*value,'sjis');

		# �^�O??
		if ($tagkey == 0) {
			$value =~ s/</&lt;/g;
			$value =~ s/>/&gt;/g;
			$value =~ s/\"/&quot;/g;
		} else {
			$value =~ s/<!--(.|\n)*-->//g;
			$value =~ s/<>/&lt;&gt;/g;
		}

		# ���s???
		if ($name eq "comment") {
			$value =~ s/\r\n/<br>/g;
			$value =~ s/\r/<br>/g;
			$value =~ s/\n/<br>/g;
		} else {
			$value =~ s/\r//g;
			$value =~ s/\n//g;
		}

		# ��?��?�p
		if ($name eq 'del') { push(@delete,$value); }

		$FORM{$name} = $value;
	}

	$name    = $FORM{'name'};
	$comment = $FORM{'comment'};
	$email   = $FORM{'email'};
	$url     = $FORM{'url'};
	$url     =~ s/^http\:\/\///;
	$mode    = $FORM{'mode'};
	$sub     = $FORM{'sub'};
	if ($sub eq "") { $sub = "無題"; }
	$pwd     = $FORM{'pwd'};
	$pwd     =~ s/\r//g;
	$pwd     =~ s/\n//g;
	$icon    = $FORM{'icon'};
	$color   = $FORM{'color'};
}

## --- �f�������g����?�b�Z�[�W
sub howto {
	if ($tagkey == 0) { $tag_msg = "留言內容<b>不可以使用語法</b>\n"; }
	else { $tag_msg = "留言內容<b>可以使用語法</b>\n"; }

	&header;
	print <<"HTML";

<table width="100%">
<tr>
  <th bgcolor="#d8f8ff">留言板注意事項</th>
</tr>
<tr>
  <td align=center>[<a href="$script\?">回留言板</a>]</td>
</tr>
</table>
<P><center>
<table width="50%" border=1 cellpadding=10>
<tr><td bgcolor="$tbl_color">
<OL>
<LI>這個留言板<b>對應cookie</b>.只要曾經輸入過的資料--如:姓名,電子郵件,網址等等,都會自己記錄!!到第二次回來留言時就不用再輸入了!!<P>
<LI>$tag_msg<P>
<LI>留言時以下項目一定要輸入<b>姓名</b>和<b>留言</b>.其他就可以隨便輸入與否!<P>
<LI>留言時<b>刪除用密碼</b>的密碼要在8個英數字以內,請盡量輸入<b>刪除用密碼</b>以便日後刪除自行留言<P>
<LI>留言編數<b>最多$max篇</b>超過就會自動刪除!!~<P>
<LI>在可見的留言中<b>回覆</b>的方法,就是按下留言上<b>回覆</b>這個按鈕,就可到回覆留言用的畫面!!<P>
<LI>舊留言可以在<b>[搜尋]中作簡易的尋找!</b>Top Menu的<a href="$script?mode=find">[搜尋]</a>輸入關鍵字,就可以得知結果!!~<P>
<LI>管理者有權把中傷他人的留言刪去!!<P>
<LI>若在使用上有其他問題，歡迎寄信詢問!<P>
</OL>
</td></tr></table>
</center>
<hr>
<P>
HTML
	&footer;
	exit;
}

## --- ?�[�h?���T�u?�[�`?
sub find {
	&header;
	print <<"HTML";

<table width="100%">
<tr>
  <th bgcolor="#d8f8ff">搜尋</th>
</tr>
<tr>
  <td align=center>[<a href="$script\?">回留言板</a>]</td>
</tr>
</table>
<P><center>
<table cellpadding=5>
<tr><td bgcolor="$tbl_color" nowrap>
  <UL>
  <LI>搜尋方法<b>關鍵字</b>輸入後,再按搜尋!!
  <LI>關鍵字一定要用[半形字]!!
  </OL>
</td></tr>
</table>
<P><form action="$script" method="$method">
<input type=hidden name=mode value="find">
<table border=1 cellspacing=1>
<tr>
  <th colspan=2>關鍵字 <input type=text name=word size=30></th>
</tr>
<tr>
  <td>搜尋條件</td>
  <td>
    <input type=radio name=cond value="and" checked>AND
    <input type=radio name=cond value="or">OR
  </td>
</tr>
<tr>
  <th colspan=2>
    <input type=submit value="搜尋"><input type=reset value="重整">
  </th>
</tr>
</table>
</form></center>
HTML
	# ?�[�h?�������s��?���\��
	if ($FORM{'word'} ne ""){

		# �������e����?
		$cond = $FORM{'cond'};
		$word = $FORM{'word'};
		$word =~ s/�@/ /g;
		$word =~ s/\t/ /g;
		@pairs = split(/ /,$word);

		# �t�@�C?������?��
		open(DB,"$logfile") || &error("不能打開 $logfile",'NOLOCK');
		@lines = <DB>;
		close(DB);

		# ?��??
		foreach (1 .. $#lines) {
			$flag = 0;
			foreach $pair (@pairs){
				if (index($lines[$_],$pair) >= 0) {
					$flag = 1;
					if ($cond eq 'or') { last; }
				} else {
					if ($cond eq 'and') { $flag = 0; last; }
				}
			}
			if ($flag == 1) { push(@new,$lines[$_]); }
		}

		# ?���I��
		$count = @new;
		print "<hr><b><font color=\"$t_color\">搜尋結果 : $count個</font></b><P>\n";
		print "<OL>\n";

		foreach $line (@new) {
			($num,$k,$date,$name,$email,$sub,$com,$url) = split(/<>/,$line);

			if ($email) { $name = "<a href=\"mailto:$email\">$name</a>"; }
			if ($url) { $url = "[<a href=\"http://$url\" target='_blank'>首頁</a>]"; }

			if ($k) { $num = "$k次"; }

			# ?�����\��
			print "<LI>[$num] <font color=\"$sub_color\"><b>$sub</b></font>\n";
			print "留言者<b>$name</b> <small> $url 留言日$date</small>\n";
			print "<P><blockquote>$com</blockquote><hr>\n";
		}

		print "</OL><P>\n";
	}

	&footer;
	exit;
}

## --- �u?�E�U�����f���t�H�[??������
sub get_agent {
	# �u?�E�U��������
	$agent = $ENV{'HTTP_USER_AGENT'};

	if ($agent =~ /MSIE 3/i) { 
		$nam_wid  = 30;
		$subj_wid = 40;
		$com_wid  = 65;
		$url_wid  = 48;
		$nam_wid2 = 20;
	}
	elsif ($agent =~ /MSIE 4/i || $agent =~ /MSIE 5/i) { 
		$nam_wid  = 30;
		$subj_wid = 40;
		$com_wid  = 65;
		$url_wid  = 78;
		$nam_wid2 = 20;
	}
	else {
		$nam_wid  = 20;
		$subj_wid = 25;
		$com_wid  = 56;
		$url_wid  = 50;
		$nam_wid2 = 10;
	}
}

## --- �N�b�L�[�����s
sub set_cookie {
	# �N�b�L�[��60�����L��
	($secg,$ming,$hourg,$mdayg,$mong,$yearg,$wdayg,$dmy,$dmy)
					 	= gmtime(time + 60*24*60*60);
	$yearg += 1900;
	if ($secg  < 10) { $secg  = "0$secg";  }
	if ($ming  < 10) { $ming  = "0$ming";  }
	if ($hourg < 10) { $hourg = "0$hourg"; }
	if ($mdayg < 10) { $mdayg = "0$mdayg"; }

	$month = ('Jan','Feb','Mar','Apr','May','Jun','Jul',
				'Aug','Sep','Oct','Nov','Dec')[$mong];
	$youbi = ('Sunday','Monday','Tuesday','Wednesday',
				'Thursday','Friday','Saturday')[$wdayg];

	$date_gmt = "$youbi, $mdayg\-$month\-$yearg $hourg:$ming:$secg GMT";
	$cook="name\:$name\,email\:$email\,url\:$url\,pwd\:$pwd\,icon\:$icon\,color\:$color";
	print "Set-Cookie: YYBBS=$cook; expires=$date_gmt\n";
}

## --- �N�b�L�[������
sub get_cookie { 
	@pairs = split(/\;/, $ENV{'HTTP_COOKIE'});
	foreach $pair (@pairs) {
		local($name, $value) = split(/\=/, $pair);
		$name =~ s/ //g;
		$DUMMY{$name} = $value;
	}
	@pairs = split(/\,/, $DUMMY{'YYBBS'});
	foreach $pair (@pairs) {
		local($name, $value) = split(/\:/, $pair);
		$COOKIE{$name} = $value;
	}
	$c_name  = $COOKIE{'name'};
	$c_email = $COOKIE{'email'};
	$c_url   = $COOKIE{'url'};
	$c_pwd   = $COOKIE{'pwd'};
	$c_icon  = $COOKIE{'icon'};
	$c_color = $COOKIE{'color'};

	if ($FORM{'name'})  { $c_name  = $FORM{'name'}; }
	if ($FORM{'email'}) { $c_email = $FORM{'email'}; }
	if ($FORM{'url'})   { $c_url   = $url; }
	if ($FORM{'pwd'})   { $c_pwd   = $FORM{'pwd'}; }
	if ($FORM{'icon'})  { $c_icon  = $FORM{'icon'}; }
	if ($FORM{'color'}) { $c_color = $FORM{'color'}; }
}

## --- �G?�[??
sub error {
	if ($_[1] ne '0') { &header; }

	if (-e $lockfile && $_[1] eq "") { unlink($lockfile); }

	print "<center><hr width=\"75%\"><h3>ERROR !</h3>\n";
	print "<P><font color=red><B>$_[0]</B></font>\n";
	print "<P><hr width=\"75%\"></center>\n";
	&footer;
	exit;
}

## --- ��?����
sub msg_del {
	if ($FORM{'action'} eq 'admin' && $FORM{'pass'} ne "$pass") {
		&error("密碼不正確",'NOLOCK');
	}

	open(DB,$logfile) || &error("Can't open $logfile",'NOLOCK');
	@lines = <DB>;
	close(DB);

	shift(@lines);

	# �e�L?�������z���f�[�^������
	@NEW = ();
	foreach (@lines) {
		($number,$k,$date,$name,$email,$subj,
			$comment,$url,$host,$pwd) = split(/<>/, $_);

		# ?�X�L?���O��
		if ($k eq '') { push(@NEW,$_); }
	}

	@lines = reverse(@lines);

	&header;

	print "<table width=\"100%\"><tr><th bgcolor=\"#d8f8ff\">\n";
	print "留言刪除畫面</th></tr>\n";
	print "<tr><td align=center>[<a href=\"$script\?\">回留言板</a>]</td>\n";
	print "</tr></table><P><center>\n";
	print "<table border=0 cellpadding=5><tr>\n";
	print "<td bgcolor=$tbl_color>\n";

	if ($FORM{'action'} eq '') {
		print "★留言時輸入[刪除用密碼],以便自行刪除留言!<br>\n";
	}

	print "★刪除留言時,輸入自己留言時的密碼就可以!!<br>\n";
	print "★刪除留言時,連同回覆留言都會一齊刪去!!<br>\n";
	print "</td></tr></table><P>\n";
	print "<form action=\"$script\" method=$method>\n";

	if ($FORM{'action'} eq '') {
		print "<input type=hidden name=mode value=\"usr_del\">\n";
		print "<b>密碼</b> <input type=text name=del_key size=10>\n";
	} else {
		print "<input type=hidden name=mode value=\"admin_del\">\n";
		print "<input type=hidden name=action value=\"admin\">\n";
		print "<input type=hidden name=pass value=\"$FORM{'pass'}\">\n";
	}

	print "<input type=submit value=\"刪除\"><input type=reset value=\"重整\">\n";
	print "<P><table border=1>\n";
	print "<tr><th>刪除</th><th>留言No</th><th>Title</th><th>Name</th><th>Date</th><th>內容</th>\n";

	if ($FORM{'action'} eq 'admin') { print "<th>I.P位置</th>\n"; }

	print "</tr>\n";

	if ($FORM{'page'} eq '') { $page = 0; }
	else { $page = $FORM{'page'}; }

	# �L??������
	$end_data = @NEW - 1;
	$page_end = $page + ($pagelog - 1);

	if ($page_end >= $end_data) { $page_end = $end_data; }
	foreach ($page .. $page_end) {
		($num,$k,$date,$name,$email,$sub,
			$com,$url,$host,$pw,$color) = split(/<>/,$NEW[$_]);

		if ($email) { $name="<a href=mailto:$email>$name</a>"; }
		$com =~ s/<br>/ /g;
		if ($tagkey) { $com =~ s/</&lt;/g; $com =~ s/>/&gt;/g; }

		if (length($com) > 60) { $com = substr($com,0,58); $com = $com . '..'; }

		if ($FORM{'action'} eq 'admin') {
			print "<tr><th><input type=checkbox name=del value=\"$date\"></th>\n";

		} else {
			print "<tr><th><input type=radio name=del value=\"$date\"></th>\n";
		}

		print "<th>$num</th><td>$sub</td><td>$name</td>\n";
		print "<td><small>$date</small></td><td>$com</td>\n";

		if ($FORM{'action'} eq 'admin') { print "<td>$host</td>\n"; }

		print "</tr>\n";

		## ?�X?�b�Z�[�W���\��
		foreach (0 .. $#lines) {
			($rnum,$rk,$rd,$rname,$rem,$rsub,
				$rcom,$rurl,$rho,$rp,$rc) = split(/<>/, $lines[$_]);

			$rcom =~ s/<br>/ /g;
			if ($tagkey) { $rcom =~ s/</\&lt\;/g; $rcom =~ s/>/\&gt\;/g; }
			if (length($rcom) > 60) { $rcom=substr($rcom,0,58); $rcom=$rcom . '..'; }
			if ($num eq "$rk") {

				if ($FORM{'action'} eq 'admin') {
					print "<tr><th><input type=checkbox name=del value=\"$rd\"></th>\n";
				} else {
					print "<tr><th><input type=radio name=del value=\"$rd\"></th>\n";
				}

				print "<td colspan=2 align=center><b>$num</b>的回覆</td>\n";
				print "<td>$rname</td><td><small>$rd</small></td><td>$rcom</td>\n";

				if ($FORM{'action'} eq 'admin') { print "<td>$rho</td>\n"; }

				print "</tr>\n";
			}
		}
	}
	print "</table></form>\n";
	print "<table border=0 width=\"100%\"><tr>\n";

	# ����??
	$next_line = $page_end + 1;
	$back_line = $page - $pagelog;

	# �O��??
	if ($back_line >= 0) {
	  print "<td><form method=\"$method\" action=\"$script\">\n";
	  print "<input type=hidden name=page value=\"$back_line\">\n";
	  print "<input type=hidden name=mode value=msg_del>\n";
	  print "<input type=submit value=\"上$pagelog個\">\n";

	  if ($FORM{'action'} eq 'admin') {
		print "<input type=hidden name=action value=\"admin\">\n";
		print "<input type=hidden name=pass value=\"$FORM{'pass'}\">\n";
	  }

	  print "</form></td>\n";
	}

	# ?��??
	if ($page_end ne "$end_data") {
	  print "<td><form method=\"$method\" action=\"$script\">\n";
	  print "<input type=hidden name=page value=\"$next_line\">\n";
	  print "<input type=hidden name=mode value=msg_del>\n";
	  print "<input type=submit value=\"下$pagelog個\">\n";

	  if ($FORM{'action'} eq 'admin') {
		print "<input type=hidden name=action value=\"admin\">\n";
		print "<input type=hidden name=pass value=\"$FORM{'pass'}\">\n";
	  }

	  print "</form></td>\n";
	}

	print "</tr></table><P><hr><P>\n";
	&footer;
	exit;
}

## --- �L?��???
sub usr_del {
	if ($FORM{'del_key'} eq "") { &error("密碼不正確",'NOLOCK'); }
	if ($FORM{'del'} eq "") { &error("請選擇按鈕",'NOLOCK'); }

	# ?�b�N�J�n
	if ($lockkey == 1) { &lock1; }
	elsif ($lockkey == 2) { &lock2; }

	# ?�O������?��
	open(DB,"$logfile") || &error("不能寫入 $logfile");
	@lines = <DB>;
	close(DB);

	# �e�L?NO
	$oya = $lines[0];
	if ($oya =~ /<>/) { &error("號碼不正確");	}

	shift(@lines);

	## ��?�L�[�������L?��? ##
	@new=();
	foreach $line (@lines) {
		$dflag = 0;
		($num,$k,$dt,$name,$email,$sub,$com,$url,$host,$pw) = split(/<>/,$line);

		if ($FORM{'del'} eq "$dt") {
			$dflag = 1;
			$encode_pwd = $pw;
			$del_num = $num;
			if ($k eq '') { $oyaflag=1; }

		} elsif ($oyaflag && $del_num eq "$k") {
			$dflag = 1;
		}

		if ($dflag == 0) { push(@new,$line); }
	}

	if ($del_num eq '') { &error("$FORM{'del'}找不到想刪除的留言"); }
	else {
		if ($encode_pwd eq '') { &error("密碼設定不正確"); }
		$plain_text = $FORM{'del_key'};
		&passwd_decode($encode_pwd);
		if ($check eq 'no') { &error("密碼不正確"); }
	}

	# �e�L?NO���t��
	unshift(@new,$oya);

	## ?�O���X�V ##
	open(DB,">$logfile") || &error("不能寫入 $logfile");
	print DB @new;
	close(DB);

	# ?�b�N��?
	if (-e $lockfile) { unlink($lockfile); }

	# ��?������������
	&msg_del;
}

## --- ��?����?�L?��?
sub admin_del {
	if ($FORM{'pass'} ne "$pass") { &error("密碼不正確",'NOLOCK'); }
	if ($FORM{'del'} eq "") { &error("請選擇按鈕",'NOLOCK'); }

	# ?�b�N�J�n
	if ($lockkey == 1) { &lock1; }
	elsif ($lockkey == 2) { &lock2; }

	# ?�O������?��
	open(DB,"$logfile") || &error("不能打開 $logfile");
	@lines = <DB>;
	close(DB);

	# �e�L?NO
	$oya = $lines[0];
	if ($oya =~ /<>/) {
		&error("確定沒有號碼<P>
			<small>\(要改用v2.5之前的版本)<\/small>");
	}

	shift(@lines);

	## ��???
	foreach $line (@lines) {
		$dflag=0;
		($num,$k,$dt,$name,$email,$sub,$com,$url,$host,$pw) = split(/<>/,$line);

		foreach $del (@delete) {
			if ($del eq "$dt") {
				$dflag = 1;
				$del_num = $num;
				if ($k eq '') { $oyaflag=1; }

			} elsif ($oyaflag && $del_num eq "$k") {
				$dflag = 1;
			}
		}
		if ($dflag == 0) { push(@new,$line); }
	}

	# �e�L?NO���t��
	unshift(@new,$oya);

	## ?�O���X�V ##
	open(DB,">$logfile") || &error("不能寫入 $logfile");
	print DB @new;
	close(DB);

	# ?�b�N��?
	if (-e $lockfile) { unlink($lockfile); }

	# ��?������������
	&msg_del;
}

## --- ��?����������
sub admin {
	&header;
	print "<center><h4>輸入管理用密碼</h4>\n";
	print "<form action=\"$script\" method=$method>\n";
	print "<input type=hidden name=mode value=\"msg_del\">\n";
	print "<input type=hidden name=action value=\"admin\">\n";
	print "<input type=password name=pass size=8><input type=submit value=\" 確定 \">\n";
	print "</form></center><P><hr><P>\n";
	&footer;
	exit;
}

## --- ?��������
sub get_time {
	$ENV{'TZ'} = "JST-8";
	($sec,$min,$hour,$mday,$mon,$year,$wday,$d,$d) = localtime(time);
	$year += 1900;
	$mon++;
	if ($mon  < 10) { $mon  = "0$mon";  }
	if ($mday < 10) { $mday = "0$mday"; }
	if ($hour < 10) { $hour = "0$hour"; }
	if ($min  < 10) { $min  = "0$min";  }
	if ($sec  < 10) { $sec  = "0$sec";  }
	$week = ('Sun','Mon','Tue','Wed','Thu','Fri','Sat') [$wday];

	# ��?���t�H�[�}�b�g
	$date = "$year\/$mon\/$mday\($week\) $hour\:$min\:$sec";
}

## --- �J�E?�^??
sub counter {
	# �{??�����J�E?�g�A�b�v
	$match=0;
	if ($FORM{'mode'} eq '') {
		# �J�E?�^?�b�N
		if ($lockkey) { &lock3; }

		$match=1;
	}

	# �J�E?�g�t�@�C?����������
	open(NO,"$cntfile") || &error("Can't open $cntfile",'0');
	$cnt = <NO>;
	close(NO);

	# �J�E?�g�A�b�v
	if ($match) {

		$cnt++;

		# �X�V
		open(OUT,">$cntfile") || &error("Write Error : $cntfile");
		print OUT $cnt;
		close(OUT);
	}

	# �J�E?�^?�b�N��?
	if (-e $cntlock) { unlink($cntlock); }

	# ??����
	while(length($cnt) < $mini_fig) { $cnt = '0' . "$cnt"; }
	@cnts = split(//,$cnt);

	print "<table><tr><td>\n";

	# GIF�J�E?�^�\��
	if ($counter == 2) {
		foreach (0 .. $#cnts) {
			print "<img src=\"$gif_path/$cnts[$_]\.gif\" alt=\"$cnts[$_]\" width=\"$mini_w\" height=\"$mini_h\">";
		}

	# �e�L�X�g�J�E?�^�\��
	} else {
		print "<font color=\"$cnt_color\" face=\"verdana,Times New Roman,Arial\">$cnt</font>";
	}

	print "</td></tr></table>\n";
}

## --- ?�b�N�t�@�C?�Fsymlink��?
sub lock1 {
	local($retry) = 5;
	while (!symlink(".", $lockfile)) {
		if (--$retry <= 0) { &error("請稍後再試"); }
		sleep(1);
	}
}

## --- ?�b�N�t�@�C?�Fopen��?
sub lock2 {
	local($retry) = 0;
	foreach (1 .. 5) {
		if (-e $lockfile) { sleep(1); }
		else {
			open(LOCK,">$lockfile");
			close(LOCK);
			$retry = 1;
			last;
		}
	}
	if (!$retry) { &error("請稍後再試"); }
}

## --- �J�E?�^?�b�N
sub lock3 {
	$cnt_flag = 0;
	foreach (1 .. 7) {
		if (-e $cntlock) { sleep(1); }
		else {
			open(LOCK,">$cntlock");
			close(LOCK);
			$cnt_flag = 1;
			last;




		}
	}
	if (!$cnt_flag) { unlink($cntlock); }
}

## --- ?�[??�M
sub mail_to {
	$mail_sub = "$title 留言";

    #	&jcode'convert(*mail_sub,'jis');
    #	&jcode'convert(*name,'jis');
    	#&jcode'convert(*sub,'jis');
    #	&jcode'convert(*comment,'jis');

	$comment =~ s/<br>/\n/g;
	$comment =~ s/&lt;/</g;
	$comment =~ s/&gt;/>/g;

	if (open(MAIL,"| $sendmail $mailto")) {
	print MAIL "To: $mailto\n";

	# ?�[?�A�h?�X��������?���_�~�[?�[?���u������
	if ($email eq "") { $email = "nomail\@xxx.xxx"; }

	print MAIL "From: $email\n";
	print MAIL "Subject: $mail_sub\n";
	print MAIL "MIME-Version: 1.0\n";
	print MAIL "Content-type: text/plain; charset=big5\n";
	print MAIL "Content-Transfer-Encoding: 7bit\n";





	print MAIL "X-Mailer: $ver\n\n";
	print MAIL "--------------------------------------------------------\n";
	print MAIL "TIME : $date\n";
	print MAIL "HOST : $host\n";
	print MAIL "NAME : $name\n";
	print MAIL "EMAIL: $email\n";

	if ($url) { print MAIL "URL  : http://$url\n"; }

	print MAIL "TITLE: $sub\n\n";
	print MAIL "$comment\n";
	print MAIL "--------------------------------------------------------\n";
	close(MAIL);
	}
}

## --- �p�X?�[�h��???
sub passwd_encode {
	$now = time;
	($p1, $p2) = unpack("C2", $now);
	$wk = $now / (60*60*24*7) + $p1 + $p2 - 8;
	@saltset = ('a'..'z','A'..'Z','0'..'9','.','/');
	$nsalt = $saltset[$wk % 64] . $saltset[$now % 64];
	$ango = crypt($_[0], $nsalt);
}

## --- �p�X?�[�h��???
sub passwd_decode {
	if ($_[0] =~ /^\$1\$/) { $key = 3; }
	else { $key = 0; }

	$check = "no";
	if (crypt($plain_text, substr($_[0],$key,2)) eq "$_[0]") {
		$check = "yes";

	}
}

## --- HTML���w�b�_�[
sub header {
	$pt_b = $pt + 2 . 'pt';
	$pt_s = $pt - 1 . 'pt';
	$pt .= pt;
	$t_point .= pt;

	print "Content-type: text/html\n\n";
	print <<"EOM";
<html>
<head>
<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=big5">

<STYLE type="text/css">
<!--
A{color:$a_link;text-decoration:none;}
A:hover,A:active{text-decoration:underline overline;background-color:$hb_link; color:$h_link;}
TABLE,TD{font-size:9pt;}
input,textarea { 
cursor:hand;
border-top : 3px double $border_c ; border-bottom : 3px double $border_c ;
border-left :3px double $border_c ; border-right : 3px double $border_c ;
background-color :$tback_color;
font-size : 9pt ; color : $tfont_color ; 
}
span          { font-size: $t_point }
big           { font-size: $pt_b }
small         { font-size: $pt_s }
}
input,textarea,select {
border-left:1px solid $input_border;
border-right:1px solid $input_border;
border-top:1px solid $input_border;
border-bottom:1px solid $input_border; 
background-color : $input_bg; color : $input_color;}

body{
	scrollbar-face-color:#99ccff;
	scrollbar-shadow-color:#99ccff;
	scrollbar-highlight-color:white;
	scrollbar-3dlight-color:#99ccff;
	scrollbar-darkshadow-color:#6699ff;
	scrollbar-track-color:#66ccfff;
	scrollbar-arrow-color:white;}

-->
</STYLE>

<title>$title</title></head>
EOM
	# body�^�O
	if ($backgif) { $bgkey = "background=\"$backgif\" bgproperties=\"fixed\" bgcolor=$bgcolor"; }
	else { $bgkey = "bgcolor=$bgcolor"; }
	print "<body $bgkey text=$text>\n";
}

## --- HTML���t�b�^�[
sub footer {
	## MakiMaki��������?�g�p���L�����������������R��?��??�N?��
	## ��?���������������������B
	print "<br><br><center>$banner2<P><small><!-- $ver -->\n";
	print "<a href=\"http://www.kent-web.com/\" target='_blank'>KENT</a> &amp; \n";
	print "<a href=\"http://village.infoweb.ne.jp/~fwhf2602/\" target='_blank'>MakiMaki</a><br>\n";
	print "Edit By <a href=\"http://saya.g--z.com/\" target='_blank'>*- CGI Cafe. -*</a><br>\n";
	
	print "</small></center>\n";
	print "</body></html>\n";
}

## --- ����??�N
sub auto_link {
	$_[0] =~ s/([^=^\"]|^)(http\:[\w\.\~\-\/\?\&\+\=\:\@\%\;\#]+)/$1<a href=\"$2\" target='_blank'>$2<\/a>/g;
}

## --- �C?�[�W��?�\��
sub image {
	&header;
	print "<center><hr width=\"75%\">\n";
	print "<h3>圖檔一覽</h3>\n";
	print "<P>各位可以選擇自己喜歡的圖檔\n";
	print "<P><hr width=\"75%\">\n";
	print "<P><table border=1 cellpadding=5 cellspacing=0 bgcolor=\"#FFFFFF\"><tr>\n";

	$i=0; $j=0;
	$stop = @icon1;
	foreach (0 .. $#icon1) {
		$i++; $j++;
		print "<th><img src=\"$icon_dir\/$icon1[$_]\" ALIGN=middle> $icon2[$_]</th>\n";
		if ($i >= 4) { print '</tr><tr>'; $i=0; }
		if ($j eq "$stop") {
			if ($i == 0) { last; }
			while ($i < 4) { print "<th><br></th>"; $i++; }
		}
	}

	print "</tr></table><br>\n";
	print "<FORM><INPUT TYPE=\"button\" VALUE=\"  關閉視窗  \" onClick=\"top.close();\"></FORM></center>\n";
	print "</body></html>\n";
	exit;
}

## --- �z�X�g������
sub get_host {
	$host = $ENV{'REMOTE_HOST'};
	$addr = $ENV{'REMOTE_ADDR'};

	if ($get_remotehost) {
		if ($host eq "" || $host eq "$addr") {
			$host = gethostbyaddr(pack("C4", split(/\./, $addr)), 2);
		}
	}
	if ($host eq "") { $host = $addr; }
}

## --- ��??�O����
sub pastlog {
	$new_flag = 0;

	# ��?NO���J��
	open(NO,"$nofile") || &error("Can't open $nofile");
	$count = <NO>;
	close(NO);

	# ��??�O���t�@�C?�������`
	$pastfile  = "$past_dir\/$count\.html";

	# ��??�O��������?�A�V�K��������������
	unless(-e $pastfile) { &new_log; }

	# ��??�O���J��
	if ($new_flag == 0) {
		open (IN,"$pastfile") || &error("Can't open $pastfile");
		@past = <IN>;
		close(IN);
	}

	# �K�����s?���I�[�o�[�������A?�t�@�C?��������������
	if ($#past > $log_line) { &next_log; }

	foreach $pst_line (@past_data) {
		($pnum,$pk,$pdt,$pname,$pemail,
			$psub,$pcom,$purl,$phost,$ppw) = split(/<>/, $pst_line);

		if ($pemail) { $pname = "<a href=\"mailto:$pemail\">$pname</a>"; }
		if ($purl) { $purl="<a href=\"http://$purl\" target='_top'>http://$purl</a>"; }
		if ($pk) { $pnum = "$pk次"; }

		# ����??�N
		if ($autolink) { &auto_link($pcom); }

		# �����L?���t�H�[�}�b�g
		$html = <<"HTML";
[$pnum] <font color=\"$sub_color\"><b>$psub</b></font><!--T--> by <b>$pname</b></font> <small>Date: $pdt</small><p><blockquote>$pcom<p>$purl</blockquote><!--$phost--><hr>
HTML
		push(@htmls,"$html");
	}

	
	@news = ();
	foreach $line (@past) {
		if ($line =~ /<!--OWARI-->/i) { last; }
		push (@news,$line);
		if ($line =~ /<!--HAJIME-->/i) { push (@news,@htmls); }
	}

	push (@news,"<!--OWARI-->\n</body></html>\n");

	# ��??�O���X�V
	open(OUT,">$pastfile") || &error("Can't write $pastfile");
	print OUT @news;
	close(OUT);

}

## --- ��??�O?�t�@�C?����?�[�`?
sub next_log {
	# ?�t�@�C?���������J�E?�g�A�b�v
	$count++;

	# �J�E?�g�t�@�C?�X�V
	open(NO,">$nofile") || &error("Can't write $nofile");
	print NO "$count";
	close(NO);

	$pastfile  = "$past_dir\/$count\.html";

	&new_log;
}

## --- �V�K��??�O�t�@�C?����?�[�`?
sub new_log {
	$new_flag = 1;

	if ($backgif) { $bgkey = "background=\"$backgif\" bgcolor=$bgcolor"; }
	else { $bgkey = "bgcolor=$bgcolor"; }

	$past[0] = "<html><head><title>舊編集</title></head>\n";
	$past[1] = "<body $bgkey text=$text><hr size=1>\n";
	$past[2] = "<\!--HAJIME-->\n";
	$past[3] = "<\!--OWARI-->\n";
	$past[4] = "</body></html>\n";

	# �V�K��??�O�t�@�C?�������X�V
	open(OUT,">$pastfile") || &error("Can't write $pastfile");
	print OUT @past;
	close(OUT);

	# �p�[�~�b�V??��666���B
	chmod(0666,"$pastfile");
}
