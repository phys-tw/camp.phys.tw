#!/usr/bin/perl

## CUTE BBS 補助プログラム
## 過去ログ表示・検索システム
##   cutebbs.cgi (00.07.16)

######################################
## yybbs2.cgi (99/03/07)			##
##   by KENT						##
##----------------------------------##
#	､､､螟ﾆ by Blue EV's Studio
#	ｺ�ｧ}		http://cgiunion.hypermart.net/
#	Edmond
#	ｺ�ｧ}		http://edmonddomain.hypermart.net/
#	ｹqｶl		cyvc@netvigator.com
#	Vivien
#	ｺ�ｧ}		http://viviennechan.hypermart.net/
#	ｹqｶl		vivien90@netvigator.com
#-----------------------------------------------------------------------------------
#ｨﾏ･ﾎｦuｫh															
#	1.	Blue EV's StudioｪｺCGIｬOｧKｶOｳn･�｡Aｧﾆｱ谺O･ﾎｧ@ｭﾓ､Hｺ�ｭｶ､ｧ･ﾎ｡AｸT､�･�ｦ�ｰﾓｷ~ｲﾕﾂｴｨﾏ･ﾎ
#
#	2.	･ｼｸgｦPｷN｡AﾄYｸTｨpｦﾛﾂ犧�ｩﾎｽﾆｻsｩﾎｴ｣ｨﾑｦｹｻ｡ｩ�ﾀﾉ､ﾎ･ｻ､､､螟ﾆｵ{ｦ｡
#
#	3.	､｣ｱoｧRｰ｣･�ｦ�ｪｩﾅvｫﾅｧi｡Aｧ_ｫhBlue EV's Studioｷ|ｰｱ､�ｩﾒｦｳCGIｪｺｶ}ｩ�､Uｸ�
#
#	4.	･ｻCGIｹ�ｻﾕ､Uｰｵｦｨ､ｧ･�ｦ�ｷl･｢,ｱN､｣ｷ|ｭt､W･�ｦ�ｳd･�
#
#	5.	ｧﾆｱ讓ﾏ･ﾎ･ｻCGIｮﾉ,ｵoｲ{ｦｳｿ�ｻ~､ｧｳB,ｽﾐｧiｪｾｧ@ｪﾌ
######################################

## 基本設定
$script = './cutebbs2.cgi';		# ｵ{ｦ｡ｦ�ｸm
$nofile = './pastno.dat';		# ､HｼﾆｰOｿ�ﾀﾉｦWｺﾙ
$bbsfile  = './cutebbs.cgi';		# ･Dｵ{ｦ｡ｦ�ｸm
$body = '<body bgcolor="#FFFFFF">';	# bodyｪｺｻyｪk
$method = 'POST';			# methodｼﾒｦ｡ (POST or GET)
$logfile = './cutebbs.log';		# ｰOｿ�ﾀﾉｦWｺﾙ
$past_dir = ".";			# ﾂﾂｰOｿ�ｦ�ｸm
$past_url = ".";			# ﾂﾂｰOｿ�URLｦ�ｸm

#--スタイルシート設定----------------------
$a_link = "#1a99ff";		# LINKｦ箜m
$hb_link = "#dfcfff";		# ｫ�･ﾜｮﾉｭIｴｺｦ�
$h_link = "#0066ff";		# ｫ�･ﾜｮﾉ､螯rｦ�
$border_c = "#80e6ff";		# ｰOｨﾆ･~ｮﾘｦ�
$tback_color = "#ffffff";	# ｰOｨﾆｳ｡･�ｭIｴｺｦ�
$tfont_color = "#0066ff";	# ｰOｨﾆｳ｡･�､螯rｦ�

## ｳ]ｩwｧｹｦｨ

# 過去ログカウントファイルを読み込み
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

## --------- 処理完了 ---------------------------------- ##

## 検索処理ルーチン
sub do_find {
	@lines = ();
	foreach (1 .. $count) {
		open(DB,"$past_dir\/$_\.html");
		@new_data = <DB>;
		close(DB);

		push(@lines,@new_data);
	}

	$word =~ s/　/ /g;
	$word =~ s/\t/ /g;
	@pairs = split(/ /,$word);

	# 過去ログファイルを読み込み
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
		# ヒットした行を新規配列(@new)に格納
		if ($flag) { push(@new,$line) ; }
	}

	# 検索結果の配列数を数える
	$count = @new;

	# 該当なしの場合
	if ($count == 0) { &nainai; }

	# 結果を出力
	&header;
	print <<"HTML";
