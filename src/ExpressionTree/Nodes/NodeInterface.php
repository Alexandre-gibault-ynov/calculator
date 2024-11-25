<?php

declare(strict_types=1);

namespace App\ExpressionTree\Nodes;

/**
 * Represent a node on an expression tree
 */
interface NodeInterface
{
    /**
     * Return the value of the node.
     *
     * @return int Value of the node
     */
    public function evaluate(): int;
}