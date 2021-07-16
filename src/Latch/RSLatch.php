<?php

declare(strict_types=1);

namespace AlephTools\LogicCircuit\Latch;

use AlephTools\LogicCircuit\Gate\NSum;
use AlephTools\LogicCircuit\Input;
use AlephTools\LogicCircuit\Output;
use LogicException;

/**
 * Asynchronous RS-Latch with two inputs R (reset) and S (set) and two outputs Q and !Q (inverse Q).
 * R,S -> Q,!Q
 *
 * R | S |    Q   |   !Q
 * --|---|--------|--------
 * 1 | 0 |    0   |   1
 * 0 | 1 |    1   |   0
 * 0 | 0 | Q(t-1) | !Q(t-1)
 * 1 | 1 |    0   |   0
 */
class RSLatch implements Input, Output
{
    private NSum $q;
    private NSum $nq;

    public function __construct()
    {
        $q = new NSum();
        $nq = new NSum();
        $q->tieTo($nq);
        $nq->tieTo($q);

        $this->q = $q;
        $this->nq = $nq;
    }

    /**
     * @param int|string $input
     * @param int|string $output
     */
    public function tieTo(Input $element, $input = 0, $output = 0): void
    {
        $this->getOutput($output)->tieTo($element, $input);
    }

    public function in($input, bool $value): void
    {
        if ($input === 0 || $input === 'r' || $input === 'R') {
            $this->q->in(1, $value);
        } elseif ($input === 1 || $input === 's' || $input === 'S') {
            $this->nq->in(1, $value);
        } else {
            throw new LogicException("RS-Latch does not have input $input");
        }
    }

    public function out($output = 0): bool
    {
        return $this->getOutput($output)->out();
    }

    /**
     * @param int|string $output
     */
    private function getOutput($output): NSum
    {
        if ($output === 0 || $output === 'q' || $output === 'Q') {
            return $this->q;
        }
        if ($output === 1 || $output === '!q' || $output === '!Q') {
            return $this->nq;
        }
        throw new LogicException("RS-Latch does not have output $output");
    }
}
