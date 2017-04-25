<?php
require_once "../vendor/autoload.php";

$test = new Saltedfish\Location\Location(123, 456);

$test->transformToAddress();
