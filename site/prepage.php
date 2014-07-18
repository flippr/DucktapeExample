<?php
$dt_token = DTAPI::consumerTokenForAPI("ducktape");
$params = new DTParams($_REQUEST);
$session = DTSession::sharedSession();

$auth_consumer = new DTConsumer("ducktape","authentication.php",$dt_token); //any old provider
if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="logout"){
	DTSession::destroy();
	$auth_consumer->request("session_destroy");
	header("Location: ".DTSettings::baseURL("index.php"));
	exit();
}
$user = $auth_consumer->request("current_user");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta charset="UTF-8">
<meta keywords="">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<title>Ducktape Example</title>
<link rel="shortcut icon" href="favicon.ico">
<link rel="apple-touch-icon" href="apple-touch-icon.png">
<script src="/scripts/ducktape.js"></script>
</head>
<body>
