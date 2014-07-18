<?php
require_once dirname(__FILE__)."/../ducktape.php/ducktape.inc.php";
dt_load_module("providers","authentication","providers_oauth","stores","stores_mysql","roles","tests");

// Initiate DB for Providers
DTSettings::$default_database = DTSettings::fromStorage('default');
