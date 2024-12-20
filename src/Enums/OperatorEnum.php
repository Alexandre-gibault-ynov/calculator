<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * Enumeration containing the basics operators.
 */
enum OperatorEnum: string
{
    case ADD = '+';
    case SUBTRACT = '-';
    case MULTIPLY = '*';
    case DIVIDE = '/';
}