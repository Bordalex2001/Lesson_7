<?php

class Product
{
    public $name;
    public $price;

    function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
    function getProduct()
    {
        return $this->name . ": $" . $this->price;
    }
}