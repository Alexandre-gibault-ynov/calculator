<?php

declare(strict_types=1);

namespace App\Validators;

use App\OperatorEnum;
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
            if ($token === '(') {
                $parenthesisBalance++;
                $expectOperand = true;
            } elseif ($token === ')') {
                $parenthesisBalance--;
                self::validateParenthesisBalance($parenthesisBalance);
                $expectOperand = false;
            } elseif ($expectOperand) {
                self::validateOperand($token);
                $expectOperand = false;
            } else {
                self::validateOperator($token);
                $expectOperand = true;
            }
        }

        self::validateParenthesisBalance($parenthesisBalance);

        if (!$expectOperand) {
            return true;
        }

        throw new \InvalidArgumentException("Expression cannot end with an operator.");
    }

    /**
     * Throws an exception if the operand is not valid.
     *
     * @param string $operand The operand to validate.
     * @return void
     * @throws InvalidArgumentException If the operand is not valid.
     */
    private static function validateOperand(string $operand): void
    {
        if (!OperandValidator::isValid($operand)) {
            throw new InvalidArgumentException("Invalid operand: $operand");
        }
    }

    /**
     * Throws an exception if the operator is not valid.
     *
     * @param string $operator The operator to validate.
     * @return void
     * @throws InvalidArgumentException If the operator is not valid.
     */
    private static function validateOperator(string $operator): void
    {
        if (!OperatorEnum::tryFrom($operator)) {
            throw new InvalidArgumentException("Invalid operator: $operator");
        }
    }

    /**
     * Throws an exception if the parenthesis balance is not valid.
     *
     * @param int $parenthesisBalance The parenthesis balance.
     * @return void
     * @throws InvalidArgumentException If the parenthesis balance is not valid.
     */
    private static function validateParenthesisBalance(int $parenthesisBalance): void
    {
        if ($parenthesisBalance < 0) {
            throw new InvalidArgumentException("Mismatched closing parenthesis.");
        } elseif ($parenthesisBalance !== 0) {
                throw new InvalidArgumentException("Mismatched parentheses in expression.");
        }
    }
}