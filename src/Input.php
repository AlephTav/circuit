<?php

declare(strict_types=1);

namespace AlephTools\LogicCircuit;

interface Input
{
    /**
     * Sends value to $input of the logic element.
     *
     * @param int|string $input
     */
    public function in($input, bool $value): void;
}
