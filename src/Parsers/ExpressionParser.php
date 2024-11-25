<?php

declare(strict_types = 1);

namespace App\Parsers;

use App\Enums\OperatorEnum;
use App\Validators\OperandValidator;
use InvalidArgumentException;

final class ExpressionParser
{
    /**
     * Parse an operation expression into a postfix expression.
     *
     * @param string[] $expression The operation expression.
     * @return string[] Parsed operation expression.
     * @throws InvalidArgumentException The expression is invalid.
     */
    public function parse(array $expression): array
    {

        $postfixExpression = [];
        $operators = [];

        foreach ($expression as $token) {
            $operator = OperatorEnum::tryFrom($token);

            if (OperandValidator::isValid($token)) {
                $postfixExpression[] = $token;
            } else if ($operator) {

                while (
                    !empty($operators) &&
                    $operators[array_key_last($operators)] !== '(' &&
                    $this->hasHigherPrecedence(end($operators), $token)
                ) {
                    $postfixExpression[] = array_pop($operators);
                }
                $operators[] = $token;

            } elseif ($token === '(') {
                $operators[] = $token;

            } elseif ($token === ')') {

                while (!empty($operators) && $operators[array_key_last($operators)] !== '(') {
                    $postfixExpression[] = array_pop($operators);
                }
                if (empty($operators) || array_pop($operators) !== '(') {
                    throw new InvalidArgumentException("Mismatched parentheses.");
                }
            }
        }

        while (!empty($operators)) {
            if ($operators[array_key_last($operators)] === '(') {
                throw new InvalidArgumentException("Mismatched parentheses.");
            }
            $postfixExpression[] = array_pop($operators);
        }

        return $postfixExpression;
    }

    /**
     * Return true if the first operator has a higher priority than the second operator
     * else false.
     *
     * @param string $operator1 The first operator.
     * @param string $operator2 The second operator.
     * @return bool True if the first operator has a higher priority than the second operator.
     */
    private function hasHigherPrecedence(string $operator1, string $operator2): bool
    {
        $precedence = [
            OperatorEnum::ADD->value => 1,
            OperatorEnum::SUBTRACT->value => 1,
            OperatorEnum::MULTIPLY->value => 2,
            OperatorEnum::DIVIDE->value => 2,
        ];

        return $precedence[$operator1] >= $precedence[$operator2];
    }


}