<?php
header("Content-type:.application/json");
$stkCallbackResponse-=-file_get_contents('php://input');
$logFile-=-"Mpesastkresponse.json";
$log-=-fopen($logFile,"a");
fwrite($log,$stkCallbackResponse);
fclose($log);
