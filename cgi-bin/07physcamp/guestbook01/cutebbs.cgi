#!/usr/bin/perl

#### Script�@���~ ####################
##									##
## YY-BOARD v3.21 (00/06/26) 		##
##   Copyright(C) KENT WEB 2000		##
##   E-MAIL: webmaster@kent-web.com	##
##   WWW: http://www.kent-web.com/	##
##----------------------------------##
#	����� by Blue EV's Studio
#	���}		http://cgiunion.hypermart.net/
#	Edmond
#	���}		http://edmonddomain.hypermart.net/
#	�q�l		cyvc@netvigator.com
#	Vivienne
#	���}		http://viviennechan.hypermart.net/
#	�q�l		vivien90@netvigator.com
#-----------------------------------------------------------------------------------
#�ϥΦu�h															
#	1.	Blue EV's Studio��CGI�O�K�O�n��A�Ʊ�O�Χ@�ӤH�������ΡA�T�����ӷ~��´�ϥ�
#
#	2.	���g�P�N�A�Y�T�p������νƻs�δ��Ѧ������ɤΥ�����Ƶ{��
#
#	3.	���o�R�������v�ŧi�A�_�hBlue EV's Studio�|����Ҧ�CGI���}��U��
#
#	4.	��CGI��դU����������l��,�N���|�t�W����d��
#
#	5.	�Ʊ�ϥΥ�CGI��,�o�{�����~���B,�Чi���@��
######################################


##+--------------------------------+##
##									##
##CUTE BBS -Blue- v0.0716 (00.07.16)##
##									##
## Edit By CGI Cafe.		�j		##
##	URL: http://saya.g--z.com/		##
##									##
##+--------------------------------+##

$ver = 'CUTE BBS[B] v0.0716'; # ����

## ---[�`�N�ƶ�]------------------------------------------------##
##
##
##	CGI�[�c	##
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
#  �]�w����  #
#============#

#require './jcode.pl';		

$title = "++ 2007 NTU PhysCamp �d���� ++";	# ���D�W��
$t_color = "#008080";		# ���D�C��
$t_point = '12';			# ���D�j�p(�HPT�p)
$t_face = "Comic Sans MS";	# ���D�r��

$pt = '10';					# ��r�j�p(�HPT�p)
$backgif = "http://st.phys.ntu.edu.tw/~physcamp/07physcamp/img/physcampbg01.jpg";				# �I������(�Hhttp://����)
$bgcolor = "#FFFFFF";		# �I���C��
$text = "#808080";			# ��r��

$homepage = "http://st.phys.ntu.edu.tw/physcamp";# ������m
$bbstop = "./cutebbs.cgi";	# �d���O����(���Χ��)
$max = 1000;					# �̤j�d���s��
$pass = 'physland';				# �޲z�̱K�X(8�ӭ^�Ʀr�H��)

#--Style �˦�----------------------
$a_link = "#1a99ff";		# Link�C��
$hb_link = "#99ccff";		# ���ܮɭI����
$h_link = "#0066ff";		# ���ܮɤ�r��
$border_c = "#80e6ff";		# �O�ƥ~�ئ�
$tback_color = "#ffffff";	# �O�Ƴ����I����
$tfont_color = "#0066ff";	# �O�Ƴ�����r��

#--Icon��m--------
$icon_dir = "http://st.phys.ntu.edu.tw/~b93202001/img/";		# ���O�Mcutebbs.cgi�b�P�@�ؿ��U��,�N�Hhttp://���

#--���ɳ]�w(�n�W�U����)------
@icon1 = ('happy.gif','no.gif','pu.gif','sad.gif','very_happy.gif','what.gif');

@icon2 =  ('�ּ�','���n','�����Y','�ˤ�','�ܰ���','����');


#--�ϥ�icon? (0=no 1=yes)-------------
$icon_mode = 1;			

#--�޲z�̱M��icon (0=no 1=yes)-----
$my_icon = 1;			# �b�d����,��R����m��J�K�X
$my_gif  = 'kid2.gif';		# icon�ɦW��

$res_sort = 1;			# �^�Яd����m�W�̫e (0=no 1=yes)

#--HOST���o��k----------------------
$get_remotehost = 0;		# 0-->$ENV{'REMOTE_HOST'} 1-->gethostbyaddr 

#--���D���� 
$title_gif = "http://st.phys.ntu.edu.tw/physcamp/07physcamp/img/guestbg01.jpg";	# ���ɦ�mhttp://�H��
$tg_w = '588';				# ������
$tg_h = '61';				# ���ɰ�

#--��w�]�w----------------------
#  --> 0=no		1=symlink	2=open
$lockkey = 0;

