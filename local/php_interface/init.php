<?php

header('Content-Type: text/html; charset=utf-8');

foreach (glob("local/php_interface/include/*.php") as $filename)
{
    include_once ($filename);
}

foreach (glob("local/php_interface/class/*.php") as $filename)
{
    include_once ($filename);
}
