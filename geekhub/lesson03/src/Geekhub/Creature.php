<?php

namespace Geekhub;

abstract class Creature implements MovableInterface
{

    protected $x;
    protected $y;
    protected $code;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
        $this->code = '?';
    }

    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function move($gameField)
    {
        list($dx, $dy) = $this->getMoveVector($gameField);

        $this->x += $dx;
        $this->y += $dy;
    }

    abstract public function getMoveVector($gameField);
}
