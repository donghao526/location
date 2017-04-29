<?php
require_once "../vendor/autoload.php";

$test = new Saltedfish\Location\Location(116.31985, 39.959836);

print_r($test->transformToAddress());
