<?php

declare(strict_types=1);

namespace Tests\AlephTools\LogicCircuit;

use AlephTools\LogicCircuit\Input\Sig;
use LogicException;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
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
        self::assertTrue($sig->out());

        $sig->switchTo(true);
        self::assertTrue($sig->out());

        $sig->switchTo(false);
        self::assertFalse($sig->out());

        $sig->switchTo(false);
        self::assertFalse($sig->out());
    }
}
