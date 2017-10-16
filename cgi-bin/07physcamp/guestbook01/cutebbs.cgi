#!/usr/bin/perl

#### Script§@¦¨«~ ####################
##									##
## YY-BOARD v3.21 (00/06/26) 		##
##   Copyright(C) KENT WEB 2000		##
##   E-MAIL: webmaster@kent-web.com	##
##   WWW: http://www.kent-web.com/	##
##----------------------------------##
#	¤¤¤å¤Æ by Blue EV's Studio
#	ºô§}		http://cgiunion.hypermart.net/
#	Edmond
#	ºô§}		http://edmonddomain.hypermart.net/
#	¹q¶l		cyvc@netvigator.com
#	Vivienne
#	ºô§}		http://viviennechan.hypermart.net/
#	¹q¶l		vivien90@netvigator.com
#-----------------------------------------------------------------------------------
#¨Ï¥Î¦u«h															
#	1.	Blue EV's StudioªºCGI¬O§K¶O³n¥ó¡A§Æ±æ¬O¥Î§@­Ó¤Hºô­¶¤§¥Î¡A¸T¤î¥ô¦ó°Ó·~²ÕÂ´¨Ï¥Î
#
#	2.	¥¼¸g¦P·N¡AÄY¸T¨p¦ÛÂà¸ü©Î½Æ»s©Î´£¨Ñ¦¹»¡©úÀÉ¤Î¥»¤¤¤å¤Æµ{¦¡
#
#	3.	¤£±o§R°£¥ô¦óª©Åv«Å§i¡A§_«hBlue EV's Studio·|°±¤î©Ò¦³CGIªº¶}©ñ¤U¸ü
#
#	4.	¥»CGI¹ï»Õ¤U°µ¦¨¤§¥ô¦ó·l¥¢,±N¤£·|­t¤W¥ô¦ó³d¥ô
#
#	5.	§Æ±æ¨Ï¥Î¥»CGI®É,µo²{¦³¿ù»~¤§³B,½Ğ§iª¾§@ªÌ
######################################


##+--------------------------------+##
##									##
##CUTE BBS -Blue- v0.0716 (00.07.16)##
##									##
## Edit By CGI Cafe.		j		##
##	URL: http://saya.g--z.com/		##
##									##
##+--------------------------------+##

$ver = 'CUTE BBS[B] v0.0716'; # ª©¥»

## ---[ª`·N¨Æ¶µ]------------------------------------------------##
##
##
##	CGI¬[ºc	##
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
#  ³]©w¶µ¥Ø  #
#============#

#require './jcode.pl';		

$title = "++ 2007 NTU PhysCamp ¯d¨¥ª© ++";	# ¼ĞÃD¦WºÙ
$t_color = "#008080";		# ¼ĞÃDÃC¦â
$t_point = '12';			# ¼ĞÃD¤j¤p(¥HPT­p)
$t_face = "Comic Sans MS";	# ¼ĞÃD¦r«¬

$pt = '10';					# ¤å¦r¤j¤p(¥HPT­p)
$backgif = "http://st.phys.ntu.edu.tw/~physcamp/07physcamp/img/physcampbg01.jpg";				# ­I´º¹ÏÀÉ(¥Hhttp://¬°¥ı)
$bgcolor = "#FFFFFF";		# ­I´ºÃC¦â
$text = "#808080";			# ¤å¦r¦â

$homepage = "http://st.phys.ntu.edu.tw/physcamp";# ­º­¶¦ì¸m
$bbstop = "./cutebbs.cgi";	# ¯d¨¥ªO­º­¶(¤£¥Î§ó§ï)
$max = 1000;					# ³Ì¤j¯d¨¥½s¼Æ
$pass = 'physland';				# ºŞ²zªÌ±K½X(8­Ó­^¼Æ¦r¥H¤º)

#--Style ¼Ë¦¡----------------------
$a_link = "#1a99ff";		# LinkÃC¦â
$hb_link = "#99ccff";		# «ü¥Ü®É­I´º¦â
$h_link = "#0066ff";		# «ü¥Ü®É¤å¦r¦â
$border_c = "#80e6ff";		# °O¨Æ¥~®Ø¦â
$tback_color = "#ffffff";	# °O¨Æ³¡¥÷­I´º¦â
$tfont_color = "#0066ff";	# °O¨Æ³¡¥÷¤å¦r¦â

#--Icon¦ì¸m--------
$icon_dir = "http://st.phys.ntu.edu.tw/~b93202001/img/";		# ¤£¬O©Mcutebbs.cgi¦b¦P¤@¥Ø¿ı¤U®É,´N¥Hhttp://ªí¥Ü

#--¹ÏÀÉ³]©w(­n¤W¤U¹ïÀ³)------
@icon1 = ('happy.gif','no.gif','pu.gif','sad.gif','very_happy.gif','what.gif');

@icon2 =  ('§Ö¼Ö','¤£­n','¦ù¦ŞÀY','¶Ë¤ß','«Ü°ª¿³','¤°»ò');


#--¨Ï¥Îicon? (0=no 1=yes)-------------
$icon_mode = 1;			

#--ºŞ²zªÌ±M¥Îicon (0=no 1=yes)-----
$my_icon = 1;			# ¦b¯d¨¥®É,©ó§R°£¦ì¸m¿é¤J±K½X
$my_gif  = 'kid2.gif';		# iconÀÉ¦WºÙ

$res_sort = 1;			# ¦^ÂĞ¯d¨¥©ñ¸m¤W³Ì«e (0=no 1=yes)

#--HOST¨ú±o¤èªk----------------------
$get_remotehost = 0;		# 0-->$ENV{'REMOTE_HOST'} 1-->gethostbyaddr 

#--¼ĞÃD¹ÏÀÉ 
$title_gif = "http://st.phys.ntu.edu.tw/physcamp/07physcamp/img/guestbg01.jpg";	# ¹ÏÀÉ¦ì¸mhttp://¥H¥ı
$tg_w = '588';				# ¹ÏÀÉÁï
$tg_h = '61';				# ¹ÏÀÉ°ª

#--Âê©w³]©w----------------------
#  --> 0=no		1=symlink	2=open
$lockkey = 0;

$lockfile = "./cutebbs.lock";	# Âê©wÀÉ¦WºÙ
$cntlock = "./cutecnt.lock";	# ¤H¼Æ­pÂê©wÀÉ¦WºÙ

#--¤H¼Æ­p³]©w----------------------
$counter = 1;			# 0=¤£¥Î, 1=¯Â¤å¦r, 2=¹Ï¹³
$mini_fig = 5;			# Åã¥Ü¦ì¼Æ
$cnt_color = "#0066ff";		# ¯Â¤å¦r®Éªº¤å¦r¦â
$gif_path = "./img";		# ¤H¼Æ­pªº¹ÏÀÉ¦ì¸m
$mini_w = 15;			# ¹ÏÀÉÁï«×
$mini_h = 15;			# ¹ÏÀÉ°ª«×
$cntfile = "./ccount.dat";	# ¤H¼Æ°O¿ıÀÉ¦WºÙ

$tagkey = 0;				# »yªk¨Ï¥Î? (0=no 1=yes)
$script  = "./cutebbs.cgi";	# CGI¥Dµ{¦¡ªº¦ì¸m

