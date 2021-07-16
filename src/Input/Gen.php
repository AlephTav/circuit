<?php

declare(strict_types=1);

namespace AlephTools\LogicCircuit\Input;

/**
 * Generate a sequence of 0 and 1 with the given step.
 */
class Gen extends InputElement
{
    private int $step;
    private int $currentStep;

    public function __construct(int $step = 1)
    {
        $this->step = $step;
        $this->currentStep = $step;
    }

    public function next(): void
    {
        --$this->currentStep;
        if ($this->currentStep <= 0) {
            $this->currentStep = $this->step;
            $this->switchTo(!$this->out());
        }
    }
}
