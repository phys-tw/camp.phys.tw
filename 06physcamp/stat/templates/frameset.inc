<?php
if (isset($conf['charset'])) {
    header('Content-type: text/html; charset=' . $conf['charset']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<!--                     TCBB Stat System                          -->
<!-- Copyright &copy; ITS - BBSFans.com, 2002. All rights reserved -->

<html>
<head>
<?php

$page_title = $conf['webtitle'];
if (!empty($title)) $page_title .= ' :: ' . $title;

?>
<title><?= $page_title ?></title>
</head>

<frameset cols="130,8,*" framespacing="0" border="0" frameborder="0">
    <frame name="menu" src="menu.php"  scrolling="no"   framespacing="0" border="0" frameborder="0" noresize>
    <frame name="bar"  src="bar.html" scrolling="no"   framespacing="0" border="0" frameborder="0" noresize>
    <frame name="main" src="main.php?actionID=TotalData"  scrolling="auto" framespacing="0" border="0" frameborder="0">
</frameset>

<noframes>
    <body>
        <p>This site uses frames, but your browser doesn't support, please update your browser.</p>
    </body>
</noframes>

</html>