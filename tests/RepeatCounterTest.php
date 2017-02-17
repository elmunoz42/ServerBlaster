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
            $this->assertEquals(1 . ' match', $result);
        }
        function test_one_anycase_match()
        {
            $test_input_to_match = "Apple";
            $test_input_to_search = "apple";
            $test_object = new RepeatCounter($test_input_to_match, $test_input_to_search);
            $result = $test_object->CountRepeats($test_input_to_match, $test_input_to_search);
            $this->assertEquals(1 . ' match', $result);
        }
        function test_zero_matches()
        {
            $test_input_to_match = "apple";
            $test_input_to_search = "orange";
            $test_object = new RepeatCounter($test_input_to_match, $test_input_to_search);
            $result = $test_object->CountRepeats($test_input_to_match, $test_input_to_search);
            $this->assertEquals(0 . ' matches', $result);
        }
        function test_multiple_matches()
        {
            $test_input_to_match = "apple";
            $test_input_to_search = "The Apple logo is meaningful because it alludes to the apple in the tree of knowledge.";
            $test_object = new RepeatCounter($test_input_to_match, $test_input_to_search);
            $result = $test_object->CountRepeats($test_input_to_match, $test_input_to_search);
            $this->assertEquals(2 . ' matches', $result);

        }
        function test_multiple_matches_possessive()
        {
            $test_input_to_match = "apple";
            $test_input_to_search = "Apple's logo is meaningful because it alludes to the apple in the tree of knowledge.";
            $test_object = new RepeatCounter($test_input_to_match, $test_input_to_search);
            $result = $test_object->CountRepeats($test_input_to_match, $test_input_to_search);
            $this->assertEquals(2 . ' matches', $result);

        }

        function test_case_specific_option()
        {
            $test_input_to_match = "apple";
            $test_input_to_search = "The Apple logo is meaningful because it alludes to the apple in the tree of knowledge.";
            $test_object = new RepeatCounter($test_input_to_match, $test_input_to_search);
            $result = $test_object->CountExactRepeats($test_input_to_match, $test_input_to_search);
            $this->assertEquals(1 . ' exact match', $result);

        }
        function test_TextReplace()
        {
            $test_input_to_match = "apple";
            $test_input_to_search = "The Apple logo is meaningful because it alludes to the apple in the tree of knowledge.";
            $test_input_to_replace = "orange";
            $test_object = new RepeatCounter($test_input_to_match, $test_input_to_search);
            $result = $test_object->CountExactRepeats($test_input_to_match, $test_input_to_search);
            $this->assertEquals("The Apple logo is meaningful because it alludes to the orange in the tree of knowledge.", $result);

        }
    }

 ?>
