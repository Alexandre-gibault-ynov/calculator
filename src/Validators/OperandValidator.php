<?php

declare(strict_types=1);

namespace App\Validators;

final class OperandValidator
{
    /**
     * Check if the given operand is a number.
     *
     * @param string|int|float $operand The operand to validate.
     * @return bool True if the operand is a number, else false.
     */
    public static function isValid(string|int|float $operand): bool {
        return is_numeric($operand);
    }
}