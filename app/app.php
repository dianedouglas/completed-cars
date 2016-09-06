<?php
    date_default_timezone_set('America/New_York');
    // date_default_timezone_set('America/Los_Angeles');

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Car.php";

    $app = new Silex\Application();

    $app->get("/mycar", function() {
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

    $app->get("/cars", function() {
      // Create car objects just as we did in the old version of Car.php
      // But this time use the constructor, and add images.
      $porsche = new Car("2014 Porsche 911", 7864, 114991, "http://starmoz.com/images/porsche-911-2014-14.jpg");
      $ford = new Car("2011 Ford F450", 14241, 55995, "https://i.ytimg.com/vi/Mw5J4twknwg/hqdefault.jpg");
      $lexus = new Car("2013 Lexus RX 350", 20000, 44700, "http://spidercars.net/wp-content/uploads/images/2013-Lexus-RX-350_4823.jpg");
      $mercedes = new Car("Mercedes Benz CLS550", 37979, 39900, "http://media.caranddriver.com/images/11q3/410461/2012-mercedes-benz-cls550-photo-410479-s-429x262.jpg");

      $cars = array($porsche, $ford, $lexus, $mercedes);
      $output = '';

        foreach ($cars as $car) {
          $model = $car->getModel();
          $price = $car->getPrice();
          $miles = $car->getMiles();
          $picture = $car->getPicture();
          $output .= "<h3> Here is a " . $model . "</h3>"; 
          $output .= "<p> with only " . $miles . " miles on it, </p>"; 
          $output .= "<p>and it only costs: $" . $price . "!</p>"; 
          $output .= "<img src='". $picture ."'>";
        }

      return $output;
    });

    return $app;
?>