$lockfile = "./cutebbs.lock";	# ��w�ɦW��
$cntlock = "./cutecnt.lock";	# �H�ƭp��w�ɦW��

#--�H�ƭp�]�w----------------------
$counter = 1;			# 0=����, 1=�¤�r, 2=�Ϲ�
$mini_fig = 5;			# ��ܦ��
$cnt_color = "#0066ff";		# �¤�r�ɪ���r��
$gif_path = "./img";		# �H�ƭp�����ɦ�m
$mini_w = 15;			# �������
$mini_h = 15;			# ���ɰ���
$cntfile = "./ccount.dat";	# �H�ưO���ɦW��

$tagkey = 0;				# �y�k�ϥ�? (0=no 1=yes)
$script  = "./cutebbs.cgi";	# CGI�D�{������m

$logfile = "./cutebbs.log";	# �O���ɦ�m
$sub_color = "#3366ff";		# �d�����D�I����
$tbl_color = "#d8f8ff";		# �d����ܳ����I����
$t_w = 65;					# �d����ܮت����(�O�H%�p��,�ܤ֭n��50)
$home_icon = 1;				# home icon�ϥ�? (0=no 1=yes)
$home_gif = "home.gif";		# home icon���ɦW
$home_wid = 21;				# �������
$home_hei = 21;				# ���ɰ���

$method = 'POST';		# method�Φ� (POST/GET)
$pagelog = 10;			# �@����ܯd����
$mailing = 0;			# �d���q�� (0=no 1=yes)
$mailto = 'cyvc@netvigator.com';	# �d���q����email�a�}
$sendmail = '/usr/lib/sendmail';# sendmail����m
$mail_me = 0;			# ���H�d���ɳq���ۤv (0=no 1=yes)
$base_url = "";			# ��L�d���ɥh�쪺��m

#--��r��]�w--
@COLORS = ('808080','4080f0','40a0c0','00ff00','8060c0','ff80e6','ff6680','ff9900');

$wrap = 'soft';			# �d���O�_�۰���� (soft=��� hard=�۰�)
$autolink = 1;			# �۰ʳs���Φ�? (0=no 1=yes)

#    <!--�W��--> <!--�U��--> ��m�O��s�i�X��!!
#    ���s�i�~.�i�H���Jmidi,�ۭp�H�ƭp�Ψ�L�F�F���i�H!~
$banner1 = '<!--�W��-->';	# �b�d���O�W�贡�J
$banner2 = '<!--�U��-->';	 # �b�d���O�U�贡�J

#--�T��ip----------
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

#--�¯d���]�w---------------------------
$pastkey = 0;			# �¯d���s���ϥ�? (0=no 1=yes)
$nofile  = "./pastno.dat";	# �¯d����NO��
$past_dir = ".";		# �O���ɦ�m
$log_line = '100';		# �@�ӽs���i�s�d����
$yybbs2 = "./cutebbs2.cgi";	# �½s���޲z�ɦ�m


#============#
#  �]�w����  #
#============#

## --- �}�l
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
#  �T��IP  #
#----------------#
sub axs_check {
	# HOST���o
	&get_host;

	if ($deny[0]) {
		$flag=0;
		foreach (@deny) {
			if ($_ eq '') { next; }
			$_ =~ s/\*/\.\*/g;
			if ($host =~ /$_/) { $flag=1; last; }
		}
		if ($flag) { &error("�A���w�g�Q�T��d��") }
	}
}

