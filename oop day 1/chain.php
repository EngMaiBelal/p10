<?php 

class car {
    public $color;

    public function increaseBlack()
    {
        $this->color .= ' + black';
        return $this;
    }

    public function increaseWhite()
    {
        $this->color .= ' + wihte';
        return $this;
    }
}

$object = new car;
$object->color = 'blue';
// $object->increaseBlack();
// $object->increaseBlack();
// $object->increaseBlack();
// $object->increaseWhite();

$object->increaseBlack()->increaseBlack()->increaseBlack()->increaseWhite();

// $('p').click().hover().on().

print_r($object->color);

// $x = 'blue';
// $x.= ' + black';
// $x.= ' + black';
// $x.= ' + black';
// $x.= ' + white';

// print_r($x);

// $x = 'blue';

// $x = $x  . ' + black';
// $x .= '+ black';
// $x = $x . ' + green ';
// $x .= '+ green';
