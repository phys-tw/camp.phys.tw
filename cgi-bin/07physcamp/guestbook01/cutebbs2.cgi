#!/usr/bin/perl

## CUTE BBS �⏕�v���O����
## �ߋ����O�\���E�����V�X�e��
##   cutebbs.cgi (00.07.16)

######################################
## yybbs2.cgi (99/03/07)			##
##   by KENT						##
##----------------------------------##
#	����� by Blue EV's Studio
#	���}		http://cgiunion.hypermart.net/
#	Edmond
#	���}		http://edmonddomain.hypermart.net/
#	�q�l		cyvc@netvigator.com
#	Vivien
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

## ��{�ݒ�
$script = './cutebbs2.cgi';		# �{����m
$nofile = './pastno.dat';		# �H�ưO���ɦW��
$bbsfile  = './cutebbs.cgi';		# �D�{����m
$body = '<body bgcolor="#FFFFFF">';	# body���y�k
$method = 'POST';			# method�Ҧ� (POST or GET)
$logfile = './cutebbs.log';		# �O���ɦW��
$past_dir = ".";			# �°O����m
$past_url = ".";			# �°O��URL��m

#--�X�^�C���V�[�g�ݒ�----------------------
$a_link = "#1a99ff";		# LINK��m
$hb_link = "#dfcfff";		# ���ܮɭI����
$h_link = "#0066ff";		# ���ܮɤ�r��
$border_c = "#80e6ff";		# �O�ƥ~�ئ�
$tback_color = "#ffffff";	# �O�Ƴ����I����
$tfont_color = "#0066ff";	# �O�Ƴ�����r��

## �]�w����

# �ߋ����O�J�E���g�t�@�C����ǂݍ���
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

## --------- �������� ---------------------------------- ##

## �����������[�`��
sub do_find {
	@lines = ();
	foreach (1 .. $count) {
		open(DB,"$past_dir\/$_\.html");
		@new_data = <DB>;
		close(DB);

		push(@lines,@new_data);
	}

	$word =~ s/�@/ /g;
	$word =~ s/\t/ /g;
	@pairs = split(/ /,$word);

	# �ߋ����O�t�@�C����ǂݍ���
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
		# �q�b�g�����s��V�K�z��(@new)�Ɋi�[
		if ($flag) { push(@new,$line) ; }
	}

	# �������ʂ̔z�񐔂𐔂���
	$count = @new;

	# �Y���Ȃ��̏ꍇ
	if ($count == 0) { &nainai; }

	# ���ʂ��o��
	&header;
	print <<"HTML";
<center><table border=1>
<tr><td bgcolor=#FFFFFF>
[<a href="$script?mode=find_html">�^�j�M�e��</a>]</td>
<td nowrap>����r<font color=#FF0080><b>$word</b></font> ��
��<b>$count</b>��</td></tr></table>
</center><hr>
HTML

	foreach $new_line (@new) {
		($title,$msg) = split(/<\!--T-->/,$new_line);
		print "$title $msg\n";
	}

	print "</body></html>\n";
	exit;
}

## �t���[����
sub frame {
	# �ߋ����O�p�J�E���g�t�@�C�����`�F�b�N
	unless (-e $nofile) { &error("Don't exist $nofile"); }

	print "Content-type: text/html\n\n";
	print <<"HTML";
<html>
<head><title>�°O��</title></head>

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
<h3>�դU���s��������������</h3>
</body></noframes></frameset>
</html>
HTML
	exit;
}

## ��t���[���i���j���[���j
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
  <th bgcolor=#d8f8ff><font color=#808080>�� �O ��</font></th>
</tr>
<tr>
  <td align=center>[<a href="$bbsfile" target="_top">����</a>]�@[<a href="$script?mode=find_html" target="sita">�j�M<a>]�@[<a href="$past_url\/$count\.html" target="sita">�̷s�O��</td>
</tr>
</table>

HTML
	# �ߋ����O��[�����N]��V�K���ɕ\��
	for ($i=$count-1; $i>0; $i--) {
		print "[<a href=\"$past_url\/$i\.html\" target=\"sita\">$i</a>]\n";
	}

	print "</center><hr size=2>\n";
	print "</body></html>\n";
	exit;
}

## �t�H�[���擾
sub get_form {
	if ($ENV{'REQUEST_METHOD'} eq "POST") {
		read(STDIN, $buffer, $ENV{'CONTENT_LENGTH'});
	} else { $buffer = $ENV{'QUERY_STRING'}; }
}

## �t�H�[������̃f�[�^����
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

## �����Y���Ȃ�
sub nainai {
	&header;
	print "<center>�ݨ�<hr>\n";
	print "<b>$word</b></center>\n";
	print "</body></html>\n";
	exit;
}

## �����������
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
<center><B>�°O���j�M</B></center>
<OL>
<LI>�j�M�d������<b>����r</b>
<LI>�u�i�H�j�M<b>�b��</b>������r
<LI>��J<b>�j�M����</b>���j�M�N�i
</OL>
</td></tr></table>
<form action="$script" method="$method">
<input type=hidden name=mode value="do_find">
<table border=1>
<tr><td>����r</td><td><input type=text name=word size=30></td></tr>
<tr><td>�j�M����</td><td><input type=radio name=cond value="and" checked>AND
<input type=radio name=cond value="or">OR</td></tr>
<tr><th colspan=2><input type=submit value="�j�M"></th></tr>
</table>
</form></center>
<hr>
</body></html>
HTML
	exit;
}

## HTML�w�b�_�[��
sub header {
	print "Content-type: text/html\n\n";
	print "<html>\n<head>\n";
	print "<META HTTP-EQUIV=\"Content-type\" CONTENT=\"text/html; charset=big5\">\n";
	print "<title>�s���ɮ�</title></head>\n";
	print "$body\n";
}

## �G���[����
sub error {
	&header;
	print "<center><hr width=75%><h3>���~�o��</h3>\n";
	print "<P><font color=#dd0000><B>$_[0]</B></font>\n";
	print "<P><hr width=75%></center>\n";
	print "</body></html>\n";
	exit;
}

