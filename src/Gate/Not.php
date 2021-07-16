<?php

declare(strict_types=1);

namespace AlephTools\LogicCircuit\Gate;

/**
 * NOT
 * 0 = 1
 * 1 = 0
 */
class Not extends Gate
{
    /**
     * @param bool[] $input
     */
    protected function processInput(array $input): bool
    {
        return $input && !$input[array_key_first($input)];
    }
}
