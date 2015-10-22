<?php

namespace Geekhub;

class Game
{
    use Logger;

    /**
     * @var string
     */
    private $name;

    /**
     * @var object GameField
     */
    private $field;

    /**
     * @var callable
     */
    private $loggerFunc;

    function __construct($name)
    {
        $this->setName($name);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param callable $loggerFunc
     */
    public function setLoggerFunc($loggerFunc)
    {
        $this->loggerFunc = $loggerFunc;
    }

    public function start()
    {
        $this->log("Game '{$this->name}' started.");

        $this->field = new RandomGameField(10, 10);
        $this->field->addActor(new DumbCreature(5, 5));
        $this->field->addActor(new AdvancedCreature(4, 4));

        for ($i = 0; $i < 10; $i++) {
            $this->field->act();
            $this->field->output();
        }
    }
}
