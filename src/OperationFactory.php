<?php

declare(strict_types=1);

namespace App;

use App\Operations\OperationInterface;
use App\Operations\Sum;
use App\Operations\Subtraction;
use App\Operations\Product;
use App\Operations\Division;
use InvalidArgumentException;


/**
 * The OperationFactory class is a factory of basics operations.
 * It is used to instance a sum, a subtraction, a product, a division.
 */
final class OperationFactory
{
    /**
     * Create and return an operation according to the given operator.
     * If the operator is not correct, it will throw an exception.
     *
     * @param string $operator The operator of the operation to create.
     * @return OperationInterface The operation of the given operator.
     * @throws InvalidArgumentException If the operator is not correct.
     */
    public static function create(string $operator) : OperationInterface
    {
        return match (OperatorEnum::tryFrom($operator)) {
            OperatorEnum::ADD => new Sum(),
            OperatorEnum::SUBTRACT => new Subtraction(),
            OperatorEnum::MULTIPLY => new Product(),
            OperatorEnum::DIVIDE => new Division(),
            default => throw new InvalidArgumentException("Invalid operator: $operator"),
        };
    }
}