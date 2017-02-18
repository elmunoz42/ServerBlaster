<?php
class RepeatCounter
{
    public $text_to_find;
    public $text_to_search;
    public $count;
    public $count_exact;
    public $replacement_count;

    function __construct($new_text_to_find, $new_text_to_search)
    {
        $this->text_to_find = $new_text_to_find;
        $this->text_to_search = $new_text_to_search;
        $this->count = $count;
        $this->count_exact = $count_exact;
        $this->replacement_count = $replacement_count;

    }
    function CountRepeats($new_text_to_find, $new_text_to_search)
    {
        $this->count = 0;
        $input_to_find = strtolower( (string) $new_text_to_find);
        $input_to_search = strtolower( (string) $new_text_to_search);
        $input_no_punctuation_possessives =implode (" ", (explode(".",implode(" ", (explode(",",implode(" ", explode("'", $input_to_search))))))));

        $to_search_array = explode(" ", $input_no_punctuation_possessives );
        foreach ( $to_search_array as $word ){
            if ( $input_to_find == $word){
                $this->count++;
            }
        }
        if ($this->count==1) {
            return $this->count . ' match';
        }else{
            return $this->count . ' matches';
        }
    }

    function CountExactRepeats($new_text_to_find, $new_text_to_search)
    {
        $this->count_exact = 0;
        $input_to_find = (string) $new_text_to_find;
        $input_to_search = (string) $new_text_to_search;
        $input_no_punctuation_possessives =implode (" ", (explode(".",implode(" ", (explode(",",implode(" ", explode("'", $input_to_search))))))));
        $to_search_array = explode(" ", $input_no_punctuation_possessives );
        foreach ( $to_search_array as $word ){
            if ( $input_to_find == $word){
                $this->count_exact++;
            }
        }
        if ($this->count_exact==1) {
            return $this->count_exact . ' exact match';
        }else{
            return $this->count_exact . ' exact matches';
        }
    }

    // CASE SENSITIVE!
    function TextReplace($new_text_to_find, $new_text_to_search, $replacement_text)
    {
        $this->replacement_count = 0;
        $input_to_find = (string) $new_text_to_find;
        $input_to_search = (string) $new_text_to_search;
        $input_no_punctuation_possessives =implode (" .", (explode(".",implode(" ,", (explode(",",implode(" '", explode("'", $input_to_search))))))));
        $to_search_array = explode(" ", $input_no_punctuation_possessives );
        $x=0;
        foreach ( $to_search_array as $word ){
            if ( $input_to_find == $word){
                array_splice($to_search_array, $x, 1, $replacement_text);
                $this->replacement_count++;
            }
            elseif ( $word=="," || $word=="'" || $word==".") {
                // will attach punctuation back to the previous word... hopefully.
                $previous_word_w_punctuation = $to_search_array[$x-1] . $word ;
                array_splice($to_search_array, $x-1, 1, $previous_word_w_punctuation );
                array_splice($to_search_array, $x, 1, "");

            }
            $x++;
        }
        $output_array_w_spaces = str_split(implode(" ", $to_search_array));
        $output_array = array();
        $y=0;
        // will erase space after a punctuation.
        foreach ( $output_array_w_spaces as $characters ) {
          if ( $output_array_w_spaces[$y] == " " && $output_array_w_spaces[$y-1] == " "){
            array_splice($output_array_w_spaces, $y, 1, "");
          }
          $y++;
        }
        // will erase space after final punctuation.
        if ($output_array_w_spaces[count($output_array_w_spaces)-1]==" "){
           array_pop($output_array_w_spaces);
        }
        $output_string = implode("",$output_array_w_spaces);
        return $output_string;

        // I WILL NEVER SAY ANYTHING BAD ABOUT REG EX EVER EVER EVER!!
    }
    function getTextToFind()
    {
        return $this->text_to_find;
    }
    function getTextToSearch()
    {
        return $this->text_to_search;
    }

}

 ?>
