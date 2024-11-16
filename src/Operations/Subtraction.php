<?php

declare(strict_types=1);

namespace App\Operations;

/**
 * The Subtraction class represents a subtraction of two operands.
 */
final class Subtraction implements OperationInterface
{

    /**
     * Compute the subtraction of the two given operands.
     *
     * @param int $leftOperand The left operand.
     * @param int $rightOperand The right operand.
     * @return int The subtraction of the two given operands.
     */
    #[\Override] public function calculate(int $leftOperand, int $rightOperand): int
    {
        return $leftOperand - $rightOperand;
    }
}