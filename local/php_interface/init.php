<?php

foreach (glob("local/php_interface/include/*.php") as $filename)
{
    include_once ($filename);
}

foreach (glob("local/php_interface/class/*.php") as $filename)
{
    include_once ($filename);
}
