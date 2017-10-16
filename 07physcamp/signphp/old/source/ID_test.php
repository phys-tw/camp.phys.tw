<?php

function ID_test ($ID) {
  $initial_code = array('A' => 1,    // 10
                        'B' => 10,   // 11
                        'C' => 19,   // 12
                        'D' => 28,   // 13
                        'E' => 37,   // 14
                        'F' => 46,   // 15
                        'G' => 55,   // 16
                        'H' => 64,   // 17
                        'I' => 39,   // 34
                        'J' => 73,   // 18
                        'K' => 82,   // 19
                        'L' => 2,    // 20
                        'M' => 11,   // 21
                        'N' => 20,   // 22
                        'O' => 48,   // 35
                        'P' => 29,   // 23
                        'Q' => 38,   // 24
                        'R' => 47,   // 25
                        'S' => 56,   // 26
                        'T' => 65,   // 27
                        'U' => 74,   // 28
                        'V' => 83,   // 29
                        'W' => 21,   // 32
                        'X' => 3,    // 30
                        'Y' => 12,   // 31
                        'Z' => 30) ; // 33
  $ID = strtoupper($ID) ;
  if (strlen($ID) != 10)
    return false ;
  else if (ereg('[^A-Z]', substr($ID, 0, 1)))
    return false ;
  else if (ereg('[^0-9]', substr($ID, 1)))
    return false ;
  else if (($ID[1] != '1') && ($ID[1] != '2'))
    return false ;
  else {
    $test_code = 0 ;
    $test_code += $initial_code[$ID[0]] ;
    $test_code += (ord($ID[1]) - 48) * 8 ;
    $test_code += (ord($ID[2]) - 48) * 7 ;
    $test_code += (ord($ID[3]) - 48) * 6 ;
    $test_code += (ord($ID[4]) - 48) * 5 ;
    $test_code += (ord($ID[5]) - 48) * 4 ;
    $test_code += (ord($ID[6]) - 48) * 3 ;
    $test_code += (ord($ID[7]) - 48) * 2 ;
    $test_code += (ord($ID[8]) - 48) ;
    $test_code += (ord($ID[9]) - 48) ;
	if ($test_code % 10 == 0)
      return true ;
	else
	  return false ;
  }
}

?>