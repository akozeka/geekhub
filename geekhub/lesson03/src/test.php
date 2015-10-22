<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Geekhub\Game;

$game = new Game('GeekHUB OOP example');
$game->setLoggerFunc(function ($str) {
    echo $str . PHP_EOL;
});
$game->start();
