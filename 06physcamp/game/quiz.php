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

function square ($question_number, $output) {
  $question_number_f = sprintf("%02s", $question_number) ;
  $q_row = floor(($question_number - 1) / 4.) ;
  $q_col = ($question_number - 1) % 4 ;
  echo "<td align='center' valign='middle' id='b" . $question_number_f . "' class='" ;
  if ($output[$question_number_f]['stat'] == 0)
    echo "td_1" ;
  else if ($output[$question_number_f]['stat'] == 1)
    echo "td_2" ;
  else
    echo "td_3" ;
  echo "' onMouseOver='image_over(" . $q_row . ", " . $q_col . ");' onMouseOut='image_out(" . $q_row . ", " . $q_col . ");' onClick='image_click(" . $q_row . ", " . $q_col . ");' width='200'>\n" ;
  echo "&nbsp;" . $question_number . "&nbsp;\n" ;
  echo "<p class='p_1'>" ;
  for ($i = 1 ; $i <= $output[$question_number_f]['level'] ; $i++)
    echo "<img width='28' height='27' border='0' src='star.gif'>" ;
  echo "</p>\n" ;
  echo "</td>\n" ;
}

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
.td_1 {
	font-size: 60pt;
	font-weight: bold;
	font-family: Forte, Comic Sans MS, Arial;
	color: #000066;
	background-color: #DDDDDD;
	border-style: outset;
}
.td_2 {
	font-size: 60pt;
	font-weight: bold;
	font-family: Forte, Comic Sans MS, Arial;
	color: #000066;
	background-color: #BB8080;
	border-style: outset;
}
.td_3 {
	font-size: 60pt;
	font-weight: bold;
	font-family: Forte, Comic Sans MS, Arial;
	text-decoration: line-through;
	color: #000066;
	background-color: #BB8080;
	border-style: outset;
}
.p_1 {
	margin-top: 0px;
	margin-bottom: 10px;
}
-->
</style>

<script language="JavaScript">
var stat = new Array() ;
<?php

echo "stat[0] = " . $output['01']['stat'] . " ;\n" ;
echo "stat[1] = " . $output['02']['stat'] . " ;\n" ;
echo "stat[2] = " . $output['03']['stat'] . " ;\n" ;
echo "stat[3] = " . $output['04']['stat'] . " ;\n" ;
echo "stat[4] = " . $output['05']['stat'] . " ;\n" ;
echo "stat[5] = " . $output['06']['stat'] . " ;\n" ;
echo "stat[6] = " . $output['07']['stat'] . " ;\n" ;
echo "stat[7] = " . $output['08']['stat'] . " ;\n" ;
echo "stat[8] = " . $output['09']['stat'] . " ;\n" ;
echo "stat[9] = " . $output['10']['stat'] . " ;\n" ;
echo "stat[10] = " . $output['11']['stat'] . " ;\n" ;
echo "stat[11] = " . $output['12']['stat'] . " ;\n" ;
echo "stat[12] = " . $output['13']['stat'] . " ;\n" ;
echo "stat[13] = " . $output['14']['stat'] . " ;\n" ;
echo "stat[14] = " . $output['15']['stat'] . " ;\n" ;
echo "stat[15] = " . $output['16']['stat'] . " ;\n" ;

