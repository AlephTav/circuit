<?php

declare(strict_types=1);

namespace AlephTools\LogicCircuit\Output;

use AlephTools\LogicCircuit\Input;

abstract class OutputElement implements Input
{
    /**
     * @var bool[]
     */
    protected array $value = [];

    public function in($input, bool $value): void
    {
        $this->value[$input] = $value;
    }

    /**
     * @return mixed
     */
    abstract public function value();
}
