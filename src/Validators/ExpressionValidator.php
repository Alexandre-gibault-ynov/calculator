<?php

declare(strict_types=1);

namespace App\Validators;

use App\Enums\OperatorEnum;
use App\Enums\ParenthesisEnum;
use InvalidArgumentException;

final class ExpressionValidator
{
    /**
     * Check if the expression is valid.
     *
     * @param string[] $expression The expression to validate.
     * @return bool True if the expression is valid, else false.
     */
    public static function validate(array $expression): bool {
        $expectOperand = true;
        $parenthesisBalance = 0;

        foreach ($expression as $token) {
            if ($token === ParenthesisEnum::OPENING->value) {
                $parenthesisBalance++;
                $expectOperand = true;
            } elseif ($token === ParenthesisEnum::CLOSING->value) {
                $parenthesisBalance--;
                ParenthesisValidator::validateBalance($parenthesisBalance);
                $expectOperand = false;
            } elseif ($expectOperand) {
                OperandValidator::validate($token);
                $expectOperand = false;
            } else {
                OperatorValidator::validate($token);
                $expectOperand = true;
            }
        }

        ParenthesisValidator::validateBalance($parenthesisBalance);

        if (!$expectOperand) {
            return true;
        }

        throw new InvalidArgumentException("Expression cannot end with an operator.");
    }
}