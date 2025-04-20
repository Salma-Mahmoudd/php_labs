<?php

require_once '../vendor/autoload.php';
require_once '../config/config.php';
session_start();

$visitor = new Visitor();
$counter = new Counter(COUNTER_FILE);

if ($visitor->isNewVisitor()) {
    $counter->increment();
    $visitor->setVisited();
}

echo "Number of unique visitors: " . $counter->getCount();
