<?php

require_once dirname(__FILE__)."/ducktape.inc.php";
require_once($prepage);

?>

Welcome to Ducktape Example.<br /><br />

<a href='/secure-example.php'>Authenticated Request Example</a> | <a href='/nonsecure-example.php'>NonAuthenticated Request Example</a>

<?php
require_once($postpage);
