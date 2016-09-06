<?php 
class Car
{
    private $make_model;
    private $price;
    private $miles;
    private $picture;
    function __construct($input_model, $input_miles, $input_price, $input_picture)
    {
        $this->price = $input_price;
        $this->miles = $input_miles;
        $this->make_model = $input_model;
        $this->picture = $input_picture;
    }
    function getPrice()
    {
        return $this->price;   
    }
    function getMiles()
    {
        return $this->miles;
    }
    function getModel()
    {
        return $this->make_model;
    }
    function getPicture()
    {
        return $this->picture;
    }
    function setPicture($new_picture)
    {
        $this->picture = (string) $new_picture;
    }
    function setPrice($new_price)
    {
        $this->price = (float) $new_price;
    }
    function setMiles($new_miles)
    {
        $this->miles = (int) $new_miles;
    }
    function setModel($new_model)
    {
        $this->make_model = (string) $new_model;
    }
    function worthBuying($max_price, $max_mileage)
    {
        if ($this->price < ($max_price + 100) && $this->miles < $max_mileage) {
            return true;
        }
    }
}