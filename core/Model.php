<?php

namespace core;

class Model 
{
    public $attributes;

    public function __get($name)
    {
        if (isset($this->attributes[$name]))
            return $this->attributes[$name];
        return null;
    }

}