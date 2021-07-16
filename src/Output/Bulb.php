<?php

declare(strict_types=1);

namespace AlephTools\LogicCircuit\Output;

class Bulb extends OutputElement
{
    /**
     * @return bool[]
     */
    public function value(): array
    {
        return $this->value;
    }
}
