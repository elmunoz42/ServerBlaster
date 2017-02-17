<?php


    require_once 'src/RepeatCounter.php';

    class RepeatCounterTest extends PHPUnit_Framework_TestCase
    {
        function test_one_lowercase_match()
        {
            $test_input_to_match = "apple";
            $test_input_to_search = "apple";
            $test_object = new RepeatCounter($test_input_to_match, $test_input_to_search);
            $result = $test_object->CountRepeats($test_input_to_match, $test_input_to_search);
            $this->assertEquals(1, $result);
        }
        function test_one_anycase_match()
        {
            $test_input_to_match = strtolower("Apple");
            $test_input_to_search = "apple";
            $test_object = new RepeatCounter($test_input_to_search, $test_input_to_match);
            $result = $test_object->CountRepeats($test_input_to_match, $test_input_to_search);
            $this->assertEquals(1, $result);
        }
    }

 ?>
