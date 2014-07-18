<?php
require_once dirname(__FILE__)."/../duktape.inc.php";

$consumer = new DTConsumer("ducktape","authentication.php");
$consumer->requestAndRespond($_REQUEST);

}
