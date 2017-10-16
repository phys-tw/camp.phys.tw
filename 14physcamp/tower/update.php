<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
set_time_limit(180);
/**
* Constructs the SSE data format and flushes that data to the client.
*
* @param string $id Timestamp/id of this connection.
* @param string $msg Line of text that should be transmitted.
*/




function sendMsg($num) {
  echo "retry: 500".PHP_EOL;
  $out="data:".$num.PHP_EOL;
  echo $out;
  echo PHP_EOL;
  ob_flush();
  flush();
}

$startedAt = time();

do {
  // Cap connections at 10 seconds. The browser will reopen the connection on close
  if ((time() - $startedAt) > 180) {
    die();
  }

  $fp = fopen('tower.txt', 'r');
  $num=fread($fp,filesize("tower.txt"));
  fclose($fp);

  for($i=1;$i<=7;$i++)
  {
    $fp = fopen("tower".$i.".txt", 'r');
    $num.=';';
    $v=intval(fread($fp,filesize("tower".$i.".txt")));
    if($v==-1)
      $num.=-1;
    else if(120-time()+$v>=0)
      $num.=(120-time()+$v);
    else
      $num.=0;
    fclose($fp);
  }

  sendMsg($num);
  sleep(1);

  // If we didn't use a while loop, the browser would essentially do polling
  // every ~3seconds. Using the while, we keep the connection open and only make
  // one request.
} while(true);
?>