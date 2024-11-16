<?php

declare(strict_types=1);

namespace App\Operations;

/**
 * Operation interface represents a basic operation with two operands.
 */
interface OperationInterface {

    /**
     * Compute the operation.
     *
     * @param int $leftOperand The operation left operand.
     * @param int $rightOperand The operation right operand.
     * @return int Result of the operation.
     */
    public function calculate(int $leftOperand, int $rightOperand) : int;
}