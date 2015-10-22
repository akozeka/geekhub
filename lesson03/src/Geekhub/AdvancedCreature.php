<?php

namespace Geekhub;

class AdvancedCreature extends Creature
{

    public function __construct($x, $y)
    {
        parent::__construct($x, $y);

        $this->code = 'A';
    }

    public function getMoveVector($gameField)
    {
        // Do nothing - everything already done :)
        if ($this->x == 0) {
            return [0, 0];
        }

        // Always to the left until reach end of game field if possible
        if ($gameField->isMovePossible($this->x - 1, $this->y)) {
            return [-1, 0];
        }

        // Otherwise try to go up
        if ($gameField->isMovePossible($this->x, $this->y - 1)) {
            return [0, -1];
        }

        // Otherwise try to go down
        if ($gameField->isMovePossible($this->x, $this->y + 1)) {
            return [0, 1];
        }

        // Otherwise try to go to the right
        if ($gameField->isMovePossible($this->x + 1, $this->y)) {
            return [1, 0];
        }

        // Else - stay forever :)
        return [0, 0];
    }

}