## --- �L?�\��?
sub html_log {
	# �N�b�L�[���擾
	&get_cookie;

	# �t�H�[?���𒲐�
	&get_agent;

	# ?�O��ǂ�?��
	open(IN,"$logfile") || &error("���ॴ�} $logfile",'NOLOCK');
	@lines = <IN>;
	close(IN);

	# �L?��?���J�b�g
	shift(@lines);

	# �e�L?�݂̂̔z��f�[�^���쐬
	@new = ();
	foreach $line (@lines) {
		local($num,$k,$dt,$na,$em,$sub,$com,
			$url,$host,$pw,$color,$icon) = split(/<>/, $line);

		# �e�L?���W��
		if ($k eq "") { push(@new,$line); }
	}

	# ?�X�L?��?�X?�ɂ��邽�ߔz����t?�ɂ���
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
	print "[<a href=\"$homepage\" target=_top>�^�x�j���z�����</a>]\n";
	#print "[<a href=\"$bbstop\">�^�d���O</a>]\n";
	print "[<a href=\"$script?mode=howto\">�ϥΤ�k</a>]\n";
	print "[<a href=\"$script?mode=find\">�j�M</a>]\n";

	# ��??�O��??�N?��\��
	if ($pastkey) {
		print "[<a href=\"$yybbs2\">�¯d���s��</a>]\n";
	}

	print <<"EOM";
[<a href="$script?mode=msg_del">�R���d��</a>]
[<a href="$script?mode=admin">�޲z��</a>]

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
�p�G�A�O�w���綤���e���ðݡA�Ш�[<a href="http://phpbb.phys.tw/viewforum.php?f=14&sid=44cdd0a3bcbd53402652b138662dd142">�Q�װ�</a>]�A���ֱo��ѵ���I
<br>+------------------------------------------------------------------+<br>
</font>
<form method="$method" action="$script">
<input type=hidden name=mode value="msg">
<blockquote>
<table border=0 cellspacing=0>
<tr>
  <td nowrap><b>�m�W</b></td>
  <td><input type=text name=name size="$nam_wid" value="$c_name"></td>
</tr>
<tr>
  <td nowrap><b>�q�l</b></td>
  <td><input type=text name=email size="$nam_wid" value="$c_email"></td>
</tr>
<tr>
  <td nowrap><b>���D</b></td>
  <td nowrap>
    <input type=text name=sub size="$subj_wid">
�@  <input type=submit value="�T�w"><input type=reset value="����">
  </td>
</tr>
<tr>
  <td colspan=2>
    <b>Message</b><br>
    <textarea cols="$com_wid" rows=7 name=comment wrap="$wrap"></textarea>
  </td>
</tr>
<tr>
  <td nowrap><b>���}</b></td>
  <td><input type=text size="$url_wid" name=url value="http://$c_url"></td>
</tr>
EOM

	# ��?�҃A�C�R?��z��ɕt��
	if ($my_icon) {
		push(@icon1,"$my_gif");
		push(@icon2,"�޲z��");
	}

	if ($icon_mode) {
		print "<tr><td nowrap><b>����</b></td><td><select name=icon>\n";
		foreach(0 .. $#icon1) {
			if ($c_icon eq "$icon1[$_]") {
				print "<option value=\"$icon1[$_]\" selected>$icon2[$_]\n";			   } else {
				print "<option value=\"$icon1[$_]\">$icon2[$_]\n";
			}
		}
	print "</select> <small>��ܹ���\n";
	print "[<a href=\"$script?mode=image\" target='_blank'>���ɤ@��</a>]</td></tr>\n";
	}

	print "<tr><td nowrap><b>�K�X</b></td>\n";
	print "<td><input type=password name=pwd size=8 maxlength=8 value=\"$c_pwd\">\n";
	print "<small>�R���αK�X</small></td></tr>\n";
	print "<tr><td nowrap><b>Color</b></td><td>\n";

	# �N�b�L�[�̐F��񂪂Ȃ���?
	if ($c_color eq "") { $c_color = $COLORS[0]; }

	foreach (0 .. $#COLORS) {
		if ($c_color eq "$COLORS[$_]") {
			print "<input type=radio name=color value=\"$COLORS[$_]\" checked> ";
			print "<font color=\"$COLORS[$_]\">��</font>\n";
		} else {
			print "<input type=radio name=color value=\"$COLORS[$_]\"> ";
			print "<font color=\"$COLORS[$_]\">��</font>\n";
		}
	}

	print "</td></tr></table></form></blockquote><font color=\"#0066ff\">+-----------------------------------------------------------------------+<p></font>\n";

	if ($FORM{'page'} eq '') { $page = 0; } 
	else { $page = $FORM{'page'}; }

	# �L??���擾
	$end_data = @new - 1;
	$page_end = $page + ($pagelog - 1);
	if ($page_end >= $end_data) { $page_end = $end_data; }

	foreach ($page .. $page_end) {
		($number,$k,$date,$name,$email,$sub,
			$comment,$url,$host,$pwd,$color,$icon) = split(/<>/, $new[$_]);

		if ($email) { $name = "<a href=\"mailto:$email\">$name</a>"; }

		# URL�\��
		if ($url && $home_icon) {
			$url = "<a href=\"http://$url\" target='_blank'><img src=\"$icon_dir\/$home_gif\" border=0 align=top HSPACE=10 WIDTH=\"$home_wid\" HEIGHT=\"$home_hei\" alt='����'></a>";
		} elsif ($url && !$home_icon) {
			$url = "&lt;<a href=\"http://$url\" target='_blank'>����</a>&gt;";
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
		print "<input type=submit value=\"�^��\"></td></form>";
		print "</tr></table>\n";
		print "<table border=0 cellspacing=7><tr>\n";

		if ($icon ne "") { print "<td><img src=\"$icon_dir\/$icon\"></td>\n"; }
		else { print "<td width=37>�@</td>\n"; }

		# ����??�N
		if ($autolink) { &auto_link($comment); }

		print "<td><font color=\"$color\">$comment</font></td></tr></table>\n";

		## ?�X?�b�Z�[�W��\��
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
				print "&lt;<a href=\"http://$rurl\" target='_blank'>����</a>&gt;";
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
		print "<input type=submit value=\"�W$pagelog��\">\n";
		print "</form></td>\n";	
	}

	# ?��??
	if ($page_end ne "$end_data") {
		print "<td><form method=\"$method\" action=\"$script\">\n";
		print "<input type=hidden name=page value=\"$next_line\">\n";
		print "<input type=submit value=\"�U$pagelog��\">\n";
		print "</form></td>\n";
	}

	print "</tr></table><P>\n";
	&footer;
	exit;
}

