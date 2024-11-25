<?php

declare(strict_types=1);

namespace App\Validators;

use InvalidArgumentException;

final class OperandValidator
{
    /**
     * validate the given operand.
     *
     * @param string $operand The operand to validate.
     * @return void
     * @throws InvalidArgumentException If the operand is not a number.
     */
    public static function validate(string $operand): void
    {
        if (!is_numeric($operand)) {
            throw new InvalidArgumentException("Invalid operand: $operand");
        }
    }

    public static function isValid(string $operand): bool {
        return is_numeric($operand);
    }
}