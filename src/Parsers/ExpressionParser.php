<?php

declare(strict_types = 1);

namespace App\Parsers;

use App\OperatorEnum;
use App\Validators\OperandValidator;
use InvalidArgumentException;

final class ExpressionParser
{
    /**
     * Parse an operation expression into a postfix expression.
     *
     * @param string[] $expression The operation expression.
     * @return array<string> Parsed operation expression.
     * @throws InvalidArgumentException The expression is invalid.
     */
    public function parse(array $expression): array
    {

        $postfixExpression = [];
        $operators = [];

        foreach ($expression as $token) {

            if (OperandValidator::isValid($token)) {
                $postfixExpression[] = $token;
            } else if ($operator = OperatorEnum::tryFrom($token)) {

                while (!empty($operators) && $this->hasHigherPrecedence(end($operators), $operator)) {
                    $postfixExpression[] = array_pop($operators);
                }
                $operators[] = $operator;

            } else {
                throw new InvalidArgumentException("Invalid Token: $token");
            }
        }

        while (!empty($operators)) {
            $postfixExpression[] = array_pop($operators);
        }

        return $postfixExpression;
    }

    /**
     * Return true if the first operator has a higher priority than the second operator
     * else false.
     *
     * @param OperatorEnum $operator1 The first operator.
     * @param OperatorEnum $operator2 The second operator.
     * @return bool True if the first operator has a higher priority than the second operator.
     */
    private function hasHigherPrecedence(OperatorEnum $operator1, OperatorEnum $operator2): bool
    {
        $precedence = [
            OperatorEnum::ADD->value => 1,
            OperatorEnum::SUBTRACT->value => 1,
            OperatorEnum::MULTIPLY->value => 2,
            OperatorEnum::DIVIDE->value => 2,
        ];

        return $precedence[$operator1->value] >= $precedence[$operator2->value];
    }


}