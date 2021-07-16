<?php

declare(strict_types=1);

namespace AlephTools\LogicCircuit\Gate;

/**
 * XNOR (Exclusive NOT-OR, Equivalence)
 * 0 + 0 = 1
 * 0 + 1 = 0
 * 1 + 0 = 0
 * 1 + 1 = 1
 */
class XNSum extends Gate
{
    protected function processInput(array $input): bool
    {
        $flag = false;
        foreach ($input as $value) {
            if ($value) {
                if ($flag) {
                    return true;
                }
                $flag = true;
            }
        }
        return !$flag;
    }
}
