<?php 
class Car
{
    private $make_model;
    private $price;
    private $miles;
    function __construct($input_model, $input_miles, $input_price)
    {
        $this->price = $input_price;
        $this->miles = $input_miles;
        $this->make_model = $input_model;
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
    function worthBuying($max_price)
    {
        return $this->price < ($max_price + 100);
    }
}