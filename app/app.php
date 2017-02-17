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

    // ROOT form page
    $app->get("/", function() use($app) {


        return $app['twig']->render('repeat-counter-form.html.twig');

    });

    // word match page
    $app->post("/display", function() use($app) {


        $newWordProcess = new RepeatCounter($_POST['word_to_match'], $_POST['word_to_search']);
        $exactMatches = $newWordProcess->CountExactRepeats($this->text_to_find, $this->text_to_search);
        $allMatches = $newWordProcess->CountRepeats($this->text_to_find, $this->text_to_search);
        // $newText = $newWordProcess->TextReplace($this->text_to_find, $this->text_to_search, $_POST['word_to_replace']);
        return $app['twig']->render('repeat-counter-display.html.twig', array('newWordProcess'=>$newWordProcess));

    });

    // public $text_to_find;
    // public $text_to_search;
    // $app->post("/display", function() use($app) {
    //
    //     $newReplacementWord = $_POST['word_to_replace'];
    //     $newWordProcess = new RepeatCounter($_POST['word_to_match'], $_POST['word_to_search']);
    //     return $app['twig']->render('repeat-counter-display.html.twig', array());
    //
    // });
     return $app;
?>
