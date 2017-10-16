#!/usr/bin/perl

## CUTE BBS •â•ƒvƒƒOƒ‰ƒ€
## ‰ß‹ƒƒO•\¦EŒŸõƒVƒXƒeƒ€
##   cutebbs.cgi (00.07.16)

######################################
## yybbs2.cgi (99/03/07)			##
##   by KENT						##
##----------------------------------##
#	¤¤¤å¤Æ by Blue EV's Studio
#	ºô§}		http://cgiunion.hypermart.net/
#	Edmond
#	ºô§}		http://edmonddomain.hypermart.net/
#	¹q¶l		cyvc@netvigator.com
#	Vivien
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

## Šî–{İ’è
$script = './cutebbs2.cgi';		# µ{¦¡¦ì¸m
$nofile = './pastno.dat';		# ¤H¼Æ°O¿ıÀÉ¦WºÙ
$bbsfile  = './cutebbs.cgi';		# ¥Dµ{¦¡¦ì¸m
$body = '<body bgcolor="#FFFFFF">';	# bodyªº»yªk
$method = 'POST';			# method¼Ò¦¡ (POST or GET)
$logfile = './cutebbs.log';		# °O¿ıÀÉ¦WºÙ
$past_dir = ".";			# ÂÂ°O¿ı¦ì¸m
$past_url = ".";			# ÂÂ°O¿ıURL¦ì¸m

#--ƒXƒ^ƒCƒ‹ƒV[ƒgİ’è----------------------
$a_link = "#1a99ff";		# LINK¦â±m
$hb_link = "#dfcfff";		# «ü¥Ü®É­I´º¦â
$h_link = "#0066ff";		# «ü¥Ü®É¤å¦r¦â
$border_c = "#80e6ff";		# °O¨Æ¥~®Ø¦â
$tback_color = "#ffffff";	# °O¨Æ³¡¥÷­I´º¦â
$tfont_color = "#0066ff";	# °O¨Æ³¡¥÷¤å¦r¦â

## ³]©w§¹¦¨

# ‰ß‹ƒƒOƒJƒEƒ“ƒgƒtƒ@ƒCƒ‹‚ğ“Ç‚İ‚İ
open(NUM,"$nofile") || &error("Can't open $nofile");
$count = <NUM>;
close(NUM);


## ------- --------------------------------- ##

&get_form;
if (!$buffer) { &frame; }
&form_decode;

if ($mode eq 'ue_html') { &ue_html; }
if ($mode eq 'find_html') { &find_html; }
if ($mode eq 'do_find') { &do_find; }
exit;

## --------- ˆ—Š®—¹ ---------------------------------- ##

## ŒŸõˆ—ƒ‹[ƒ`ƒ“
sub do_find {
	@lines = ();
	foreach (1 .. $count) {
		open(DB,"$past_dir\/$_\.html");
		@new_data = <DB>;
		close(DB);

		push(@lines,@new_data);
	}

	$word =~ s/@/ /g;
	$word =~ s/\t/ /g;
	@pairs = split(/ /,$word);

	# ‰ß‹ƒƒOƒtƒ@ƒCƒ‹‚ğ“Ç‚İ‚İ
	foreach $line (@lines) {
		$flag = 0;
		foreach $pair (@pairs){
			if (index($line,$pair) >= 0){
				$flag = 1;
				if ($cond eq 'or') { last ; }
			} else {
				if ($cond eq 'and'){ $flag = 0; last; }
			}
		}
		# ƒqƒbƒg‚µ‚½s‚ğV‹K”z—ñ(@new)‚ÉŠi”[
		if ($flag) { push(@new,$line) ; }
	}

	# ŒŸõŒ‹‰Ê‚Ì”z—ñ”‚ğ”‚¦‚é
	$count = @new;

	# ŠY“–‚È‚µ‚Ìê‡
	if ($count == 0) { &nainai; }

	# Œ‹‰Ê‚ğo—Í
	&header;
	print <<"HTML";
<center><table border=1>
<tr><td bgcolor=#FFFFFF>
[<a href="$script?mode=find_html">¦^·j´Mµe­±</a>]</td>
<td nowrap>ÃöÁä¦r<font color=#FF0080><b>$word</b></font> ‚Í
¦³<b>$count</b>­Ó</td></tr></table>
</center><hr>
HTML

	foreach $new_line (@new) {
		($title,$msg) = split(/<\!--T-->/,$new_line);
		print "$title $msg\n";
	}

	print "</body></html>\n";
	exit;
}

