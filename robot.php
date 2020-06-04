<?php

require 'vendor/autoload.php';
use App\CleaningService;

try {
    $arg = getopt(null, ["floor:", "area:"]);
    $robot = new CleaningService((Integer)$arg['area'], $arg['floor']);
    $robot->setCleaningObject();
    $robot->startCleaningProcess();
} catch (\ErrorException $e) {
    echo $e->getMessage();
}


?>
