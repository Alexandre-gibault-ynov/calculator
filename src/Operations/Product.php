<?php

declare(strict_types=1);

namespace App\Operations;


/**
 * The product class represents a multiplication of two operands.
 */
final class Product implements OperationInterface
{

    /**
     * Compute the multiplication of two given operands.
     *
     * @param int $leftOperand The operation left operand.
     * @param int $rightOperand The operation right operand.
     * @return int Product of the two given operands.
     */
    #[\Override] public function calculate(int $leftOperand, int $rightOperand): int
    {
        return $leftOperand * $rightOperand;
    }
}