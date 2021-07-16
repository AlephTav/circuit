<?php

declare(strict_types=1);

namespace AlephTools\LogicCircuit\Output;

class Number extends OutputElement
{
    public function value(): int
    {
        $pow = 1;
        $num = 0;
        foreach ($this->value as $bit) {
            if ($bit) {
                $num += $pow;
            }
            $pow <<= 1;
        }
        return $num;
    }
}
