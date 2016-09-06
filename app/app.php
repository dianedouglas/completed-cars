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

    $app->get("/car_form", function(){
        return "
        <!DOCTYPE html>
        <html>
        <head>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
            <title>Find a Car</title>
        </head>
        <body>
            <div class='container'>
                <h1>Find a Car!</h1>
                <form action='/cars'>
                    <div class='form-group'>
                        <label for='price'>Enter Maximum Price:</label>
                        <input id='price' name='price' class='form-control' type='number'>
                    </div>
                    <div class='form-group'>
                        <label for='mileage'>Enter Maximum Mileage:</label>
                        <input id='mileage' name='mileage' class='form-control' type='number'>
                    </div>
                    <button type='submit' class='btn-success'>Submit</button>
                </form>
            </div>
        </body>
        </html>

        ";
    });

    $app->get("/cars", function() {
        // Create car objects just as we did in the old version of Car.php
        // But this time use the constructor, and add images.
        $porsche = new Car("2014 Porsche 911", 7864, 114991, "http://starmoz.com/images/porsche-911-2014-14.jpg");
        $ford = new Car("2011 Ford F450", 14241, 55995, "https://i.ytimg.com/vi/Mw5J4twknwg/hqdefault.jpg");
        $lexus = new Car("2013 Lexus RX 350", 20000, 44700, "http://spidercars.net/wp-content/uploads/images/2013-Lexus-RX-350_4823.jpg");
        $mercedes = new Car("Mercedes Benz CLS550", 37979, 39900, "http://media.caranddriver.com/images/11q3/410461/2012-mercedes-benz-cls550-photo-410479-s-429x262.jpg");

        $cars = array($porsche, $ford, $lexus, $mercedes);

        // get price from form input field same as in old Car.php
        $user_price = $_GET["price"]; 
        $user_mileage = $_GET["mileage"]; 
        // create array to hold the cars that match the search criteria.
        $cars_matching_search = array();
        foreach ($cars as $car) {
            if ($car->worthBuying($user_price, $user_mileage)) {
                array_push($cars_matching_search, $car);
            }
        }

        $output = '';

        // display the cars that match the search instead of all the cars in the $cars array.

        foreach ($cars_matching_search as $car) {
            $model = $car->getModel();
            $price = $car->getPrice();
            $miles = $car->getMiles();
            $picture = $car->getPicture();
            $output .= "<h3> Here is a " . $model . "</h3>"; 
            $output .= "<p> with only " . $miles . " miles on it, </p>"; 
            $output .= "<p>and it only costs: $" . $price . "!</p>"; 
            $output .= "<img src='". $picture ."'>";
        }

        if(empty($cars_matching_search)) {
            $output = "Sorry, no cars match your search. Try again!";
        }

        return $output;
    });

    return $app;
?>