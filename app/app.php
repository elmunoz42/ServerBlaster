<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/RepeatCounter.php";

    use Symfony\Component\Debug\Debug;
    Debug::enable();

    $app = new Silex\Application();

    $app['debug']=true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    // ROOT form page
    $app->get("/", function() use($app) {

        $commands = RepeatCounter::joinBlaster(['account', 'course', 'image', 'lesson', 'school', 'service', 'student', 'teacher']);
        $commands2 = RepeatCounter::joinBlaster2(['account', 'course', 'image', 'lesson', 'school', 'service', 'student', 'teacher']);
        return $app['twig']->render('repeat-counter-form.html.twig', array( 'commands'=>$commands, 'commands2'=>$commands2 ));

    });


     return $app;
?>
