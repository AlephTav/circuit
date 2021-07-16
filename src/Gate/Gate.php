<?php

declare(strict_types=1);

namespace AlephTools\LogicCircuit\Gate;

use AlephTools\LogicCircuit\Input;
use AlephTools\LogicCircuit\Output;

abstract class Gate implements Input, Output
{
    /**
     * @var bool[]
     */
    private array $input = [];

    private bool $output = false;

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
        $this->elements[] = [$element, $input];
    }

    public function in($input, bool $value): void
    {
        if (($this->input[$input] ?? null) === $value) {
            return;
        }
        $this->input[$input] = $value;
        $this->output = $this->processInput($this->input);
        foreach ($this->elements as [$element, $input]) {
            $element->in($input, $this->output);
        }
    }

    /**
     * @param bool[] $input
     */
    abstract protected function processInput(array $input): bool;

    /**
     * @param int|string $output
     */
    public function out($output = 0): bool
    {
        return $this->output;
    }
}
