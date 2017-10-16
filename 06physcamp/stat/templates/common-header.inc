<?php
if (isset($conf['charset'])) {
    header('Content-type: text/html; charset=' . $conf['charset']);
}
?>
<!--                     TCBB Stat System                          -->
<!-- Copyright &copy; ITS - BBSFans.com, 2002. All rights reserved -->

<html>
<head>
<?php

$page_title = $conf['webtitle'];
if (!empty($title)) $page_title .= ' :: ' . $title;

?>
<title><?= $page_title ?></title>
<link href="images/style.css" rel="stylesheet" type="text/css">
<?php if (isset($showPopText) && $showPopText == true) { ?>
<script language="Javascript" src="images/PopText.js"></script>
<?php } ?>

</head>

<body <?php if (!empty($bodyStyle)) echo ' class="' . $bodyStyle . '"' ?>>