$logfile = "./cutebbs.log";	# °O¿ıÀÉ¦ì¸m
$sub_color = "#3366ff";		# ¯d¨¥¼ĞÃD­I´º¦â
$tbl_color = "#d8f8ff";		# ¯d¨¥Åã¥Ü³¡¥÷­I´º¦â
$t_w = 65;					# ¯d¨¥Åã¥Ü®ØªºÁï«×(¬O¥H%­pºâ,¦Ü¤Ö­n¦³50)
$home_icon = 1;				# home icon¨Ï¥Î? (0=no 1=yes)
$home_gif = "home.gif";		# home icon¹ÏÀÉ¦W
$home_wid = 21;				# ¹ÏÀÉÁï«×
$home_hei = 21;				# ¹ÏÀÉ°ª«×

$method = 'POST';		# method§Î¦¡ (POST/GET)
$pagelog = 10;			# ¤@­¶Åã¥Ü¯d¨¥¼Æ
$mailing = 0;			# ¯d¨¥³qª¾ (0=no 1=yes)
$mailto = 'cyvc@netvigator.com';	# ¯d¨¥³qª¾ªºemail¦a§}
$sendmail = '/usr/lib/sendmail';# sendmailªº¦ì¸m
$mail_me = 0;			# ¦³¤H¯d¨¥®É³qª¾¦Û¤v (0=no 1=yes)
$base_url = "";			# ¨ä¥L¯d¨¥®É¥h¨ìªº¦ì¸m

#--¤å¦r¦â³]©w--
@COLORS = ('808080','4080f0','40a0c0','00ff00','8060c0','ff80e6','ff6680','ff9900');

$wrap = 'soft';			# ¯d¨¥¬O§_¦Û°ÊÂà¦æ (soft=¤â°Ê hard=¦Û°Ê)
$autolink = 1;			# ¦Û°Ê³sµ²§Î¦¨? (0=no 1=yes)

#    <!--¤W¤è--> <!--¤U¤è--> ¦ì¸m¬O©ñ¼s§i½Xªº!!
#    °£¼s§i¥~.¥i¥H´¡¤Jmidi,¦Û­p¤H¼Æ­p©Î¨ä¥LªFªF³£¥i¥H!~
$banner1 = '<!--¤W¤è-->';	# ¦b¯d¨¥ªO¤W¤è´¡¤J
$banner2 = '<!--¤U¤è-->';	 # ¦b¯d¨¥ªO¤U¤è´¡¤J

#--¸T¤îip----------
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

#--ÂÂ¯d¨¥³]©w---------------------------
$pastkey = 0;			# ÂÂ¯d¨¥½s¶°¨Ï¥Î? (0=no 1=yes)
$nofile  = "./pastno.dat";	# ÂÂ¯d¨¥¥ÎNOÀÉ
$past_dir = ".";		# °O¿ıÀÉ¦ì¸m
$log_line = '100';		# ¤@­Ó½s¶°¥i¦s¯d¨¥¼Æ
$yybbs2 = "./cutebbs2.cgi";	# ÂÂ½s¶°ºŞ²zÀÉ¦ì¸m


#============#
#  ³]©w§¹¦¨  #
#============#

## --- ¶}©l
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
#  ¸T¤îIP  #
#----------------#
sub axs_check {
	# HOST¨ú±o
	&get_host;

	if ($deny[0]) {
		$flag=0;
		foreach (@deny) {
			if ($_ eq '') { next; }
			$_ =~ s/\*/\.\*/g;
			if ($host =~ /$_/) { $flag=1; last; }
		}
		if ($flag) { &error("§Aªº¤w¸g³Q¸T¤î¯d¨¥") }
	}
}

## --- ‹L?•\¦?
sub html_log {
	# ƒNƒbƒL[‚ğæ“¾
	&get_cookie;

	# ƒtƒH[?’·‚ğ’²®
	&get_agent;

	# ?ƒO‚ğ“Ç‚İ?‚İ
	open(IN,"$logfile") || &error("¤£¯à¥´¶} $logfile",'NOLOCK');
	@lines = <IN>;
	close(IN);

	# ‹L?”Ô?‚ğƒJƒbƒg
	shift(@lines);

	# e‹L?‚Ì‚İ‚Ì”z—ñƒf[ƒ^‚ğì¬
	@new = ();
	foreach $line (@lines) {
		local($num,$k,$dt,$na,$em,$sub,$com,
			$url,$host,$pw,$color,$icon) = split(/<>/, $line);

		# e‹L?‚ğW–ñ
		if ($k eq "") { push(@new,$line); }
	}

	# ?ƒX‹L?‚Í?ƒX?‚É‚Â‚¯‚é‚½‚ß”z—ñ‚ğ‹t?‚É‚·‚é
	@lines = reverse(@lines);

	# ƒwƒbƒ_‚ğo—Í
	&header;

	# ƒJƒE?ƒ^??
	if ($counter) { &counter; }

	# ƒ^ƒCƒg??
	print "<center>$banner1<P>\n";
	if ($title_gif eq '') {
		print "<font color=\"$t_color\" size=6 face=\"$t_face\"><b><SPAN>$title</SPAN></b></font>\n";
	}
	else {
		print "<img src=\"$title_gif\" width=\"$tg_w\" height=\"$tg_h\">\n";
	}

	print "<font color=\"#0066ff\"><br>+------------------------------------------------------------------+<br></font>\n";
	print "[<a href=\"$homepage\" target=_top>¦^¥x¤jª«²zÀçºô¯¸</a>]\n";
	#print "[<a href=\"$bbstop\">¦^¯d¨¥ªO</a>]\n";
	print "[<a href=\"$script?mode=howto\">¨Ï¥Î¤èªk</a>]\n";
	print "[<a href=\"$script?mode=find\">·j´M</a>]\n";

	# ‰ß??ƒO‚Ì??ƒN?‚ğ•\¦
	if ($pastkey) {
		print "[<a href=\"$yybbs2\">ÂÂ¯d¨¥½s¶°</a>]\n";
	}

	print <<"EOM";
[<a href="$script?mode=msg_del">§R°£¯d¨¥</a>]
[<a href="$script?mode=admin">ºŞ²z¥Î</a>]

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
¦pªG§A¬O°w¹ïÀç¶¤¤º®e¦³ºÃ°İ¡A½Ğ¨ì[<a href="http://phpbb.phys.tw/viewforum.php?f=14&sid=44cdd0a3bcbd53402652b138662dd142">°Q½×°Ï</a>]¡A¯à§ó§Ö±o¨ì¸Ñµª³á¡I
<br>+------------------------------------------------------------------+<br>
</font>
<form method="$method" action="$script">
<input type=hidden name=mode value="msg">
<blockquote>
<table border=0 cellspacing=0>
<tr>
  <td nowrap><b>©m¦W</b></td>
  <td><input type=text name=name size="$nam_wid" value="$c_name"></td>
</tr>
<tr>
  <td nowrap><b>¹q¶l</b></td>
  <td><input type=text name=email size="$nam_wid" value="$c_email"></td>
</tr>
<tr>
  <td nowrap><b>¼ĞÃD</b></td>
  <td nowrap>
    <input type=text name=sub size="$subj_wid">
@  <input type=submit value="½T©w"><input type=reset value="­«¾ã">
  </td>
</tr>
<tr>
  <td colspan=2>
    <b>Message</b><br>
    <textarea cols="$com_wid" rows=7 name=comment wrap="$wrap"></textarea>
  </td>
</tr>
<tr>
  <td nowrap><b>ºô§}</b></td>
  <td><input type=text size="$url_wid" name=url value="http://$c_url"></td>
