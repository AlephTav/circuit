<?php

declare(strict_types=1);

namespace AlephTools\LogicCircuit\Gate;

/**
 * XOR (Exclusive OR)
 * 0 + 0 = 0
 * 0 + 1 = 1
 * 1 + 0 = 1
 * 1 + 1 = 0
 */
class XSum extends Gate
{
    protected function processInput(array $input): bool
    {
        $flag = false;
        foreach ($input as $value) {
            if ($value) {
                if ($flag) {
                    return false;
                }
                $flag = true;
            }
        }
        return $flag;
    }
}