?>
function button_name (q_row, q_col) {
  if (q_row == 0) {
    if (q_col == 0)
      return document.all.b01 ;
    else if (q_col == 1)
      return document.all.b02 ;
    else if (q_col == 2)
      return document.all.b03 ;
    else if (q_col == 3)
      return document.all.b04 ;
  }
  else if (q_row == 1) {
    if (q_col == 0)
      return document.all.b05 ;
    else if (q_col == 1)
      return document.all.b06 ;
    else if (q_col == 2)
      return document.all.b07 ;
    else if (q_col == 3)
      return document.all.b08 ;
  }
  else if (q_row == 2) {
    if (q_col == 0)
      return document.all.b09 ;
    else if (q_col == 1)
      return document.all.b10 ;
    else if (q_col == 2)
      return document.all.b11 ;
    else if (q_col == 3)
      return document.all.b12 ;
  }
  else if (q_row == 3) {
    if (q_col == 0)
      return document.all.b13 ;
    else if (q_col == 1)
      return document.all.b14 ;
    else if (q_col == 2)
      return document.all.b15 ;
    else if (q_col == 3)
      return document.all.b16 ;
  }
}
function image_over(q_row, q_col) {
  if (stat[q_row * 4 + q_col] == 0) {
    button_name(q_row, q_col).style.background = '#FFFFAA' ;
    button_name(q_row, q_col).style.cursor = 'hand' ;

    var pp_row = (q_row + 1) % 4 ;
    var line1 = true ;
    while (pp_row != q_row) {
      if (stat[pp_row * 4 + q_col] != 1)
        line1 = false ;
      pp_row = (pp_row + 1) % 4 ;
    }
    if (line1) {
      pp_row = (q_row + 1) % 4 ;
      while (pp_row != q_row) {
       button_name(pp_row, q_col).style.background = '#DCFFC8' ;
       pp_row = (pp_row + 1) % 4 ;
      }
    }

    var pp_col = (q_col + 1) % 4 ;
    var line2 = true ;
    while (pp_col != q_col) {
      if (stat[q_row * 4 + pp_col] != 1)
        line2 = false ;
      pp_col = (pp_col + 1) % 4 ;
    }
    if (line2) {
      pp_col = (q_col + 1) % 4 ;
      while (pp_col != q_col) {
        button_name(q_row, pp_col).style.background = '#DCFFC8' ;
        pp_col = (pp_col + 1) % 4 ;
      }
    }

    if (q_row == q_col) {
      pp_row = (q_row + 1) % 4 ;
      var line3 = true ;
      while (pp_row != q_row) {
        if (stat[pp_row * 4 + pp_row] != 1)
          line3 = false ;
        pp_row = (pp_row + 1) % 4 ;
      }
      if (line3) {
        pp_row = (q_row + 1) % 4 ;
        while (pp_row != q_row) {
          button_name(pp_row, pp_row).style.background = '#DCFFC8' ;
          pp_row = (pp_row + 1) % 4 ;
        }
      }
    }

    if (q_row == 3 - q_col) {
      pp_row = (q_row + 1) % 4 ;
      var line4 = true ;
      while (pp_row != q_row) {
        if (stat[pp_row * 4 + (3 - pp_row)] != 1)
          line4 = false ;
        pp_row = (pp_row + 1) % 4 ;
      }
      if (line4) {
        pp_row = (q_row + 1) % 4 ;
        while (pp_row != q_row) {
          button_name(pp_row, (3 - pp_row)).style.background = '#DCFFC8' ;
          pp_row = (pp_row + 1) % 4 ;
        }
      }
    }
  }
}
function image_out(q_row, q_col) {
  if (stat[q_row * 4 + q_col] == 0) {
    button_name(q_row, q_col).style.background = '#DDDDDD' ;
    button_name(q_row, q_col).style.cursor = '' ;

    var pp_row = (q_row + 1) % 4 ;
    var line1 = true ;
    while (pp_row != q_row) {
      if (stat[pp_row * 4 + q_col] != 1)
        line1 = false ;
      pp_row = (pp_row + 1) % 4 ;
    }
    if (line1) {
      pp_row = (q_row + 1) % 4 ;
      while (pp_row != q_row) {
        button_name(pp_row, q_col).style.background = '#BB8080' ;
        pp_row = (pp_row + 1) % 4 ;
      }
    }

    var pp_col = (q_col + 1) % 4 ;
    var line2 = true ;
    while (pp_col != q_col) {
      if (stat[q_row * 4 + pp_col] != 1)
        line2 = false ;
      pp_col = (pp_col + 1) % 4 ;
    }
    if (line2) {
      pp_col = (q_col + 1) % 4 ;
      while (pp_col != q_col) {
        button_name(q_row, pp_col).style.background = '#BB8080' ;
        pp_col = (pp_col + 1) % 4 ;
      }
    }

    if (q_row == q_col) {
      pp_row = (q_row + 1) % 4 ;
      var line3 = true ;
      while (pp_row != q_row) {
        if (stat[pp_row * 4 + pp_row] != 1)
          line3 = false ;
        pp_row = (pp_row + 1) % 4 ;
      }
      if (line3) {
        pp_row = (q_row + 1) % 4 ;
        while (pp_row != q_row) {
          button_name(pp_row, pp_row).style.background = '#BB8080' ;
          pp_row = (pp_row + 1) % 4 ;
        }
      }
    }

    if (q_row == 3 - q_col) {
      pp_row = (q_row + 1) % 4 ;
      var line4 = true ;
      while (pp_row != q_row) {
        if (stat[pp_row * 4 + (3 - pp_row)] != 1)
          line4 = false ;
        pp_row = (pp_row + 1) % 4 ;
      }
      if (line4) {
        pp_row = (q_row + 1) % 4 ;
        while (pp_row != q_row) {
          button_name(pp_row, (3 - pp_row)).style.background = '#BB8080' ;
          pp_row = (pp_row + 1) % 4 ;
        }
      }
    }
  }
}
function image_click(q_row, q_col) {
  if (stat[q_row * 4 + q_col] == 0)
    location.href = 'quiz_q.php?q=<?= $_GET['q'] ?>&stat=<?= $stat ?>&q_No=' + (q_row * 4 + q_col + 1) ;
}
</script>
</head>

<body>

<div align="center">
<table height="100%" border="0" cellpadding="0" cellspacing="8">
  <tr>
<?php
square(1, $output) ;
square(2, $output) ;
square(3, $output) ;
square(4, $output) ;
?>
  </tr>
  <tr>
<?php
square(5, $output) ;
square(6, $output) ;
square(7, $output) ;
square(8, $output) ;
?>
  </tr>
  <tr>
<?php
square(9, $output) ;
square(10, $output) ;
square(11, $output) ;
square(12, $output) ;
?>
  </tr>
  <tr>
<?php
square(13, $output) ;
square(14, $output) ;
square(15, $output) ;
square(16, $output) ;
?>
  </tr>
</table>
</div>

</body>

</html>