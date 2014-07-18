<?php
require_once dirname(__FILE__)."/providers.inc.php";
require_once dirname(__FILE__)."/classes/SecureExample.class.php";

$provider = new SecureExampleProvider(new DTOAuthVerifier());
$provider->handleRequest();
