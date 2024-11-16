<?php

declare(strict_types = 1);

namespace App\Parsers;

use App\OperatorEnum;
use InvalidArgumentException;

final class ExpressionParser
{
    public function parse(array $expression): array
    {
        if (count($expression) < 3 || count($expression) % 2 === 0) {
            throw new \InvalidArgumentException("Invalid expression format.");
        }

        $parsedExpression = [];
        foreach ($expression as $index => $element) {
            if ($index % 2 === 0) {
                $parsedExpression[] = ['type' => 'operand', 'value' => $element];
            } else {
                $operator = OperatorEnum::tryFrom($element);
                if ($operator === null) {
                    throw new InvalidArgumentException("Invalid operator: $element");
                }
                $parsedExpression[] = ['type' => 'operator', 'value' => $operator];
            }
        }

        return $parsedExpression;
    }
}