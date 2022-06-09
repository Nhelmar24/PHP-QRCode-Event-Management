<?php
session_start();
//getting id from url
$eid = $_GET['eid'];

include('qrlib/phpqrcode/qrlib.php');

$param = $_GET['eid']; // remember to sanitize that - it is user input!


// we need to be sure ours script does not output anything!!!
// otherwise it will break up PNG binary!

ob_start("callback");

// here DB request or some processing
// change the server address
$codeText = "http://192.168.140.239/event_confirm.php?eid=$param";

// end of processing here
$debugLog = ob_get_contents();
ob_end_clean();

// outputs image directly into browser, as PNG stream 
QRcode::png($codeText);
