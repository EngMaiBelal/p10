<?php

interface operation {
    function eat ();
    function drink ();
    function play();
}

class animal {
    public function eat()
    {
       echo "eat general food";
    }

    public function drink()
    {
       echo "drink water";
    }
}

class cat extends animal implements operation {
    public function play()
    {
        echo "ball";
    }
}

class dog extends cat implements operation {
   
}