<center><table border=1>
<tr><td bgcolor=#FFFFFF>
[<a href="$script?mode=find_html">ｦ^ｷjｴMｵeｭｱ</a>]</td>
<td nowrap>ﾃ�ﾁ荐r<font color=#FF0080><b>$word</b></font> は
ｦｳ<b>$count</b>ｭﾓ</td></tr></table>
</center><hr>
HTML

	foreach $new_line (@new) {
		($title,$msg) = split(/<\!--T-->/,$new_line);
		print "$title $msg\n";
	}

	print "</body></html>\n";
	exit;
}

## フレーム部
sub frame {
	# 過去ログ用カウントファイルをチェック
	unless (-e $nofile) { &error("Don't exist $nofile"); }

	print "Content-type: text/html\n\n";
	print <<"HTML";
<html>
<head><title>ﾂﾂｰOｿ�</title></head>

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
<h3>ｻﾕ､Uｪｺﾂsﾄ�ｾｹ､｣ｹ�ﾀｳｭｶｮﾘ</h3>
</body></noframes></frameset>
</html>
HTML
	exit;
}

## 上フレーム（メニュー部）
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
  <th bgcolor=#d8f8ff><font color=#808080>ﾂﾂ ｰO ｿ�</font></th>
</tr>
<tr>
  <td align=center>[<a href="$bbsfile" target="_top">ｭｺｭｶ</a>]　[<a href="$script?mode=find_html" target="sita">ｷjｴM<a>]　[<a href="$past_url\/$count\.html" target="sita">ｳﾌｷsｰOｿ�</td>
</tr>
</table>

HTML
	# 過去ログの[リンク]を新規順に表示
	for ($i=$count-1; $i>0; $i--) {
		print "[<a href=\"$past_url\/$i\.html\" target=\"sita\">$i</a>]\n";
	}

	print "</center><hr size=2>\n";
	print "</body></html>\n";
	exit;
}

## フォーム取得
sub get_form {
	if ($ENV{'REQUEST_METHOD'} eq "POST") {
		read(STDIN, $buffer, $ENV{'CONTENT_LENGTH'});
	} else { $buffer = $ENV{'QUERY_STRING'}; }
}

## フォームからのデータ処理
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

## 検索該当なし
sub nainai {
	&header;
	print "<center>ｬﾝｨ｣<hr>\n";
	print "<b>$word</b></center>\n";
	print "</body></html>\n";
	exit;
}

## 検索初期画面
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
<center><B>ﾂﾂｰOｿ�ｷjｴM</B></center>
<OL>
<LI>ｷjｴMｯdｨ･､､ｪｺ<b>ﾃ�ﾁ荐r</b>
<LI>･u･i･HｷjｴM<b>･bｧﾎ</b>ｪｺﾃ�ﾁ荐r
<LI>ｿ鬢J<b>ｷjｴMｱ�･�</b>ｫ�ｷjｴMｴN･i
</OL>
</td></tr></table>
<form action="$script" method="$method">
<input type=hidden name=mode value="do_find">
<table border=1>
<tr><td>ﾃ�ﾁ荐r</td><td><input type=text name=word size=30></td></tr>
<tr><td>ｷjｴMｱ�･�</td><td><input type=radio name=cond value="and" checked>AND
<input type=radio name=cond value="or">OR</td></tr>
<tr><th colspan=2><input type=submit value="ｷjｴM"></th></tr>
</table>
</form></center>
<hr>
</body></html>
HTML
	exit;
}

## HTMLヘッダー部
sub header {
	print "Content-type: text/html\n\n";
	print "<html>\n<head>\n";
	print "<META HTTP-EQUIV=\"Content-type\" CONTENT=\"text/html; charset=big5\">\n";
	print "<title>ｽsｶｰﾀﾉｮﾗ</title></head>\n";
	print "$body\n";
}

## エラー処理
sub error {
	&header;
	print "<center><hr width=75%><h3>ｿ�ｻ~ｵo･ﾍ</h3>\n";
	print "<P><font color=#dd0000><B>$_[0]</B></font>\n";
	print "<P><hr width=75%></center>\n";
	print "</body></html>\n";
	exit;
}

