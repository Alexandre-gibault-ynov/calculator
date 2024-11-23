<?php

declare(strict_types=1);

namespace App\Parsers\ExpressionTree;

use App\OperationFactory;
use App\Operations\OperationInterface;
use App\OperatorEnum;
use RuntimeException;

final class ExpressionTree
{
    /**
     * @var NodeInterface|null Root of the expression tree
     */
    private ?NodeInterface $root = null;

    public function build(array $postfixExpression):void {
        $stack = [];

        foreach ($postfixExpression as $token) {
            $is_operand = is_numeric($token);

            if ($is_operand) {
                $stack[] = new OperandNode((int) $token);
            } else if ($token instanceof OperatorEnum) {
                $right = array_pop($stack);
                $left = array_pop($stack);

                if (!$right || !$left) {
                    throw new RuntimeException("Invalid expression structure.");
                }

                $operation = OperationFactory::create($token);
                $stack[] = new OperationNode($operation, $left, $right);
            }
        }
        $this->root = array_pop($stack);
    }

    public function evaluate(): int {
        if ($this->root === null) {
            throw new RuntimeException("Expression tree is not built.");
        }
        return $this->root->evaluate();
    }
}