</tr>
EOM

	# ŠÇ?ÒƒAƒCƒR?‚ğ”z—ñ‚É•t‰Á
	if ($my_icon) {
		push(@icon1,"$my_gif");
		push(@icon2,"ºŞ²z¥Î");
	}

	if ($icon_mode) {
		print "<tr><td nowrap><b>¹ÏÀÉ</b></td><td><select name=icon>\n";
		foreach(0 .. $#icon1) {
			if ($c_icon eq "$icon1[$_]") {
				print "<option value=\"$icon1[$_]\" selected>$icon2[$_]\n";			   } else {
				print "<option value=\"$icon1[$_]\">$icon2[$_]\n";
			}
		}
	print "</select> <small>¿ï¾Ü¹ÏÀÉ\n";
	print "[<a href=\"$script?mode=image\" target='_blank'>¹ÏÀÉ¤@Äı</a>]</td></tr>\n";
	}

	print "<tr><td nowrap><b>±K½X</b></td>\n";
	print "<td><input type=password name=pwd size=8 maxlength=8 value=\"$c_pwd\">\n";
	print "<small>§R°£¥Î±K½X</small></td></tr>\n";
	print "<tr><td nowrap><b>Color</b></td><td>\n";

	# ƒNƒbƒL[‚ÌFî•ñ‚ª‚È‚¢ê?
	if ($c_color eq "") { $c_color = $COLORS[0]; }

	foreach (0 .. $#COLORS) {
		if ($c_color eq "$COLORS[$_]") {
			print "<input type=radio name=color value=\"$COLORS[$_]\" checked> ";
			print "<font color=\"$COLORS[$_]\">¡¹</font>\n";
		} else {
			print "<input type=radio name=color value=\"$COLORS[$_]\"> ";
			print "<font color=\"$COLORS[$_]\">¡¹</font>\n";
		}
	}

	print "</td></tr></table></form></blockquote><font color=\"#0066ff\">+-----------------------------------------------------------------------+<p></font>\n";

	if ($FORM{'page'} eq '') { $page = 0; } 
	else { $page = $FORM{'page'}; }

	# ‹L??‚ğæ“¾
	$end_data = @new - 1;
	$page_end = $page + ($pagelog - 1);
	if ($page_end >= $end_data) { $page_end = $end_data; }

	foreach ($page .. $page_end) {
		($number,$k,$date,$name,$email,$sub,
			$comment,$url,$host,$pwd,$color,$icon) = split(/<>/, $new[$_]);

		if ($email) { $name = "<a href=\"mailto:$email\">$name</a>"; }

		# URL•\¦
		if ($url && $home_icon) {
			$url = "<a href=\"http://$url\" target='_blank'><img src=\"$icon_dir\/$home_gif\" border=0 align=top HSPACE=10 WIDTH=\"$home_wid\" HEIGHT=\"$home_hei\" alt='­º­¶'></a>";
		} elsif ($url && !$home_icon) {
			$url = "&lt;<a href=\"http://$url\" target='_blank'>­º­¶</a>&gt;";
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
		print "<input type=submit value=\"¦^ÂĞ\"></td></form>";
		print "</tr></table>\n";
		print "<table border=0 cellspacing=7><tr>\n";

		if ($icon ne "") { print "<td><img src=\"$icon_dir\/$icon\"></td>\n"; }
		else { print "<td width=37>@</td>\n"; }

		# ©“®??ƒN
		if ($autolink) { &auto_link($comment); }

		print "<td><font color=\"$color\">$comment</font></td></tr></table>\n";

		## ?ƒX?ƒbƒZ[ƒW‚ğ•\¦
		foreach $line (@lines) {
		  ($rnum,$rk,$rd,$rname,$rem,$rsub,
			$rcom,$rurl,$rho,$rp,$rc,$ri) = split(/<>/,$line);

		  if ($rem) { $rname = "<a href=\"mailto:$rem\">$rname</a>"; }

		  if ($number eq "$rk") {

			print "<center><hr width='90%' size=1 noshade></center>\n";
			print "<table cellspacing=0 cellpadding=0 border=0><tr><td width=37>@</td>\n";

			if ($ri ne "") {
				print "<td><img src=\"$icon_dir\/$ri\"></td><td><font face=\"Arial,verdana\">&nbsp;&nbsp;</font></td>\n";
			} else {
				print "<td width=35>@</td><td align=\"right\"><font face=\"Arial,verdana\">&nbsp;&nbsp;</font></td>\n";
			}

			print "<td><font color=\"$sub_color\"><b>$rsub</b></font> ";
			print "by <b>$rname</b></font> - ";
			print "<small>$rd</small> ";

			# URL•\¦
			if ($rurl && !$home_icon) {
				print "&lt;<a href=\"http://$rurl\" target='_blank'>­º­¶</a>&gt;";
			} elsif ($rurl && $home_icon) {
				print "<a href=\"http://$rurl\" target='_blank'><img src=\"$icon_dir\/$home_gif\" border=0 align=top HSPACE=10 WIDTH=\"$home_wid\" HEIGHT=\"$home_hei\" alt=\"Home\"></a>";
			}

			# ©“®??ƒN
			if ($autolink) { &auto_link($rcom); }

			print "<br><font color=\"$rc\">$rcom</font></td></tr></table>\n";
		  }
		}
		print "</TD></TR></TABLE><P>\n";

	}
	print "<table border=0><tr>\n";

	# ‰ü•Å??
	$next_line = $page_end + 1;
	$back_line = $page - $pagelog;

	# ‘O•Å??
	if ($back_line >= 0) {
		print "<td><form method=\"$method\" action=\"$script\">\n";
		print "<input type=hidden name=page value=\"$back_line\">\n";
		print "<input type=submit value=\"¤W$pagelog­Ó\">\n";
		print "</form></td>\n";	
	}

	# ?•Å??
	if ($page_end ne "$end_data") {
		print "<td><form method=\"$method\" action=\"$script\">\n";
		print "<input type=hidden name=page value=\"$next_line\">\n";
		print "<input type=submit value=\"¤U$pagelog­Ó\">\n";
		print "</form></td>\n";
	}

	print "</tr></table><P>\n";
	&footer;
	exit;
}

