<?php
require_once dirname(__FILE__)."/providers.inc.php";
require_once dirname(__FILE__)."/classes/NonSecureExample.class.php";

$provider = new NonSecureExampleProvider(new DTOAuthVerifier());
$provider->handleRequest();
