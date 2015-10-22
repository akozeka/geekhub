<?php

namespace Geekhub;

trait Logger
{
    public function log($str)
    {
        if (isset($this->loggerFunc)) {
            $func = $this->loggerFunc;
            $func($str);
            // Strange, but code below doesn't work :(
            // $this->loggerFunc($str);
        }
    }
}