## ƒtƒŒ[ƒ€•”
sub frame {
	# ‰ß‹ƒƒO—pƒJƒEƒ“ƒgƒtƒ@ƒCƒ‹‚ğƒ`ƒFƒbƒN
	unless (-e $nofile) { &error("Don't exist $nofile"); }

	print "Content-type: text/html\n\n";
	print <<"HTML";
<html>
<head><title>ÂÂ°O¿ı</title></head>

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

<frameset rows="110\,*" FRAMEBORDER=no BORDER=0>
<frame name="ue" src="$script?mode=ue_html" target="sita">
<frame name="sita" src="$past_url\/$count\.html">
<noframes>
$body
<h3>»Õ¤UªºÂsÄı¾¹¤£¹ïÀ³­¶®Ø</h3>
</body></noframes></frameset>
</html>
HTML
	exit;
}

## ãƒtƒŒ[ƒ€iƒƒjƒ…[•”j
sub ue_html {
	&header;
	print <<"HTML";

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

<table width=100%>
<tr>
  <th bgcolor=#d8f8ff><font color=#808080>ÂÂ °O ¿ı</font></th>
</tr>
<tr>
  <td align=center>[<a href="$bbsfile" target="_top">­º­¶</a>]@[<a href="$script?mode=find_html" target="sita">·j´M<a>]@[<a href="$past_url\/$count\.html" target="sita">³Ì·s°O¿ı</td>
</tr>
</table>

HTML
	# ‰ß‹ƒƒO‚Ì[ƒŠƒ“ƒN]‚ğV‹K‡‚É•\¦
	for ($i=$count-1; $i>0; $i--) {
		print "[<a href=\"$past_url\/$i\.html\" target=\"sita\">$i</a>]\n";
	}

	print "</center><hr size=2>\n";
	print "</body></html>\n";
	exit;
}

## ƒtƒH[ƒ€æ“¾
sub get_form {
	if ($ENV{'REQUEST_METHOD'} eq "POST") {
		read(STDIN, $buffer, $ENV{'CONTENT_LENGTH'});
	} else { $buffer = $ENV{'QUERY_STRING'}; }
}

## ƒtƒH[ƒ€‚©‚ç‚Ìƒf[ƒ^ˆ—
sub form_decode {
	@pairs = split(/&/,$buffer);
	foreach $pair (@pairs) {
		($name, $value) = split(/=/, $pair);
		$value =~ tr/+/ /;
		$value =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;

		$FORM{$name} = $value;
	}
	$word = $FORM{'word'};
	$cond = $FORM{'cond'};
	$mode = $FORM{'mode'};
	$opt  = $FORM{'opt'};
	$chk  = $FORM{'chk'};
}

## ŒŸõŠY“–‚È‚µ
sub nainai {
	&header;
	print "<center>¬İ¨£<hr>\n";
	print "<b>$word</b></center>\n";
	print "</body></html>\n";
	exit;
}

## ŒŸõ‰Šú‰æ–Ê
sub find_html {
	&header;
	print <<"HTML";

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
<center>
<table border=0 cellpadding=10>
<tr><td bgcolor=#d8f8ff nowrap>
<center><B>ÂÂ°O¿ı·j´M</B></center>
<OL>
<LI>·j´M¯d¨¥¤¤ªº<b>ÃöÁä¦r</b>
<LI>¥u¥i¥H·j´M<b>¥b§Î</b>ªºÃöÁä¦r
<LI>¿é¤J<b>·j´M±ø¥ó</b>«ö·j´M´N¥i
</OL>
</td></tr></table>
<form action="$script" method="$method">
<input type=hidden name=mode value="do_find">
<table border=1>
<tr><td>ÃöÁä¦r</td><td><input type=text name=word size=30></td></tr>
<tr><td>·j´M±ø¥ó</td><td><input type=radio name=cond value="and" checked>AND
<input type=radio name=cond value="or">OR</td></tr>
<tr><th colspan=2><input type=submit value="·j´M"></th></tr>
</table>
</form></center>
<hr>
</body></html>
HTML
	exit;
}

## HTMLƒwƒbƒ_[•”
sub header {
	print "Content-type: text/html\n\n";
	print "<html>\n<head>\n";
	print "<META HTTP-EQUIV=\"Content-type\" CONTENT=\"text/html; charset=big5\">\n";
	print "<title>½s¶°ÀÉ®×</title></head>\n";
	print "$body\n";
}

## ƒGƒ‰[ˆ—
sub error {
	&header;
	print "<center><hr width=75%><h3>¿ù»~µo¥Í</h3>\n";
	print "<P><font color=#dd0000><B>$_[0]</B></font>\n";
	print "<P><hr width=75%></center>\n";
	print "</body></html>\n";
	exit;
}

