<?php

declare(strict_types=1);

namespace AlephTools\LogicCircuit\Gate;

/**
 * OR
 * 0 + 0 = 0
 * 0 + 1 = 1
 * 1 + 0 = 1
 * 1 + 1 = 1
 */
class Sum extends Gate
{
    protected function processInput(array $input): bool
    {
        foreach ($input as $value) {
            if ($value) {
                return true;
            }
        }
        return false;
    }
}
