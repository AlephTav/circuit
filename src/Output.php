<?php

declare(strict_types=1);

namespace AlephTools\LogicCircuit;

interface Output
{
    /**
     * Binds $input with $output of the given logic element.
     *
     * @param int|string $input
     * @param int|string $output
     */
    public function tieTo(Input $element, $input = 0, $output = 0): void;

    /**
     * Returns the value at $output
     *
     * @param int|string $output
     */
    public function out($output = 0): bool;
}
