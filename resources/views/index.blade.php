<?php
class Fruit
{
    public $name;

    function __construct($name)
    {
        $this->name = $name;
    }

    function get_fruit()
    {
        echo $this->name;

        // return $this->name;
    }
}

$grapes = new Fruit('grapes');

$grapes->get_fruit();
?>
