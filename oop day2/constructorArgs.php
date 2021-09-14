<?php

class car {
    private $engine;
    function __construct($direction)
    {
        $this->engine = $direction;
    }
    

    /**
     * Get the value of engine
     */ 
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * Set the value of engine
     *
     * @return  self
     */ 
    public function setEngine($engine)
    {
        $this->engine = $engine;

        return $this;
    }

    public function test()
    {
        // echo __DIR__;
        // echo __FILE__;
        // echo __CLASS__;
        // echo __METHOD__;
        // echo __FUNCTION__;
        // echo __LINE__;
    }
}

// absolute path , relative path


$bmw = new car('D');
echo $bmw->test();