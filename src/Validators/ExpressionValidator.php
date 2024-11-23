<?php

declare(strict_types=1);

namespace App\Validators;

use App\OperatorEnum;

final class ExpressionValidator
{
    public static function validate(array $expression): bool {
        $expectOperand = true;

        foreach ($expression as $token) {
            if ($expectOperand) {
                if (!OperandValidator::isValid($token)) {
                    throw new InvalidArgumentException("Invalid operand: $token");
                }
                $expectOperand = false;
            } else {
                if (!OperatorEnum::tryFrom($token)) {
                    throw new InvalidArgumentException("Invalid operator: $token");
                }
                $expectOperand = true;
            }
        }

        if (!$expectOperand) {
            return true;
        }

        throw new \InvalidArgumentException("Expression cannot end with an operator.");
    }
}