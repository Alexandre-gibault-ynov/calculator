<?php

declare(strict_types=1);

namespace App\Operations;

/**
 * The sum class represents a sum of two operands.
 */
final class Sum implements OperationInterface
{
    /**
     * Compute the sum of the two given operands.
     *
     * @param int $leftOperand The left operand.
     * @param int $rightOperand The right operand.
     * @return int The sum of the two given operands.
     */
    #[\Override] public function calculate(int $leftOperand, int $rightOperand): int
    {
        return $leftOperand + $rightOperand;
    }
}