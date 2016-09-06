<?php
    date_default_timezone_set('America/New_York');
    // date_default_timezone_set('America/Los_Angeles');

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Car.php";

    $app = new Silex\Application();

    $app->get("/", function() {
        $my_new_car = new Car("Porsche", 25, 1000, "http://gtspirit.com/wp-content/uploads/2014/08/porsche-boxster-gts-e1442738533400-696x385.jpg");
        $my_model = $my_new_car->getModel();
        $my_price = $my_new_car->getPrice();
        $my_miles = $my_new_car->getMiles();
        $my_picture = $my_new_car->getPicture();

        return "I somehow have this amazingly cheap awesome new car!" . 
          " It is a " . $my_model . 
          " with only " . $my_miles . " miles on it, " . 
          "and I only paid: $" . $my_price . "!" . 
          "<img src='". $my_picture ."'>";
    });

    return $app;
?>