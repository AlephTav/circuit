<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use AlephTools\LogicCircuit\Input\Sig;
use AlephTools\LogicCircuit\Latch\DLatch;

$dLatch = new DLatch();

$eSig = new Sig();
$dSig = new Sig();

$eSig->tieTo($dLatch, 'e');
$dSig->tieTo($dLatch, 'd');

$iterate = function(bool $e, bool $d) use ($eSig, $dSig, $dLatch)
{
    $eSig->switchTo($e);
    $dSig->switchTo($d);

    echo (int)$eSig->out() . ' | ';
    echo (int)$dSig->out() . ' | ';
    echo (int)$dLatch->out('q') . ' | ';
    echo (int)$dLatch->out('!q') . PHP_EOL;
};

echo 'D-Latch' . PHP_EOL;
echo '--------' . PHP_EOL;
echo 'E | D | Q | !Q' . PHP_EOL;

$iterate(true, false);
$iterate(true, true);
$iterate(true, false);
$iterate(true, true);
$iterate(false, false);
$iterate(false, true);
$iterate(true, false);
$iterate(false, true);
$iterate(false, false);