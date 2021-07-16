<?php

declare(strict_types=1);

namespace AlephTools\LogicCircuit\Gate;

/**
 * AND
 * 0 + 0 = 0
 * 0 + 1 = 0
 * 1 + 0 = 0
 * 1 + 1 = 1
 */
class Mul extends Gate
{
    protected function processInput(array $input): bool
    {
        foreach ($input as $value) {
            if (!$value) {
                return false;
            }
        }
        return true;
    }
}
