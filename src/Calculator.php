<?php

declare(strict_types = 1);

namespace App;

use App\Parsers\ExpressionParser;
use App\Validators\OperandValidator;
use InvalidArgumentException;

final class Calculator
{
    private ExpressionParser $parser;
    private OperandValidator $validator;

    function __construct() {
        $this->parser = new ExpressionParser();
        $this->validator = new OperandValidator();
    }

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
        $parsedExpression = $this->parser->parse($expression);

        $result = $this->validator->validate(array_shift($parsedExpression)['value']);

        while(!empty($parsedExpression)) {
            $operator = array_shift($parsedExpression)['value'];
            $rightOperand = $this->validator->validate(array_shift($parsedExpression)['value']);

            $operation = OperationFactory::create($operator);
            $result = $operation->calculate($result, $rightOperand);
        }

        return $result;
    }
}