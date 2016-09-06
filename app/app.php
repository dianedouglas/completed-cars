<?php
    date_default_timezone_set('America/New_York');
    // date_default_timezone_set('America/Los_Angeles');
    
    require_once __DIR__."/../vendor/autoload.php";

    $app = new Silex\Application();

    $app->get("/", function() {
        return "Hi there!";
    });

    return $app;
?>