## --- ?ƒO?‚«?‚İ??
sub regist {
	# ‘¼ƒTƒCƒg‚©‚ç‚ÌƒAƒNƒZƒX‚ğ”r?
	if ($base_url) {
		$ref_url = $ENV{'HTTP_REFERER'};
		$ref_url =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;

		if ($ref_url !~ /$base_url/) {
			&error("¤£¥¿½T¯d¨¥",'NOLOCK');
		}
	}

	# –¼‘O‚ÆƒR??ƒg‚Í•K{
	if ($name eq "") { &error("½Ğ¿é¤J©m¦W",'NOLOCK'); }
	if ($comment eq "") { &error("½Ğ¿é¤J¯d¨¥¤º®e",'NOLOCK'); }
	if ($email && $email !~ /(.*)\@(.*)\.(.*)/) {
		&error("¹q¶l¦a§}¤£¥¿½T",'NOLOCK');
	}

	# ŠÇ?ƒAƒCƒR?‚Ìƒ`ƒFƒbƒN
	if ($my_icon && $icon eq "$my_gif") {
		if ($pwd ne "$pass") { &error("¥u¦³ºŞ²zªÌ¤~¥i¥Î",'NOLOCK'); }
	}

	# ƒzƒXƒg–¼‚ğæ“¾
	&get_host;

	# ?ŠÔ‚ğæ“¾
	&get_time;

	# ƒNƒbƒL[‚ğ”­s
	&set_cookie;

	# ƒtƒ@ƒC??ƒbƒN
	if ($lockkey == 1) { &lock1; }
	elsif ($lockkey == 2) { &lock2; }

	# ?ƒO‚ğŠJ‚­
	open(IN,"$logfile") || &error("Can't open $logfile");
	@lines = <IN>;
	close(IN);

	# ‹L?NO??
	$oya = $lines[0];
	$oya =~ s/\n//;
	shift(@lines);

	# “ñd?e‚Ì‹Ö~
	local($flag) = 0;
	foreach $line (@lines) {
		($knum,$kk,$kd,$kname,$kem,$ksub,$kcom) = split(/<>/,$line);
		if ($name eq "$kname" && $comment eq "$kcom") {
			$flag=1; last;
		}
	}
	if ($flag) { &error("¤£¥i³sÄò§@¬Û¦P¯d¨¥"); }

	# e‹L?‚Ìê?A‹L?No‚ğƒJƒE?ƒgƒAƒbƒv
	if ($FORM{'resno'} eq "") { $oya++; $number=$oya; }
	else { $number = $oya; }

	# í?ƒL[‚ğˆÃ?‰»
	if ($FORM{'pwd'} ne "") { &passwd_encode($FORM{'pwd'}); }

	# ?ƒO‚ğƒtƒH[ƒ}ƒbƒg
	$new_msg = "$number<>$FORM{'resno'}<>$date<>$name<>$email<>$sub<>$comment<>$url<>$host<>$ango<>$color<>$FORM{'icon'}<>\n";

	## ©“®ƒ\[ƒg?‚ÍA?ƒX‹L??e?‚Íe‹L?‚Íƒgƒbƒv‚ÖˆÚ“®
	if ($res_sort && $FORM{'resno'} ne "") {
		@res_data = ();
		@new = ();
		foreach $line (@lines) {
		  $flag = 0;
		  ($num,$k,$d,$na,$em,$sb,$com,$u,$ho,$p,$c,$ico) = split(/<>/,$line);

		  # e‹L?‚ğ”²‚«o‚·
		  if ($k eq "" && $FORM{'resno'} eq "$num") {
			$new_line = "$line";
			$flag = 1;
		  }
		  # ŠÖ˜A‚Ì?ƒX‹L?‚ğ”²‚«o‚·
		  elsif ($k eq "$FORM{'resno'}") {
			push(@res_data,$line);
			$flag = 1;
		  }
		  if ($flag == 0) { push(@new,$line); }
		}

		# ŠÖ˜A?ƒX‹L?‚ğƒgƒbƒv‚Ö
		unshift(@new,@res_data);

		# V‹K?ƒbƒZ[ƒW‚ğƒgƒbƒv‚Ö
		unshift(@new,$new_msg);

		# e‹L?‚ğƒgƒbƒv‚Ö
		unshift(@new,$new_line);


	## e‹L?‚Ìê?AÅ‘å‹L??‚ğ’´‚¦‚é‹L?‚ğƒJƒbƒg
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

		## ‰ß?‹L?¶¬
		if ($kflag) {
			@past_res = reverse(@past_res);
			push(@past_data,@past_res);
			&pastlog;
		}

		unshift(@new,$new_msg);

	## ?ƒX‹L?‚Í‹L??‚Ì’²®‚Í‚µ‚È‚¢
	} else {
		@res_data = ();
		@new = ();

		foreach $line (@lines) {
		  $flag = 0;
		  ($num,$k,$d,$na,$em,$sb,$com,$u,$ho,$p,$c,$ico) = split(/<>/,$line);

		  # e‹L?‚ğ”²‚«o‚·
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

	# e‹L?NO‚ğ•t‰Á
	unshift (@new,"$oya\n");

	# ?ƒO‚ğXV
	open(OUT,">$logfile") || &error("Can't write $logfile");
	print OUT @new;
	close(OUT);

	# ?ƒbƒN‰ğ?
	if (-e $lockfile) { unlink($lockfile); }

	# ?[???
	if ($mailing && $mail_me) { &mail_to; }
	elsif ($mailing && $email ne "$mailto") { &mail_to; }
}

## --- •ÔMƒtƒH[?
sub res_msg {
	# ?ƒO‚ğ“Ç‚İ?‚İ
	open(DB,"$logfile") || &error("Can't open $logfile",'NOLOCK');
	@lines = <DB>;
	close(DB);

	# e‹L?NO‚ğƒJƒbƒg
	@lines = splice(@lines,1);

	# ƒtƒH[?’·‚ğ’è‹`
	&get_agent;

	# ƒNƒbƒL[‚ğæ“¾
	&get_cookie;

	&header;
	print "¥H¤Uªº¯d¨¥NO <B>$FORM{'resno'}</B> ¬OÃö©ó¦^ÂĞ¯d¨¥<hr>\n";
	print "<center><table border=0 width=\"60%\" cellpadding=10 bgcolor=\"$tbl_color\">\n";
	print "<tr><td>\n";

	$flag=0;
	foreach $line (@lines) {
		local($num,$k,$date,$name,$email,$sub,$com) = split(/<>/, $line);

		# e‹L?‚ğo—Í
		if ($k eq "" && $FORM{'resno'} eq "$num") {
			$resub = $sub;
			$flag=1;
			print "<B>[¯d¨¥]</B><P>\n";
			print "<font color=\"$sub_color\"><B>$sub</B></font>\n";
			print "©m¦W <B>$name</B></font>\n";
			print "<small> - $date</small><br>\n";
			print "<blockquote>$com</blockquote><P>\n";

		# ?ƒX‹L?‚ğ @res ‚ÉŠi”[
		} elsif ($k ne "" && $FORM{'resno'} eq "$k") {

			push(@res,$line);
		}
	}

	# ?ƒX‹L?‚ğ•\¦
	if (@res) {
		# ‹L?‚ğ‹t?‚É
		@res = reverse(@res);

		$flag = 0;
		foreach $line (@res) {
			local($num,$k,$date,$name,$email,$sub,$com) = split(/<>/,$line);

			if ($flag == 0) {
				$flag=1;
				print "<hr size=2><B>[¦^ÂĞ¯d¨¥]</B><br>\n";
			}

			print "<blockquote><font color=\"$sub_color\"><B>$sub</B></font>\n";
			print "NameF<B>$name</B></font> - \n";
			print "<small>$date</small><br>\n";
			print "<blockquote>$com</blockquote></blockquote><br>\n";
		}
	}

	# ƒ^ƒCƒg?–¼
	if ($resub !=~ /^Re\:/) { $resub = "Re\: $resub"; }

	print <<"EOM";
</td></tr></table></center><hr>
<form action="$script" method="$method">
<input type=hidden name=mode value="msg">
<input type=hidden name=resno value="$FORM{'resno'}">
<blockquote>
<table>
<tr>
  <td nowrap><b>©m¦W</b></td>
  <td><input type=text name=name value="$c_name" size=$nam_wid></td>
</tr>
<tr>
  <td nowrap><b>¹q¶l</b></td>
  <td><input type=text name=email value="$c_email" size=$nam_wid></td>
</tr>
<tr>
  <td nowrap><b>¼ĞÃD</b></td>
  <td><input type=text name=sub value="$resub" size=$subj_wid>
  <input type=submit value="½T©w"><input type=reset value="­«¾ã"></td>
</tr>
<tr>
  <td colspan=2><b>¯d¨¥</b><br>
  <textarea cols=$com_wid rows=5 name=comment wrap="$wrap"></textarea></td>
</tr>
<tr>
  <td nowrap><b>ºô­¶</b></td>
  <td><input type=text name=url value="http://$c_url" size=$url_wid></td>
</tr>
EOM

	# ŠÇ?ÒƒAƒCƒR?‚ğ”z—ñ‚É•t‰Á
	if ($my_icon) {
		push(@icon1,"$my_gif");
		push(@icon2,"ºŞ²zªÌ¥Î");
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
		print "</select> <small>¿ï¾Ü¹ÏÀÉ\n";
		print "[<a href=\"$script?mode=image\" target=_blank>¹ÏÀÉ¤@Äı</a>]</small></td></tr>\n";
	}

	print "<tr><td nowrap><b>±K½X</b>";
	print "<td><input type=password name=pwd size=8 maxlength=8 value=\"$c_pwd\">\n";
	print "<small>#§R°£¥Î±K½X</small></td></tr>\n";
	print "<tr><td nowrap><b>¤å¦r¦â</b></td><td>\n";

	# ƒNƒbƒL[‚ÌFî•ñ‚ª‚È‚¢ê?
	if ($c_color eq "") { $c_color = $COLORS[0]; }

	foreach (0 .. $#COLORS) {
		if ($c_color eq "$COLORS[$_]") {
			print "<input type=radio name=color value=\"$COLORS[$_]\" checked>";
			print "<font color=\"$COLORS[$_]\">¡¹</font>\n";

		} else {
			print "<input type=radio name=color value=\"$COLORS[$_]\">";
			print "<font color=$COLORS[$_]>¡¹</font>\n";
		}
	}

	print "</td></tr></table></form>\n";
	print "</blockquote><P><hr><P>\n";
	&footer;
	exit;
}

## --- ƒtƒH[?‚©‚ç‚Ìƒf[ƒ^??
sub decode {
	if ($ENV{'REQUEST_METHOD'} eq "POST") {
		if ($ENV{'CONTENT_LENGTH'} > 51200) {
			&error("¯d¨¥¹L¦h",'NOLOCK');
		}
		read(STDIN, $buffer, $ENV{'CONTENT_LENGTH'});
	} else { $buffer = $ENV{'QUERY_STRING'}; }

	@pairs = split(/&/, $buffer);
	foreach $pair (@pairs) {
		($name, $value) = split(/=/, $pair);
		$value =~ tr/+/ /;
		$value =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;

		# •¶?ƒR[ƒh‚ğS-JIS•ÏŠ·
		#&jcode'convert(*value,'sjis');

		# ƒ^ƒO??
		if ($tagkey == 0) {
			$value =~ s/</&lt;/g;
			$value =~ s/>/&gt;/g;
			$value =~ s/\"/&quot;/g;
		} else {
			$value =~ s/<!--(.|\n)*-->//g;
			$value =~ s/<>/&lt;&gt;/g;
		}

		# ‰üs???
		if ($name eq "comment") {
			$value =~ s/\r\n/<br>/g;
			$value =~ s/\r/<br>/g;
			$value =~ s/\n/<br>/g;
		} else {
			$value =~ s/\r//g;
			$value =~ s/\n//g;
		}

		# ˆê?í?—p
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
	if ($sub eq "") { $sub = "µLÃD"; }
	$pwd     = $FORM{'pwd'};
	$pwd     =~ s/\r//g;
	$pwd     =~ s/\n//g;
	$icon    = $FORM{'icon'};
	$color   = $FORM{'color'};
}

## --- Œf¦”Â‚Ìg‚¢•û?ƒbƒZ[ƒW
sub howto {
	if ($tagkey == 0) { $tag_msg = "¯d¨¥¤º®e<b>¤£¥i¥H¨Ï¥Î»yªk</b>\n"; }
	else { $tag_msg = "¯d¨¥¤º®e<b>¥i¥H¨Ï¥Î»yªk</b>\n"; }

	&header;
	print <<"HTML";

<table width="100%">
<tr>
  <th bgcolor="#d8f8ff">¯d¨¥ªOª`·N¨Æ¶µ</th>
</tr>
<tr>
  <td align=center>[<a href="$script\?">¦^¯d¨¥ªO</a>]</td>
</tr>
</table>
<P><center>
<table width="50%" border=1 cellpadding=10>
<tr><td bgcolor="$tbl_color">
<OL>
<LI>³o­Ó¯d¨¥ªO<b>¹ïÀ³cookie</b>.¥u­n´¿¸g¿é¤J¹Lªº¸ê®Æ--¦p:©m¦W,¹q¤l¶l¥ó,ºô§}µ¥µ¥,³£·|¦Û¤v°O¿ı!!¨ì²Ä¤G¦¸¦^¨Ó¯d¨¥®É´N¤£¥Î¦A¿é¤J¤F!!<P>
<LI>$tag_msg<P>
<LI>¯d¨¥®É¥H¤U¶µ¥Ø¤@©w­n¿é¤J<b>©m¦W</b>©M<b>¯d¨¥</b>.¨ä¥L´N¥i¥HÀH«K¿é¤J»P§_!<P>
<LI>¯d¨¥®É<b>§R°£¥Î±K½X</b>ªº±K½X­n¦b8­Ó­^¼Æ¦r¥H¤º,½ĞºÉ¶q¿é¤J<b>§R°£¥Î±K½X</b>¥H«K¤é«á§R°£¦Û¦æ¯d¨¥<P>
<LI>¯d¨¥½s¼Æ<b>³Ì¦h$max½g</b>¶W¹L´N·|¦Û°Ê§R°£!!~<P>
<LI>¦b¥i¨£ªº¯d¨¥¤¤<b>¦^ÂĞ</b>ªº¤èªk,´N¬O«ö¤U¯d¨¥¤W<b>¦^ÂĞ</b>³o­Ó«ö¶s,´N¥i¨ì¦^ÂĞ¯d¨¥¥Îªºµe­±!!<P>
<LI>ÂÂ¯d¨¥¥i¥H¦b<b>[·j´M]¤¤§@Â²©öªº´M§ä!</b>Top Menuªº<a href="$script?mode=find">[·j´M]</a>¿é¤JÃöÁä¦r,´N¥i¥H±oª¾µ²ªG!!~<P>
<LI>ºŞ²zªÌ¦³Åv§â¤¤¶Ë¥L¤Hªº¯d¨¥§R¥h!!<P>
<LI>­Y¦b¨Ï¥Î¤W¦³¨ä¥L°İÃD¡AÅwªï±H«H¸ß°İ!<P>
</OL>
</td></tr></table>
</center>
<hr>
<P>
HTML
	&footer;
	exit;
}

## --- ?[ƒh?õƒTƒu?[ƒ`?
sub find {
	&header;
	print <<"HTML";

<table width="100%">
<tr>
  <th bgcolor="#d8f8ff">·j´M</th>
</tr>
<tr>
  <td align=center>[<a href="$script\?">¦^¯d¨¥ªO</a>]</td>
</tr>
</table>
<P><center>
<table cellpadding=5>
<tr><td bgcolor="$tbl_color" nowrap>
  <UL>
  <LI>·j´M¤èªk<b>ÃöÁä¦r</b>¿é¤J«á,¦A«ö·j´M!!
  <LI>ÃöÁä¦r¤@©w­n¥Î[¥b§Î¦r]!!
  </OL>
</td></tr>
</table>
<P><form action="$script" method="$method">
<input type=hidden name=mode value="find">
<table border=1 cellspacing=1>
<tr>
  <th colspan=2>ÃöÁä¦r <input type=text name=word size=30></th>
</tr>
<tr>
  <td>·j´M±ø¥ó</td>
  <td>
    <input type=radio name=cond value="and" checked>AND
    <input type=radio name=cond value="or">OR
  </td>
</tr>
<tr>
  <th colspan=2>
    <input type=submit value="·j´M"><input type=reset value="­«¾ã">
  </th>
</tr>
</table>
</form></center>
HTML
	# ?[ƒh?õ‚ÌÀs‚Æ?‰Ê•\¦
	if ($FORM{'word'} ne ""){

		# “ü—Í“à—e‚ğ®?
		$cond = $FORM{'cond'};
		$word = $FORM{'word'};
		$word =~ s/@/ /g;
		$word =~ s/\t/ /g;
		@pairs = split(/ /,$word);

		# ƒtƒ@ƒC?‚ğ“Ç‚İ?‚İ
		open(DB,"$logfile") || &error("¤£¯à¥´¶} $logfile",'NOLOCK');
		@lines = <DB>;
		close(DB);

		# ?õ??
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

		# ?õI—¹
		$count = @new;
		print "<hr><b><font color=\"$t_color\">·j´Mµ²ªG : $count­Ó</font></b><P>\n";
		print "<OL>\n";

		foreach $line (@new) {
			($num,$k,$date,$name,$email,$sub,$com,$url) = split(/<>/,$line);

			if ($email) { $name = "<a href=\"mailto:$email\">$name</a>"; }
			if ($url) { $url = "[<a href=\"http://$url\" target='_blank'>­º­¶</a>]"; }

			if ($k) { $num = "$k¦¸"; }

			# ?‰Ê‚ğ•\¦
			print "<LI>[$num] <font color=\"$sub_color\"><b>$sub</b></font>\n";
			print "¯d¨¥ªÌ<b>$name</b> <small> $url ¯d¨¥¤é$date</small>\n";
			print "<P><blockquote>$com</blockquote><hr>\n";
		}

		print "</OL><P>\n";
	}

	&footer;
	exit;
}

## --- ƒu?ƒEƒU‚ğ”»’f‚µƒtƒH[??‚ğ’²®
sub get_agent {
	# ƒu?ƒEƒU–¼‚ğæ“¾
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

## --- ƒNƒbƒL[‚Ì”­s
sub set_cookie {
	# ƒNƒbƒL[‚Í60“úŠÔ—LŒø
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

## --- ƒNƒbƒL[‚ğæ“¾
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

## --- ƒG?[??
sub error {
	if ($_[1] ne '0') { &header; }

	if (-e $lockfile && $_[1] eq "") { unlink($lockfile); }

	print "<center><hr width=\"75%\"><h3>ERROR !</h3>\n";
	print "<P><font color=red><B>$_[0]</B></font>\n";
	print "<P><hr width=\"75%\"></center>\n";
	&footer;
	exit;
}

## --- í?‰æ–Ê
sub msg_del {
	if ($FORM{'action'} eq 'admin' && $FORM{'pass'} ne "$pass") {
		&error("±K½X¤£¥¿½T",'NOLOCK');
	}

	open(DB,$logfile) || &error("Can't open $logfile",'NOLOCK');
	@lines = <DB>;
	close(DB);

	shift(@lines);

	# e‹L?‚Ì‚İ‚Ì”z—ñƒf[ƒ^‚ğì¬
	@NEW = ();
	foreach (@lines) {
		($number,$k,$date,$name,$email,$subj,
			$comment,$url,$host,$pwd) = split(/<>/, $_);

		# ?ƒX‹L?‚ğŠO‚·
		if ($k eq '') { push(@NEW,$_); }
	}

	@lines = reverse(@lines);

	&header;

	print "<table width=\"100%\"><tr><th bgcolor=\"#d8f8ff\">\n";
	print "¯d¨¥§R°£µe­±</th></tr>\n";
	print "<tr><td align=center>[<a href=\"$script\?\">¦^¯d¨¥ªO</a>]</td>\n";
	print "</tr></table><P><center>\n";
	print "<table border=0 cellpadding=5><tr>\n";
	print "<td bgcolor=$tbl_color>\n";

	if ($FORM{'action'} eq '') {
		print "¡¹¯d¨¥®É¿é¤J[§R°£¥Î±K½X],¥H«K¦Û¦æ§R°£¯d¨¥!<br>\n";
	}

	print "¡¹§R°£¯d¨¥®É,¿é¤J¦Û¤v¯d¨¥®Éªº±K½X´N¥i¥H!!<br>\n";
	print "¡¹§R°£¯d¨¥®É,³s¦P¦^ÂĞ¯d¨¥³£·|¤@»ô§R¥h!!<br>\n";
	print "</td></tr></table><P>\n";
	print "<form action=\"$script\" method=$method>\n";

	if ($FORM{'action'} eq '') {
		print "<input type=hidden name=mode value=\"usr_del\">\n";
		print "<b>±K½X</b> <input type=text name=del_key size=10>\n";
	} else {
		print "<input type=hidden name=mode value=\"admin_del\">\n";
		print "<input type=hidden name=action value=\"admin\">\n";
		print "<input type=hidden name=pass value=\"$FORM{'pass'}\">\n";
	}

	print "<input type=submit value=\"§R°£\"><input type=reset value=\"­«¾ã\">\n";
	print "<P><table border=1>\n";
	print "<tr><th>§R°£</th><th>¯d¨¥No</th><th>Title</th><th>Name</th><th>Date</th><th>¤º®e</th>\n";

	if ($FORM{'action'} eq 'admin') { print "<th>I.P¦ì¸m</th>\n"; }

	print "</tr>\n";

	if ($FORM{'page'} eq '') { $page = 0; }
	else { $page = $FORM{'page'}; }

	# ‹L??‚ğæ“¾
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

		## ?ƒX?ƒbƒZ[ƒW‚ğ•\¦
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

				print "<td colspan=2 align=center><b>$num</b>ªº¦^ÂĞ</td>\n";
				print "<td>$rname</td><td><small>$rd</small></td><td>$rcom</td>\n";

				if ($FORM{'action'} eq 'admin') { print "<td>$rho</td>\n"; }

				print "</tr>\n";
			}
		}
	}
	print "</table></form>\n";
	print "<table border=0 width=\"100%\"><tr>\n";

	# ‰ü•Å??
	$next_line = $page_end + 1;
	$back_line = $page - $pagelog;

	# ‘O•Å??
	if ($back_line >= 0) {
	  print "<td><form method=\"$method\" action=\"$script\">\n";
	  print "<input type=hidden name=page value=\"$back_line\">\n";
	  print "<input type=hidden name=mode value=msg_del>\n";
	  print "<input type=submit value=\"¤W$pagelog­Ó\">\n";

	  if ($FORM{'action'} eq 'admin') {
		print "<input type=hidden name=action value=\"admin\">\n";
		print "<input type=hidden name=pass value=\"$FORM{'pass'}\">\n";
	  }

	  print "</form></td>\n";
	}

	# ?•Å??
	if ($page_end ne "$end_data") {
	  print "<td><form method=\"$method\" action=\"$script\">\n";
	  print "<input type=hidden name=page value=\"$next_line\">\n";
	  print "<input type=hidden name=mode value=msg_del>\n";
	  print "<input type=submit value=\"¤U$pagelog­Ó\">\n";

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

## --- ‹L?í???
sub usr_del {
	if ($FORM{'del_key'} eq "") { &error("±K½X¤£¥¿½T",'NOLOCK'); }
	if ($FORM{'del'} eq "") { &error("½Ğ¿ï¾Ü«ö¶s",'NOLOCK'); }

	# ?ƒbƒNŠJn
	if ($lockkey == 1) { &lock1; }
	elsif ($lockkey == 2) { &lock2; }

	# ?ƒO‚ğ“Ç‚İ?‚Ş
	open(DB,"$logfile") || &error("¤£¯à¼g¤J $logfile");
	@lines = <DB>;
	close(DB);

	# e‹L?NO
	$oya = $lines[0];
	if ($oya =~ /<>/) { &error("¸¹½X¤£¥¿½T");	}

	shift(@lines);

	## í?ƒL[‚É‚æ‚é‹L?í? ##
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

	if ($del_num eq '') { &error("$FORM{'del'}§ä¤£¨ì·Q§R°£ªº¯d¨¥"); }
	else {
		if ($encode_pwd eq '') { &error("±K½X³]©w¤£¥¿½T"); }
		$plain_text = $FORM{'del_key'};
		&passwd_decode($encode_pwd);
		if ($check eq 'no') { &error("±K½X¤£¥¿½T"); }
	}

	# e‹L?NO‚ğ•t‰Á
	unshift(@new,$oya);

	## ?ƒO‚ğXV ##
	open(DB,">$logfile") || &error("¤£¯à¼g¤J $logfile");
	print DB @new;
	close(DB);

	# ?ƒbƒN‰ğ?
	if (-e $lockfile) { unlink($lockfile); }

	# í?‰æ–Ê‚É‚à‚Ç‚é
	&msg_del;
}

## --- ŠÇ?Òˆê?‹L?í?
sub admin_del {
	if ($FORM{'pass'} ne "$pass") { &error("±K½X¤£¥¿½T",'NOLOCK'); }
	if ($FORM{'del'} eq "") { &error("½Ğ¿ï¾Ü«ö¶s",'NOLOCK'); }

	# ?ƒbƒNŠJn
	if ($lockkey == 1) { &lock1; }
	elsif ($lockkey == 2) { &lock2; }

	# ?ƒO‚ğ“Ç‚İ?‚Ş
	open(DB,"$logfile") || &error("¤£¯à¥´¶} $logfile");
	@lines = <DB>;
	close(DB);

	# e‹L?NO
	$oya = $lines[0];
	if ($oya =~ /<>/) {
		&error("½T©w¨S¦³¸¹½X<P>
			<small>\(­n§ï¥Îv2.5¤§«eªºª©¥»)<\/small>");
	}

	shift(@lines);

	## í???
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

	# e‹L?NO‚ğ•t‰Á
	unshift(@new,$oya);

	## ?ƒO‚ğXV ##
	open(DB,">$logfile") || &error("¤£¯à¼g¤J $logfile");
	print DB @new;
	close(DB);

	# ?ƒbƒN‰ğ?
	if (-e $lockfile) { unlink($lockfile); }

	# í?‰æ–Ê‚É‚à‚Ç‚é
	&msg_del;
}

## --- ŠÇ?Ò“üº‰æ–Ê
sub admin {
	&header;
	print "<center><h4>¿é¤JºŞ²z¥Î±K½X</h4>\n";
	print "<form action=\"$script\" method=$method>\n";
	print "<input type=hidden name=mode value=\"msg_del\">\n";
	print "<input type=hidden name=action value=\"admin\">\n";
	print "<input type=password name=pass size=8><input type=submit value=\" ½T©w \">\n";
	print "</form></center><P><hr><P>\n";
	&footer;
	exit;
}

## --- ?ŠÔ‚ğæ“¾
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

	# “ú?‚ÌƒtƒH[ƒ}ƒbƒg
	$date = "$year\/$mon\/$mday\($week\) $hour\:$min\:$sec";
}

## --- ƒJƒE?ƒ^??
sub counter {
	# ‰{??‚Ì‚İƒJƒE?ƒgƒAƒbƒv
	$match=0;
	if ($FORM{'mode'} eq '') {
		# ƒJƒE?ƒ^?ƒbƒN
		if ($lockkey) { &lock3; }

		$match=1;
	}

	# ƒJƒE?ƒgƒtƒ@ƒC?‚ğ“Ç‚İ‚±‚İ
	open(NO,"$cntfile") || &error("Can't open $cntfile",'0');
	$cnt = <NO>;
	close(NO);

	# ƒJƒE?ƒgƒAƒbƒv
	if ($match) {

		$cnt++;

		# XV
		open(OUT,">$cntfile") || &error("Write Error : $cntfile");
		print OUT $cnt;
		close(OUT);
	}

	# ƒJƒE?ƒ^?ƒbƒN‰ğ?
	if (-e $cntlock) { unlink($cntlock); }

	# ??’²®
	while(length($cnt) < $mini_fig) { $cnt = '0' . "$cnt"; }
	@cnts = split(//,$cnt);

	print "<table><tr><td>\n";

	# GIFƒJƒE?ƒ^•\¦
	if ($counter == 2) {
		foreach (0 .. $#cnts) {
			print "<img src=\"$gif_path/$cnts[$_]\.gif\" alt=\"$cnts[$_]\" width=\"$mini_w\" height=\"$mini_h\">";
		}

	# ƒeƒLƒXƒgƒJƒE?ƒ^•\¦
	} else {
		print "<font color=\"$cnt_color\" face=\"verdana,Times New Roman,Arial\">$cnt</font>";
	}

	print "</td></tr></table>\n";
}

## --- ?ƒbƒNƒtƒ@ƒC?FsymlinkŠÖ?
sub lock1 {
	local($retry) = 5;
	while (!symlink(".", $lockfile)) {
		if (--$retry <= 0) { &error("½Ğµy«á¦A¸Õ"); }
		sleep(1);
	}
}

## --- ?ƒbƒNƒtƒ@ƒC?FopenŠÖ?
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
	if (!$retry) { &error("½Ğµy«á¦A¸Õ"); }
}

## --- ƒJƒE?ƒ^?ƒbƒN
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

## --- ?[??M
sub mail_to {
	$mail_sub = "$title ¯d¨¥";

    #	&jcode'convert(*mail_sub,'jis');
    #	&jcode'convert(*name,'jis');
    	#&jcode'convert(*sub,'jis');
    #	&jcode'convert(*comment,'jis');

	$comment =~ s/<br>/\n/g;
	$comment =~ s/&lt;/</g;
	$comment =~ s/&gt;/>/g;

	if (open(MAIL,"| $sendmail $mailto")) {
	print MAIL "To: $mailto\n";

	# ?[?ƒAƒh?ƒX‚ª‚È‚¢ê?‚Íƒ_ƒ~[?[?‚É’u‚«Š·‚¦
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

## --- ƒpƒX?[ƒhˆÃ???
sub passwd_encode {
	$now = time;
	($p1, $p2) = unpack("C2", $now);
	$wk = $now / (60*60*24*7) + $p1 + $p2 - 8;
	@saltset = ('a'..'z','A'..'Z','0'..'9','.','/');
	$nsalt = $saltset[$wk % 64] . $saltset[$now % 64];
	$ango = crypt($_[0], $nsalt);
}

## --- ƒpƒX?[ƒhÆ???
sub passwd_decode {
	if ($_[0] =~ /^\$1\$/) { $key = 3; }
	else { $key = 0; }

	$check = "no";
	if (crypt($plain_text, substr($_[0],$key,2)) eq "$_[0]") {
		$check = "yes";

	}
}

## --- HTML‚Ìƒwƒbƒ_[
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
	# bodyƒ^ƒO
	if ($backgif) { $bgkey = "background=\"$backgif\" bgproperties=\"fixed\" bgcolor=$bgcolor"; }
	else { $bgkey = "bgcolor=$bgcolor"; }
	print "<body $bgkey text=$text>\n";
}

## --- HTML‚Ìƒtƒbƒ^[
sub footer {
	## MakiMaki‚³‚ñ‚Ì‰æ?g—p‚Ì—L–³‚ÉŠÖ‚í‚ç‚¸‚±‚Ì‚R‰Ó?‚Ì??ƒN?‚ğ
	## í?‚·‚é‚±‚Æ‚Í‚Å‚«‚Ü‚¹‚ñB
	print "<br><br><center>$banner2<P><small><!-- $ver -->\n";
	print "<a href=\"http://www.kent-web.com/\" target='_blank'>KENT</a> &amp; \n";
	print "<a href=\"http://village.infoweb.ne.jp/~fwhf2602/\" target='_blank'>MakiMaki</a><br>\n";
	print "Edit By <a href=\"http://saya.g--z.com/\" target='_blank'>*- CGI Cafe. -*</a><br>\n";
	
	print "</small></center>\n";
	print "</body></html>\n";
}

## --- ©“®??ƒN
sub auto_link {
	$_[0] =~ s/([^=^\"]|^)(http\:[\w\.\~\-\/\?\&\+\=\:\@\%\;\#]+)/$1<a href=\"$2\" target='_blank'>$2<\/a>/g;
}

## --- ƒC?[ƒW‰æ?•\¦
sub image {
	&header;
	print "<center><hr width=\"75%\">\n";
	print "<h3>¹ÏÀÉ¤@Äı</h3>\n";
	print "<P>¦U¦ì¥i¥H¿ï¾Ü¦Û¤v³ßÅwªº¹ÏÀÉ\n";
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
	print "<FORM><INPUT TYPE=\"button\" VALUE=\"  Ãö³¬µøµ¡  \" onClick=\"top.close();\"></FORM></center>\n";
	print "</body></html>\n";
	exit;
}

## --- ƒzƒXƒg–¼æ“¾
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

## --- ‰ß??ƒO¶¬
sub pastlog {
	$new_flag = 0;

	# ‰ß?NO‚ğŠJ‚­
	open(NO,"$nofile") || &error("Can't open $nofile");
	$count = <NO>;
	close(NO);

	# ‰ß??ƒO‚Ìƒtƒ@ƒC?–¼‚ğ’è‹`
	$pastfile  = "$past_dir\/$count\.html";

	# ‰ß??ƒO‚ª‚È‚¢ê?AV‹K‚É©“®¶¬‚·‚é
	unless(-e $pastfile) { &new_log; }

	# ‰ß??ƒO‚ğŠJ‚­
	if ($new_flag == 0) {
		open (IN,"$pastfile") || &error("Can't open $pastfile");
		@past = <IN>;
		close(IN);
	}

	# ‹K’è‚Ìs?‚ğƒI[ƒo[‚·‚é‚ÆA?ƒtƒ@ƒC?‚ğ©“®¶¬‚·‚é
	if ($#past > $log_line) { &next_log; }

	foreach $pst_line (@past_data) {
		($pnum,$pk,$pdt,$pname,$pemail,
			$psub,$pcom,$purl,$phost,$ppw) = split(/<>/, $pst_line);

		if ($pemail) { $pname = "<a href=\"mailto:$pemail\">$pname</a>"; }
		if ($purl) { $purl="<a href=\"http://$purl\" target='_top'>http://$purl</a>"; }
		if ($pk) { $pnum = "$pk¦¸"; }

		# ©“®??ƒN
		if ($autolink) { &auto_link($pcom); }

		# •Û‘¶‹L?‚ğƒtƒH[ƒ}ƒbƒg
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

	# ‰ß??ƒO‚ğXV
	open(OUT,">$pastfile") || &error("Can't write $pastfile");
	print OUT @news;
	close(OUT);

}

## --- ‰ß??ƒO?ƒtƒ@ƒC?¶¬?[ƒ`?
sub next_log {
	# ?ƒtƒ@ƒC?‚Ì‚½‚ß‚ÌƒJƒE?ƒgƒAƒbƒv
	$count++;

	# ƒJƒE?ƒgƒtƒ@ƒC?XV
	open(NO,">$nofile") || &error("Can't write $nofile");
	print NO "$count";
	close(NO);

	$pastfile  = "$past_dir\/$count\.html";

	&new_log;
}

## --- V‹K‰ß??ƒOƒtƒ@ƒC?¶¬?[ƒ`?
sub new_log {
	$new_flag = 1;

	if ($backgif) { $bgkey = "background=\"$backgif\" bgcolor=$bgcolor"; }
	else { $bgkey = "bgcolor=$bgcolor"; }

	$past[0] = "<html><head><title>ÂÂ½s¶°</title></head>\n";
	$past[1] = "<body $bgkey text=$text><hr size=1>\n";
	$past[2] = "<\!--HAJIME-->\n";
	$past[3] = "<\!--OWARI-->\n";
	$past[4] = "</body></html>\n";

	# V‹K‰ß??ƒOƒtƒ@ƒC?‚ğ¶¬XV
	open(OUT,">$pastfile") || &error("Can't write $pastfile");
	print OUT @past;
	close(OUT);

	# ƒp[ƒ~ƒbƒV??‚ğ666‚ÖB
	chmod(0666,"$pastfile");
}
