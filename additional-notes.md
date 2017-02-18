
NOTE A)

tryed to solve issue of punctuation after a possessive:

test that fails:
function test_TextReplacePonctuation_poss()
{
    $test_input_to_match = "orange";
    $test_input_to_search = "Apple, banana's, orange.";
    $test_input_to_replace = "fig";
    $test_object = new RepeatCounter($test_input_to_match, $test_input_to_search);
    $result = $test_object->TextReplace($test_input_to_match, $test_input_to_search, $test_input_to_replace);
    // $this->assertEquals(16, $result);
    $this->assertEquals("Apple, banana's, fig.", $result);

}

// solution I'm trying... insert into
if ($output_array_w_spaces[$y+1] == "," && $output_array_w_spaces[$y] == " " |
        $output_array_w_spaces[$y+1] == "." && $output_array_w_spaces[$y] == " " |
        $output_array_w_spaces[$y+1] == "?" && $output_array_w_spaces[$y] == " "
        )
{
  array_splice($output_array_w_spaces, $y-1, 2, "");
  array_splice($output_array_w_spaces, $y, 2, "");
}
