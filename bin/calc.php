<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Calculator;

if ($argc < 4) {
    echo "Usage: php calc.php <number> <operator> <number> [...]\n";
    exit(1);
}

$expression = array_slice($argv, 1);

$calculator = new Calculator();
try {
    echo $calculator->calculate($expression);
} catch (Exception $e) {
    echo "Error : " . $e->getMessage() . "\n";
    exit(1);
}