<?php

declare(strict_types = 1);

namespace App;

use InvalidArgumentException;

final class Calculator
{

    /**
     * Returns the result of the operation contained in the given expression.
     * throws an exception if the user give a non-numeric operand.
     *
     * @param array $expression Expression of the operation.
     * @return int The result of the operation.
     * @throws InvalidArgumentException If the operation contains a non-numeric operand or an invalid operator.
     */
    public function calculate(array $expression) : int
    {
        $result = $this->validateOperand(array_shift($expression));

        while(count($expression) > 0) {

            $operatorString = array_shift($expression);
            $operator = OperatorEnum::tryFrom($operatorString);
            if ($operator === null) {
                throw new InvalidArgumentException("Invalid operator: $operatorString");
            }

            $rightOperand = $this->validateOperand(array_shift($expression));

            $operation = OperationFactory::create($operator);
            $result = $operation->calculate($result, $rightOperand);
        }

        return $result;
    }

    /**
     * Validate an operand. Returns the value of the operand if it's numeric.
     * Else throws an invalid argument exception.
     *
     * @param string $operand The operand to validate.
     * @return int The value of the operand.
     * @throws InvalidArgumentException If the operand is not numeric.
     */
    private function validateOperand(string $operand): int {
        if (!is_numeric($operand)) {
            throw new \InvalidArgumentException("Invalid operand: $operand");
        }
        return (int)$operand;
    }
}