<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Calculator;
use App\FileReader;

if ($argc !== 2) {
    echo "Usage: php calc.php <file_path>\n";
    exit(1);
}

$filePath = $argv[1];

$fileReader = new FileReader();
try {
    $expression = $fileReader->readExpression($filePath);

    $calculator = new Calculator();
    $result = $calculator->calculate($expression) . "\n";

    foreach ($expression as $token) {
        echo $token . " ";
    }
    echo "= " . $result . "\n";

} catch (Exception $e) {
    echo "Error : " . $e->getMessage() . "\n";
    exit(1);
}