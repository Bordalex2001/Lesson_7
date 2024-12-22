<?php
namespace App;
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

    public static function searchByName($products, $name)
    {
        foreach ($products as $product)
        {
            if (strcasecmp($product->name, $name) == 0)
            {
                return $product;
            }
        }
        return null;
    }
}