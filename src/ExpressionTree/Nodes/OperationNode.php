<?php

declare(strict_types=1);

namespace App\ExpressionTree\Nodes;

use App\Operations\OperationInterface;
use App\Parsers\ExpressionTree;

final class OperationNode implements NodeInterface
{
    /**
     * @var OperationInterface The operation of the node.
     */
    private OperationInterface $operation;

    /**
     * @var NodeInterface Left expression of the node.
     */
    private NodeInterface $left;

    /**
     * @var NodeInterface Right expression of the node.
     */
    private NodeInterface $right;

    public function __construct(OperationInterface $operation, NodeInterface $left, NodeInterface $right) {
        $this->operation = $operation;
        $this->left = $left;
        $this->right = $right;
    }

    #[\Override] public function evaluate(): int
    {
        return $this->operation->calculate(
            $this->left->evaluate(),
            $this->right->evaluate()
        );
    }
}