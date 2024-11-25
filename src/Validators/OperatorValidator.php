<?php

declare(strict_types=1);

namespace App\Validators;

use App\Enums\OperatorEnum;
use InvalidArgumentException;

final class OperatorValidator
{
    /**
     * Validate the given operator.
     *
     * @param string $operator The operator to validate.
     * @return void
     * @throws InvalidArgumentException If the operator is not valid.
     */
    public static function validate(string $operator): void
    {
        if (!OperatorEnum::tryFrom($operator)) {
            throw new InvalidArgumentException("Invalid operator: $operator");
        }
    }
}