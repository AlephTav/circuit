<?php

namespace Tests\AlephTools\LogicCircuit;

use LogicException;
use AlephTools\LogicCircuit\Input\Sig;
use PHPUnit\Framework\TestCase;

class SigTest extends TestCase
{
    /**
     * @test
     */
    public function readNotActivatedSignal(): void
    {
        $this->expectException(LogicException::class);

        (new Sig())->out();
    }

    /**
     * @test
     */
    public function readSignal(): void
    {
        $sig = new Sig();

        $sig->switchTo(true);
        $this->assertTrue($sig->out());

        $sig->switchTo(true);
        $this->assertTrue($sig->out());

        $sig->switchTo(false);
        $this->assertFalse($sig->out());

        $sig->switchTo(false);
        $this->assertFalse($sig->out());
    }
}