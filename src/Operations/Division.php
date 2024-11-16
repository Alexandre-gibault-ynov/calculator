<?php

declare(strict_types = 1);

namespace App\Operations;

/**
 * The division class represents a division of two operands.
 */
final class Division implements OperationInterface
{

    /**
     * Compute the division of leftOperand by rightOperand.
     *
     * @param int $leftOperand The left operand.
     * @param int $rightOperand he right Operand.
     * @return int The division of leftOperand by rightOperand.
     */
    #[\Override] public function calculate(int $leftOperand, int $rightOperand): int
    {
        return $leftOperand / $rightOperand;
    }
}