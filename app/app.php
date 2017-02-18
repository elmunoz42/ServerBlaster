<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/RepeatCounter.php";

    // session_start();
    //
    // if (empty($_SESSION[''])) {
    //     $_SESSION[''] = array();
    // }

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
        $newWordToMatch = $_POST['word_to_match'];
        $newWordToSearch = $_POST['word_to_search'];
        $newWordToReplace = $_POST['word_to_replace'];
        $exactMatches = $newWordProcess->CountExactRepeats($newWordToMatch, $newWordToSearch);
        $allMatches = $newWordProcess->CountRepeats($newWordToMatch, $newWordToSearch);
        if ( $newWordToReplace == "" ){
            $newText = $newWordProcess->TextReplace($newWordToMatch, $newWordToSearch, $newWordToMatch);
        }else{
        $newText = $newWordProcess->TextReplace($newWordToMatch, $newWordToSearch, $newWordToReplace);
        }
        return $app['twig']->render('repeat-counter-display.html.twig', array( 'exactMatches'=>$exactMatches, 'allMatches'=>$allMatches, 'newText' => $newText ));

    });

     return $app;
?>
