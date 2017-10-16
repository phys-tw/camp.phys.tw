<?php

if (array_key_exists('q', $_GET)) {
  if (file_exists($_GET['q'] . ".txt")) {
    $handle = fopen($_GET['q'] . ".txt", "r") ;
    while (! feof($handle)) {
      $buffer = fgets($handle);	
      if ($buffer[0] == '[') {
        $final_pos = strpos($buffer, ']') ;
        $area = substr($buffer, 1, $final_pos - 1) ;
        $sub_line = 0 ;
      }
      else if ($area != 'help') {
        $sub_line++ ;
        if ($sub_line == 1)
          $output[$area]['type'] = $buffer ;
        else if ($sub_line == 2)
          list($output[$area]['level']) = sscanf($buffer, "%d") ;
        else if ($sub_line == 3)
          $output[$area]['question'] = $buffer ;
        else if ($sub_line >= 4)
          $output[$area]['answer'][$sub_line - 3] = $buffer ;
      }
    }
  }
  fclose($handle) ;
}

if (array_key_exists('stat', $_GET))
  $stat = $_GET['stat'] ;
else
  $stat = "0000000000000000" ;
for ($i = 1 ; $i <= 16 ; $i++)
  list($output[sprintf("%02s", $i)]['stat']) = sscanf(substr($stat, $i - 1, 1), "%d") ;
// print_r($output) ;

if (array_key_exists('q_No', $_GET))
  $q_No = $_GET['q_No'] ;
else
  $q_No = 1 ;
$q_No_f = sprintf("%02s", $_GET['q_No']) ;

if (array_key_exists('ans', $_GET))
  $select_ans = $_GET['ans'] ;

?>

<html>

<head>
<title>2006 台大物理營 - 問答遊戲</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<style type="text/css">
<!--
body {
	background-color: #000000;
	background-attachment: fixed;
	margin-left: 0px;
	margin-top: 2px;
	margin-right: 0px;
	margin-bottom: 2px;
}
a {
        color: #0000FF;
	text-decoration: none;
}
a:hover {
	color: #2ECF20;
}
a:active {
	color: #1EBF10;
}
.td_3 {
	font-size: 48pt;
	font-family: Forte, Comic Sans MS, Arial;
	color: #000066;
	background-color: #FFCCCC;
	border-style: outset;
}
.td_4 {
	font-size: 40pt;
	font-weight: bold;
	font-family: Forte, Comic Sans MS, Arial;
	color: #000066;
	background-color: #CCF0F0;
	border-style: outset;
}
-->
</style>

<script language="JavaScript">
</script>
</head>

<body>

<div align="center">
<table height="100%" border="0" cellpadding="0" cellspacing="8">
  <tr>
    <td align="center" valign="middle" class="td_3" width="800" height="30%">
      <?= $q_No ?>.
      <span style="font-size: 40pt; font-family: 華康少女文字W5, 細明體"><?= $output[$q_No_f]['question'] ?></span>
    </td>
  </tr>
  <tr>
    <td align="left" valign="middle" class="td_4">
<?php

$correct_ans = 0 ;
foreach ($output[$q_No_f]['answer'] as $ans => $answer)
  if (substr($answer, 0, 1) == "*") {
    $correct_ans = $ans ;
    $correct_answer = $answer ;
  }
$correct_answer = substr($correct_answer, 1) ;
if ($select_ans == $correct_ans) {
  echo "<p align='center'>答案正確！</p>" ;
  $stat_next = substr($stat, 0, $q_No - 1) . '1' . substr($stat, $q_No) ;
}
else {
  echo "<p align='center'>答錯囉！正確答案是：</p>" ;
  echo "<p align='left' style='font-size: 32pt; font-family: 華康少女文字W5, 細明體; text-indent: -90px; margin-left: 90px'><" . $correct_ans . "> " . $correct_answer . "</p>" ;
  $stat_next = substr($stat, 0, $q_No - 1) . '2' . substr($stat, $q_No) ;
}
echo "<p align='center'><a href='quiz.php?q=" . $_GET['q'] . "&stat=" . $stat_next . "'>[BACK]</a></p>" ;

?>
    </td>
  </tr>
</table>
</div>

</body>

</html>