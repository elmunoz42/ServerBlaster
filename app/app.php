<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/RepeatCounter.php";

    session_start();

    if (empty($_SESSION[''])) {
        $_SESSION[''] = array();
    }

    $app = new Silex\Application();

    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));


    $app->get("/", function() use($app) {


        return $app['twig']->render('repeat-counter-form.html.twig');

    });
    $app->post("/display", function() use($app) {


        return $app['twig']->render('repeat-counter-display.html.twig');

    });

     return $app;
?>
