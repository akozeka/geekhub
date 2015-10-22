<?php

namespace Geekhub;

class DumbCreature extends Creature
{

    public function __construct($x, $y)
    {
        parent::__construct($x, $y);

        $this->code = 'D';
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

        // Else be sad and stop forever :)
        return [0, 0];
    }

}
