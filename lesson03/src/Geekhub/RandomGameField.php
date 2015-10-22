<?php

namespace Geekhub;

class RandomGameField extends GameField
{

    function __construct($width, $height)
    {
        parent::__construct($width, $height);
    }

    protected function init()
    {
        $this->matrix = [];

        for ($i = 0; $i < $this->height; $i++) {
            $this->matrix[$i] = [];

            for ($j = 0; $j < $this->width; $j++) {
                $this->matrix[$i][$j] = (rand(0, 3) != 0) ? GameField::GAMEFIELD_EMPTY : GameField::GAMEFIELD_BLOCK;
            }
        }
    }

    public function isMovePossible($x, $y)
    {
        $result = true;

        try {
            if ($this->getAt($x, $y) != GameField::GAMEFIELD_EMPTY) {
                throw new \Exception('Move is not possible');
            }
        } catch (\Exception $e) {
            $result = false;
        }

        return $result;
    }
}