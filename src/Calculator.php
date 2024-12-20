<?php

declare(strict_types = 1);

namespace App;

use App\ExpressionTree\ExpressionTree;
use App\Parsers\ExpressionParser;
use App\Validators\ExpressionValidator;
use InvalidArgumentException;

final class Calculator
{
    private ExpressionParser $parser;

    function __construct() {
        $this->parser = new ExpressionParser();
    }

    /**
     * Returns the result of the operation contained in the given expression.
     * throws an exception if the user give a non-numeric operand.
     *
     * @param string[] $expression Expression of the operation.
     * @return int The result of the operation.
     * @throws InvalidArgumentException If the operation contains a non-numeric operand or an invalid operator.
     */
    public function calculate(array $expression) : int
    {
        ExpressionValidator::validate($expression);

        $postfixExpression = $this->parser->parse($expression);

        $tree = new ExpressionTree();
        $tree->build($postfixExpression);

        return $tree->evaluate();
    }
}