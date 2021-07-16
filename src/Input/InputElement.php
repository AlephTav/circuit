<?php

declare(strict_types=1);

namespace AlephTools\LogicCircuit\Input;

use AlephTools\LogicCircuit\Input;
use AlephTools\LogicCircuit\Output;
use LogicException;

abstract class InputElement implements Output
{
    private ?bool $value = null;

    /**
     * @var array<array{0: Input, 1: int|string}>
     */
    private array $elements = [];

    /**
     * @param int|string $input
     * @param int|string $output
     */
    public function tieTo(Input $element, $input = 0, $output = 0): void
    {
        $this->elements[$output] = [$element, $input];
    }

    public function switchTo(bool $value): void
    {
        if ($this->value === $value) {
            return;
        }
        $this->value = $value;
        foreach ($this->elements as [$element, $input]) {
            $element->in($input, $value);
        }
    }

    /**
     * @param int|string $output
     */
    public function out($output = 0): bool
    {
        if ($this->value === null) {
            throw new LogicException('Element is not activated yet. Use switchTo() to set output value.');
        }
        return $this->value;
    }
}
