<?php

$now = time();

echo substr(md5($now),0,10);
