<?php

namespace Geekhub;

abstract class GameField
{
    const GAMEFIELD_EMPTY = '0';
    const GAMEFIELD_BLOCK = '1';

    protected $width;
    protected $height;
    protected $matrix;

    /**
     * @var array Actor
     */
    protected $actors;

    function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
        $this->actors = [];

        $this->init();
    }

    abstract protected function init();

    abstract public function isMovePossible($x, $y);

    /**
     * @param $x
     * @param $y
     * @return int
     * @throws \Exception
     */
    public function getAt($x, $y)
    {
        if (!isset($this->matrix[$y][$x])) {
            throw new \Exception('Out of game field bounds!');
        }

        return $this->matrix[$y][$x];
    }

    public function setAt($x, $y, $code)
    {
        $this->matrix[$y][$x] = $code;
    }

    public function printAt($x, $y)
    {
        foreach ($this->actors as $actor) {
            if (($actor->getX() == $x) && ($actor->getY() == $y)) {
                echo $actor->getCode();

                return;
            }
        }

        $code = $this->getAt($x, $y);
        echo ($code == self::GAMEFIELD_EMPTY) ? ' ' : $code;
    }

    /**
     * @param Creature $actor
     */
    public function addActor(Creature $actor)
    {
        $this->actors[] = $actor;
    }

    public function act()
    {
        foreach ($this->actors as $actor) {
            $actor->move($this);
        }
    }

    public function output()
    {
        echo '/';
        for ($j = 0; $j < $this->width; $j++) {
            echo '-';
        }
        echo '\\' . PHP_EOL;

        for ($i = 0; $i < $this->height; $i++) {
            echo '|';
            for ($j = 0; $j < $this->width; $j++) {
                $this->printAt($j, $i);
            }
            echo '|' . PHP_EOL;
        }

        echo '\\';
        for ($j = 0; $j < $this->width; $j++) {
            echo '-';
        }
        echo '/' . PHP_EOL . PHP_EOL;
    }
}
