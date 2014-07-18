<?php
require_once dirname(__FILE__)."/providers.inc.php";
require_once dirname(__FILE__)."/classes/ExampleAuthenticationProvider.class.php";

$provider = new ExampleAuthenticationProvider();
$provider->handleRequest();
