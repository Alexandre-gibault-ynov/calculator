<?php

declare(strict_types=1);

namespace App\Validators;

use InvalidArgumentException;

class OperandValidator
{
    /**
     * Validate an operation operand by testing if it's value is numeric.
     * Return the operand int value.
     *
     * @param string $operand The operand to validate
     * @return int The operand int value
     * @throws InvalidArgumentException If the operand is not numeric
     */
    public static function validate(string $operand): int {
        if (!is_numeric($operand)) {
            throw new InvalidArgumentException("Invalid operand: $operand");
        }
        return (int)$operand;
    }
}