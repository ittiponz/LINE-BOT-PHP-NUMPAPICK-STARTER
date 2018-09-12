<?php
fc();
echo "Hello LINE BOT";

function fc() {
define('LINE_API',"https://notify-api.line.me/api/notify");
define('LINE_TOKEN','RtFywTWTN5OOzIvpPfqTY8nUAu2ysELCQOwFyBB13bk');

function notify_message($message){

    $queryData = array('message' => $message);
    $queryData = http_build_query($queryData,'','&');
    $headerOptions = array(
        'http'=>array(
            'method'=>'POST',
            'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
            		  ."Authorization: Bearer ".LINE_TOKEN."\r\n"
                      ."Content-Length: ".strlen($queryData)."\r\n",
            'content' => $queryData
        )
    );
    $context = stream_context_create($headerOptions);
    $result = file_get_contents(LINE_API,FALSE,$context);
    $res = json_decode($result);
	return $res;
}
$res = notify_message('มีการเชื่อมต่อแล้ว');
var_dump($res);
}
object(stdClass)#1 (2) {
  ["status"]=>
  int(200)
  ["message"]=>
  string(2) "ok"
}
?>