## --- ?�O?��?��??
sub regist {
	# ���T�C�g����̃A�N�Z�X��r?
	if ($base_url) {
		$ref_url = $ENV{'HTTP_REFERER'};
		$ref_url =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;

		if ($ref_url !~ /$base_url/) {
			&error("�����T�d��",'NOLOCK');
		}
	}

	# ���O�ƃR??�g�͕K�{
	if ($name eq "") { &error("�п�J�m�W",'NOLOCK'); }
	if ($comment eq "") { &error("�п�J�d�����e",'NOLOCK'); }
	if ($email && $email !~ /(.*)\@(.*)\.(.*)/) {
		&error("�q�l�a�}�����T",'NOLOCK');
	}

	# ��?�A�C�R?�̃`�F�b�N
	if ($my_icon && $icon eq "$my_gif") {
		if ($pwd ne "$pass") { &error("�u���޲z�̤~�i��",'NOLOCK'); }
	}

	# �z�X�g�����擾
	&get_host;

	# ?�Ԃ��擾
	&get_time;

	# �N�b�L�[�𔭍s
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

	# ��d?�e�̋֎~
	local($flag) = 0;
	foreach $line (@lines) {
		($knum,$kk,$kd,$kname,$kem,$ksub,$kcom) = split(/<>/,$line);
		if ($name eq "$kname" && $comment eq "$kcom") {
			$flag=1; last;
		}
	}
	if ($flag) { &error("���i�s��@�ۦP�d��"); }

	# �e�L?�̏�?�A�L?No���J�E?�g�A�b�v
	if ($FORM{'resno'} eq "") { $oya++; $number=$oya; }
	else { $number = $oya; }

	# ��?�L�[����?��
	if ($FORM{'pwd'} ne "") { &passwd_encode($FORM{'pwd'}); }

	# ?�O���t�H�[�}�b�g
	$new_msg = "$number<>$FORM{'resno'}<>$date<>$name<>$email<>$sub<>$comment<>$url<>$host<>$ango<>$color<>$FORM{'icon'}<>\n";

	## �����\�[�g?�́A?�X�L??�e?�͐e�L?�̓g�b�v�ֈړ�
	if ($res_sort && $FORM{'resno'} ne "") {
		@res_data = ();
		@new = ();
		foreach $line (@lines) {
		  $flag = 0;
		  ($num,$k,$d,$na,$em,$sb,$com,$u,$ho,$p,$c,$ico) = split(/<>/,$line);

		  # �e�L?�𔲂��o��
		  if ($k eq "" && $FORM{'resno'} eq "$num") {
			$new_line = "$line";
			$flag = 1;
		  }
		  # �֘A��?�X�L?�𔲂��o��
		  elsif ($k eq "$FORM{'resno'}") {
			push(@res_data,$line);
			$flag = 1;
		  }
		  if ($flag == 0) { push(@new,$line); }
		}

		# �֘A?�X�L?���g�b�v��
		unshift(@new,@res_data);

		# �V�K?�b�Z�[�W���g�b�v��
		unshift(@new,$new_msg);

		# �e�L?���g�b�v��
		unshift(@new,$new_line);


	## �e�L?�̏�?�A�ő�L??�𒴂���L?���J�b�g
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

	## ?�X�L?�͋L??�̒����͂��Ȃ�
	} else {
		@res_data = ();
		@new = ();

		foreach $line (@lines) {
		  $flag = 0;
		  ($num,$k,$d,$na,$em,$sb,$com,$u,$ho,$p,$c,$ico) = split(/<>/,$line);

		  # �e�L?�𔲂��o��
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

	# �e�L?NO��t��
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

## --- �ԐM�t�H�[?
sub res_msg {
	# ?�O��ǂ�?��
	open(DB,"$logfile") || &error("Can't open $logfile",'NOLOCK');
	@lines = <DB>;
	close(DB);

	# �e�L?NO���J�b�g
	@lines = splice(@lines,1);

	# �t�H�[?�����`
	&get_agent;

	# �N�b�L�[���擾
	&get_cookie;

	&header;
	print "�H�U���d��NO <B>$FORM{'resno'}</B> �O����^�Яd��<hr>\n";
	print "<center><table border=0 width=\"60%\" cellpadding=10 bgcolor=\"$tbl_color\">\n";
	print "<tr><td>\n";

	$flag=0;
	foreach $line (@lines) {
		local($num,$k,$date,$name,$email,$sub,$com) = split(/<>/, $line);

		# �e�L?���o��
		if ($k eq "" && $FORM{'resno'} eq "$num") {
			$resub = $sub;
			$flag=1;
			print "<B>[�d��]</B><P>\n";
			print "<font color=\"$sub_color\"><B>$sub</B></font>\n";
			print "�m�W <B>$name</B></font>\n";
			print "<small> - $date</small><br>\n";
			print "<blockquote>$com</blockquote><P>\n";

		# ?�X�L?�� @res �Ɋi�[
		} elsif ($k ne "" && $FORM{'resno'} eq "$k") {

			push(@res,$line);
		}
	}

	# ?�X�L?��\��
	if (@res) {
		# �L?���t?��
		@res = reverse(@res);

		$flag = 0;
		foreach $line (@res) {
			local($num,$k,$date,$name,$email,$sub,$com) = split(/<>/,$line);

			if ($flag == 0) {
				$flag=1;
				print "<hr size=2><B>[�^�Яd��]</B><br>\n";
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
  <td nowrap><b>�m�W</b></td>
  <td><input type=text name=name value="$c_name" size=$nam_wid></td>
</tr>
<tr>
  <td nowrap><b>�q�l</b></td>
  <td><input type=text name=email value="$c_email" size=$nam_wid></td>
</tr>
<tr>
  <td nowrap><b>���D</b></td>
  <td><input type=text name=sub value="$resub" size=$subj_wid>
  <input type=submit value="�T�w"><input type=reset value="����"></td>
</tr>
<tr>
  <td colspan=2><b>�d��</b><br>
  <textarea cols=$com_wid rows=5 name=comment wrap="$wrap"></textarea></td>
</tr>
<tr>
  <td nowrap><b>����</b></td>
  <td><input type=text name=url value="http://$c_url" size=$url_wid></td>
</tr>
EOM

	# ��?�҃A�C�R?��z��ɕt��
	if ($my_icon) {
		push(@icon1,"$my_gif");
		push(@icon2,"�޲z�̥�");
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
		print "</select> <small>��ܹ���\n";
		print "[<a href=\"$script?mode=image\" target=_blank>���ɤ@��</a>]</small></td></tr>\n";
	}

	print "<tr><td nowrap><b>�K�X</b>";
	print "<td><input type=password name=pwd size=8 maxlength=8 value=\"$c_pwd\">\n";
	print "<small>#�R���αK�X</small></td></tr>\n";
	print "<tr><td nowrap><b>��r��</b></td><td>\n";

	# �N�b�L�[�̐F��񂪂Ȃ���?
	if ($c_color eq "") { $c_color = $COLORS[0]; }

	foreach (0 .. $#COLORS) {
		if ($c_color eq "$COLORS[$_]") {
			print "<input type=radio name=color value=\"$COLORS[$_]\" checked>";
			print "<font color=\"$COLORS[$_]\">��</font>\n";

		} else {
			print "<input type=radio name=color value=\"$COLORS[$_]\">";
			print "<font color=$COLORS[$_]>��</font>\n";
		}
	}

	print "</td></tr></table></form>\n";
	print "</blockquote><P><hr><P>\n";
	&footer;
	exit;
}

## --- �t�H�[?����̃f�[�^??
sub decode {
	if ($ENV{'REQUEST_METHOD'} eq "POST") {
		if ($ENV{'CONTENT_LENGTH'} > 51200) {
			&error("�d���L�h",'NOLOCK');
		}
		read(STDIN, $buffer, $ENV{'CONTENT_LENGTH'});
	} else { $buffer = $ENV{'QUERY_STRING'}; }

	@pairs = split(/&/, $buffer);
	foreach $pair (@pairs) {
		($name, $value) = split(/=/, $pair);
		$value =~ tr/+/ /;
		$value =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;

		# ��?�R�[�h��S-JIS�ϊ�
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
	if ($sub eq "") { $sub = "�L�D"; }
	$pwd     = $FORM{'pwd'};
	$pwd     =~ s/\r//g;
	$pwd     =~ s/\n//g;
	$icon    = $FORM{'icon'};
	$color   = $FORM{'color'};
}

## --- �f���̎g����?�b�Z�[�W
sub howto {
	if ($tagkey == 0) { $tag_msg = "�d�����e<b>���i�H�ϥλy�k</b>\n"; }
	else { $tag_msg = "�d�����e<b>�i�H�ϥλy�k</b>\n"; }

	&header;
	print <<"HTML";

<table width="100%">
<tr>
  <th bgcolor="#d8f8ff">�d���O�`�N�ƶ�</th>
</tr>
<tr>
  <td align=center>[<a href="$script\?">�^�d���O</a>]</td>
</tr>
</table>
<P><center>
<table width="50%" border=1 cellpadding=10>
<tr><td bgcolor="$tbl_color">
<OL>
<LI>�o�ӯd���O<b>����cookie</b>.�u�n���g��J�L�����--�p:�m�W,�q�l�l��,���}����,���|�ۤv�O��!!��ĤG���^�ӯd���ɴN���ΦA��J�F!!<P>
<LI>$tag_msg<P>
<LI>�d���ɥH�U���ؤ@�w�n��J<b>�m�W</b>�M<b>�d��</b>.��L�N�i�H�H�K��J�P�_!<P>
<LI>�d����<b>�R���αK�X</b>���K�X�n�b8�ӭ^�Ʀr�H��,�кɶq��J<b>�R���αK�X</b>�H�K���R���ۦ�d��<P>
<LI>�d���s��<b>�̦h$max�g</b>�W�L�N�|�۰ʧR��!!~<P>
<LI>�b�i�����d����<b>�^��</b>����k,�N�O���U�d���W<b>�^��</b>�o�ӫ��s,�N�i��^�Яd���Ϊ��e��!!<P>
<LI>�¯d���i�H�b<b>[�j�M]���@²�����M��!</b>Top Menu��<a href="$script?mode=find">[�j�M]</a>��J����r,�N�i�H�o�����G!!~<P>
<LI>�޲z�̦��v�⤤�˥L�H���d���R�h!!<P>
<LI>�Y�b�ϥΤW����L���D�A�w��H�H�߰�!<P>
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
  <th bgcolor="#d8f8ff">�j�M</th>
</tr>
<tr>
  <td align=center>[<a href="$script\?">�^�d���O</a>]</td>
</tr>
</table>
<P><center>
<table cellpadding=5>
<tr><td bgcolor="$tbl_color" nowrap>
  <UL>
  <LI>�j�M��k<b>����r</b>��J��,�A���j�M!!
  <LI>����r�@�w�n��[�b�Φr]!!
  </OL>
</td></tr>
</table>
<P><form action="$script" method="$method">
<input type=hidden name=mode value="find">
<table border=1 cellspacing=1>
<tr>
  <th colspan=2>����r <input type=text name=word size=30></th>
</tr>
<tr>
  <td>�j�M����</td>
  <td>
    <input type=radio name=cond value="and" checked>AND
    <input type=radio name=cond value="or">OR
  </td>
</tr>
<tr>
  <th colspan=2>
    <input type=submit value="�j�M"><input type=reset value="����">
  </th>
</tr>
</table>
</form></center>
HTML
	# ?�[�h?���̎��s��?�ʕ\��
	if ($FORM{'word'} ne ""){

		# ���͓��e��?
		$cond = $FORM{'cond'};
		$word = $FORM{'word'};
		$word =~ s/�@/ /g;
		$word =~ s/\t/ /g;
		@pairs = split(/ /,$word);

		# �t�@�C?��ǂ�?��
		open(DB,"$logfile") || &error("���ॴ�} $logfile",'NOLOCK');
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
		print "<hr><b><font color=\"$t_color\">�j�M���G : $count��</font></b><P>\n";
		print "<OL>\n";

		foreach $line (@new) {
			($num,$k,$date,$name,$email,$sub,$com,$url) = split(/<>/,$line);

			if ($email) { $name = "<a href=\"mailto:$email\">$name</a>"; }
			if ($url) { $url = "[<a href=\"http://$url\" target='_blank'>����</a>]"; }

			if ($k) { $num = "$k��"; }

			# ?�ʂ�\��
			print "<LI>[$num] <font color=\"$sub_color\"><b>$sub</b></font>\n";
			print "�d����<b>$name</b> <small> $url �d����$date</small>\n";
			print "<P><blockquote>$com</blockquote><hr>\n";
		}

		print "</OL><P>\n";
	}

	&footer;
	exit;
}

## --- �u?�E�U�𔻒f���t�H�[??�𒲐�
sub get_agent {
	# �u?�E�U�����擾
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

## --- �N�b�L�[�̔��s
sub set_cookie {
	# �N�b�L�[��60���ԗL��
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

## --- �N�b�L�[���擾
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

## --- ��?���
sub msg_del {
	if ($FORM{'action'} eq 'admin' && $FORM{'pass'} ne "$pass") {
		&error("�K�X�����T",'NOLOCK');
	}

	open(DB,$logfile) || &error("Can't open $logfile",'NOLOCK');
	@lines = <DB>;
	close(DB);

	shift(@lines);

	# �e�L?�݂̂̔z��f�[�^���쐬
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
	print "�d���R���e��</th></tr>\n";
	print "<tr><td align=center>[<a href=\"$script\?\">�^�d���O</a>]</td>\n";
	print "</tr></table><P><center>\n";
	print "<table border=0 cellpadding=5><tr>\n";
	print "<td bgcolor=$tbl_color>\n";

	if ($FORM{'action'} eq '') {
		print "���d���ɿ�J[�R���αK�X],�H�K�ۦ�R���d��!<br>\n";
	}

	print "���R���d����,��J�ۤv�d���ɪ��K�X�N�i�H!!<br>\n";
	print "���R���d����,�s�P�^�Яd�����|�@���R�h!!<br>\n";
	print "</td></tr></table><P>\n";
	print "<form action=\"$script\" method=$method>\n";

	if ($FORM{'action'} eq '') {
		print "<input type=hidden name=mode value=\"usr_del\">\n";
		print "<b>�K�X</b> <input type=text name=del_key size=10>\n";
	} else {
		print "<input type=hidden name=mode value=\"admin_del\">\n";
		print "<input type=hidden name=action value=\"admin\">\n";
		print "<input type=hidden name=pass value=\"$FORM{'pass'}\">\n";
	}

	print "<input type=submit value=\"�R��\"><input type=reset value=\"����\">\n";
	print "<P><table border=1>\n";
	print "<tr><th>�R��</th><th>�d��No</th><th>Title</th><th>Name</th><th>Date</th><th>���e</th>\n";

	if ($FORM{'action'} eq 'admin') { print "<th>I.P��m</th>\n"; }

	print "</tr>\n";

	if ($FORM{'page'} eq '') { $page = 0; }
	else { $page = $FORM{'page'}; }

	# �L??���擾
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

		## ?�X?�b�Z�[�W��\��
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

				print "<td colspan=2 align=center><b>$num</b>���^��</td>\n";
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
	  print "<input type=submit value=\"�W$pagelog��\">\n";

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
	  print "<input type=submit value=\"�U$pagelog��\">\n";

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
	if ($FORM{'del_key'} eq "") { &error("�K�X�����T",'NOLOCK'); }
	if ($FORM{'del'} eq "") { &error("�п�ܫ��s",'NOLOCK'); }

	# ?�b�N�J�n
	if ($lockkey == 1) { &lock1; }
	elsif ($lockkey == 2) { &lock2; }

	# ?�O��ǂ�?��
	open(DB,"$logfile") || &error("����g�J $logfile");
	@lines = <DB>;
	close(DB);

	# �e�L?NO
	$oya = $lines[0];
	if ($oya =~ /<>/) { &error("���X�����T");	}

	shift(@lines);

	## ��?�L�[�ɂ��L?��? ##
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

	if ($del_num eq '') { &error("$FORM{'del'}�䤣��Q�R�����d��"); }
	else {
		if ($encode_pwd eq '') { &error("�K�X�]�w�����T"); }
		$plain_text = $FORM{'del_key'};
		&passwd_decode($encode_pwd);
		if ($check eq 'no') { &error("�K�X�����T"); }
	}

	# �e�L?NO��t��
	unshift(@new,$oya);

	## ?�O���X�V ##
	open(DB,">$logfile") || &error("����g�J $logfile");
	print DB @new;
	close(DB);

	# ?�b�N��?
	if (-e $lockfile) { unlink($lockfile); }

	# ��?��ʂɂ��ǂ�
	&msg_del;
}

## --- ��?�҈�?�L?��?
sub admin_del {
	if ($FORM{'pass'} ne "$pass") { &error("�K�X�����T",'NOLOCK'); }
	if ($FORM{'del'} eq "") { &error("�п�ܫ��s",'NOLOCK'); }

	# ?�b�N�J�n
	if ($lockkey == 1) { &lock1; }
	elsif ($lockkey == 2) { &lock2; }

	# ?�O��ǂ�?��
	open(DB,"$logfile") || &error("���ॴ�} $logfile");
	@lines = <DB>;
	close(DB);

	# �e�L?NO
	$oya = $lines[0];
	if ($oya =~ /<>/) {
		&error("�T�w�S�����X<P>
			<small>\(�n���v2.5���e������)<\/small>");
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

	# �e�L?NO��t��
	unshift(@new,$oya);

	## ?�O���X�V ##
	open(DB,">$logfile") || &error("����g�J $logfile");
	print DB @new;
	close(DB);

	# ?�b�N��?
	if (-e $lockfile) { unlink($lockfile); }

	# ��?��ʂɂ��ǂ�
	&msg_del;
}

## --- ��?�ғ������
sub admin {
	&header;
	print "<center><h4>��J�޲z�αK�X</h4>\n";
	print "<form action=\"$script\" method=$method>\n";
	print "<input type=hidden name=mode value=\"msg_del\">\n";
	print "<input type=hidden name=action value=\"admin\">\n";
	print "<input type=password name=pass size=8><input type=submit value=\" �T�w \">\n";
	print "</form></center><P><hr><P>\n";
	&footer;
	exit;
}

## --- ?�Ԃ��擾
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

	# ��?�̃t�H�[�}�b�g
	$date = "$year\/$mon\/$mday\($week\) $hour\:$min\:$sec";
}

## --- �J�E?�^??
sub counter {
	# �{??�̂݃J�E?�g�A�b�v
	$match=0;
	if ($FORM{'mode'} eq '') {
		# �J�E?�^?�b�N
		if ($lockkey) { &lock3; }

		$match=1;
	}

	# �J�E?�g�t�@�C?��ǂ݂���
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
		if (--$retry <= 0) { &error("�еy��A��"); }
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
	if (!$retry) { &error("�еy��A��"); }
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
	$mail_sub = "$title �d��";

    #	&jcode'convert(*mail_sub,'jis');
    #	&jcode'convert(*name,'jis');
    	#&jcode'convert(*sub,'jis');
    #	&jcode'convert(*comment,'jis');

	$comment =~ s/<br>/\n/g;
	$comment =~ s/&lt;/</g;
	$comment =~ s/&gt;/>/g;

	if (open(MAIL,"| $sendmail $mailto")) {
	print MAIL "To: $mailto\n";

	# ?�[?�A�h?�X���Ȃ���?�̓_�~�[?�[?�ɒu������
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

## --- HTML�̃w�b�_�[
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

## --- HTML�̃t�b�^�[
sub footer {
	## MakiMaki����̉�?�g�p�̗L���Ɋւ�炸���̂R��?��??�N?��
	## ��?���邱�Ƃ͂ł��܂���B
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
	print "<h3>���ɤ@��</h3>\n";
	print "<P>�U��i�H��ܦۤv���w������\n";
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
	print "<FORM><INPUT TYPE=\"button\" VALUE=\"  ��������  \" onClick=\"top.close();\"></FORM></center>\n";
	print "</body></html>\n";
	exit;
}

## --- �z�X�g���擾
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

	# ��??�O�̃t�@�C?�����`
	$pastfile  = "$past_dir\/$count\.html";

	# ��??�O���Ȃ���?�A�V�K�Ɏ�����������
	unless(-e $pastfile) { &new_log; }

	# ��??�O���J��
	if ($new_flag == 0) {
		open (IN,"$pastfile") || &error("Can't open $pastfile");
		@past = <IN>;
		close(IN);
	}

	# �K��̍s?���I�[�o�[����ƁA?�t�@�C?��������������
	if ($#past > $log_line) { &next_log; }

	foreach $pst_line (@past_data) {
		($pnum,$pk,$pdt,$pname,$pemail,
			$psub,$pcom,$purl,$phost,$ppw) = split(/<>/, $pst_line);

		if ($pemail) { $pname = "<a href=\"mailto:$pemail\">$pname</a>"; }
		if ($purl) { $purl="<a href=\"http://$purl\" target='_top'>http://$purl</a>"; }
		if ($pk) { $pnum = "$pk��"; }

		# ����??�N
		if ($autolink) { &auto_link($pcom); }

		# �ۑ��L?���t�H�[�}�b�g
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
	# ?�t�@�C?�̂��߂̃J�E?�g�A�b�v
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

	$past[0] = "<html><head><title>�½s��</title></head>\n";
	$past[1] = "<body $bgkey text=$text><hr size=1>\n";
	$past[2] = "<\!--HAJIME-->\n";
	$past[3] = "<\!--OWARI-->\n";
	$past[4] = "</body></html>\n";

	# �V�K��??�O�t�@�C?�𐶐��X�V
	open(OUT,">$pastfile") || &error("Can't write $pastfile");
	print OUT @past;
	close(OUT);

	# �p�[�~�b�V??��666�ցB
	chmod(0666,"$pastfile");
}
