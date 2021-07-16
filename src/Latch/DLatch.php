<?php

declare(strict_types=1);

namespace AlephTools\LogicCircuit\Latch;

use AlephTools\LogicCircuit\Gate\Mul;
use AlephTools\LogicCircuit\Gate\Not;
use AlephTools\LogicCircuit\Input;
use AlephTools\LogicCircuit\Output;
use LogicException;

/**
 * Gated D-Latch
 * E,D -> Q,!Q
 */
class DLatch implements Input, Output
{
    private Not $not;
    private Mul $mul1;
    private Mul $mul2;
    private RSLatch $rsLatch;

    public function __construct()
    {
        $not = new Not();

        $mul1 = new Mul();
        $not->tieTo($mul1);

        $mul2 = new Mul();

        $rsLatch = new RSLatch();
        $mul1->tieTo($rsLatch, 'r');
        $mul2->tieTo($rsLatch, 's');

        $this->not = $not;
        $this->mul1 = $mul1;
        $this->mul2 = $mul2;
        $this->rsLatch = $rsLatch;
    }

    /**
     * @param int|string $input
     * @param int|string $output
     */
    public function tieTo(Input $element, $input = 0, $output = 0): void
    {
        $this->rsLatch->tieTo($element, $input);
    }

    public function in($input, bool $value): void
    {
        if ($input === 0 || $input === 'e' || $input === 'E') {
            $this->mul1->in(1, $value);
            $this->mul2->in(0, $value);
        } elseif ($input === 1 || $input === 'd' || $input === 'D') {
            $this->not->in(0, $value);
            $this->mul2->in(1, $value);
        } else {
            throw new LogicException("D-Latch does not have input $input");
        }
    }

    public function out($output = 0): bool
    {
        return $this->rsLatch->out($output);
    }
}
