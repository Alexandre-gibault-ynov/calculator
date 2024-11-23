<?php

declare(strict_types=1);

namespace App\Parsers\ExpressionTree;

final class OperandNode implements NodeInterface
{

    /**
     * @var int The operand's value
     */
    private int $value;

    public function __construct(int $value){
        $this->value = $value;
    }

    #[\Override] public function evaluate(): int
    {
        return $this->value;
    }
}