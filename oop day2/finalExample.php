<?php


// classes have different functionality while sharing a common interface 

// function areaCalc ($shape) {
//     if($shape == 'rect') {
//         $area = $length * $width;
//     }else {
//         $area = pi() * ($r ** 2);
//     }
// }

interface shape {
    function area ();
}

class parentSquareRect {
    public $width;
}

class square extends parentSquareRect  implements shape {
    public function area()
    {
        return $this->width * $this->width;
    }
}


class rect extends parentSquareRect implements shape {
    public $length;
    public function area()
    {
        return $this->width * $this->length;
    }
}

class cir implements shape {
    public $r;
    public function area()
    {
        return pi() * ($this->r ** 2);
    }
}