<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Geekhub\Game;

$isCli = (php_sapi_name() == 'cli');
if (!$isCli) {
    header('Content-Type: text/plain');
}


$game = new Game('GeekHUB OOP example');
$game->setLoggerFunc(function ($str) {
    echo $str . PHP_EOL;
});
$game->start();
