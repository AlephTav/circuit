<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use AlephTools\LogicCircuit\Input\Sig;
use AlephTools\LogicCircuit\Latch\RSLatch;

$rsLatch = new RSLatch();

$rSig = new Sig();
$sSig = new Sig();

$rSig->tieTo($rsLatch, 'r');
$sSig->tieTo($rsLatch, 's');

$iterate = function(bool $r, bool $s) use ($rSig, $sSig, $rsLatch)
{
    $rSig->switchTo($r);
    $sSig->switchTo($s);

    echo (int)$sSig->out() . ' | ';
    echo (int)$rSig->out() . ' | ';
    echo (int)$rsLatch->out('q') . ' | ';
    echo (int)$rsLatch->out('!q') . PHP_EOL;
};

echo 'RS-Latch' . PHP_EOL;
echo '--------' . PHP_EOL;
echo 'S | R | Q | !Q' . PHP_EOL;

$iterate(true, false);
$iterate(false, true);
$iterate(true, false);
$iterate(false, false);
$iterate(false, true);
$iterate(false, false);
$iterate(true, true);
$iterate(true, false);