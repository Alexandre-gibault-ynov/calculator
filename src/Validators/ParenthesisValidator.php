<?php

declare(strict_types=1);

namespace App\Validators;

use InvalidArgumentException;

class ParenthesisValidator
{
    /**
     * Check if parentheses are correctly balanced.
     *
     * @param int $parenthesisBalance The parenthesis balance.
     * @return void
     * @throws InvalidArgumentException If the parenthesis are not correctly balanced.
     */
    public static function validateBalance(int $parenthesisBalance): void
    {
        if ($parenthesisBalance < 0) {
            throw new InvalidArgumentException("Mismatched closing parenthesis.");
        }
    }
}