<?php

namespace Geekhub;

interface MovableInterface
{
    /**
     * @param $gameField GameField
     * @return bool
     */
    public function move($gameField);
}
