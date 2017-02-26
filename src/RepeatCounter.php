<?php
class RepeatCounter
{
    private $text_to_find;
    private $text_to_search;
    private $count;
    private $count_exact;
    private $replacement_count;

    function __construct($new_text_to_find, $new_text_to_search)
    {
        $this->text_to_find = $new_text_to_find;
        $this->text_to_search = $new_text_to_search;
        $this->count;
        $this->count_exact;
        $this->replacement_count;

    }

    // getters and setters
    function setTextToFind($new_text_to_find)
    {
        $this->text_to_find = $new_text_to_find;
    }
    function getTextToFind()
    {
        return $this->text_to_find;
    }
    function setTextToSearch($new_text_to_search)
    {
        $this->text_to_search = $new_text_to_search;
    }
    function getTextToSearch()
    {
        return $this->text_to_search;
    }
    function setCount($new_count)
    {
        $this->count = (int) $new_count;
    }
    function getCount()
    {
        return $this->count;
    }
    function setCountExact($new_count_exact)
    {
        $this->count_exact = (int) $new_count_exact;
    }
    function getCountExact()
    {
        return $this->count_exact;
    }
    function setReplacementCount($new_replacement_count)
    {
        // $this->replacement_count = (int) $new_replacement_count;
    }
    function getReplacementCount()
    {
        // return $this->replacement_count;
    }


    // Methods
    function CountRepeats($new_text_to_find, $new_text_to_search)
    {
        $this->setCount(0);
        $input_to_find = strtolower( (string) $new_text_to_find);
        $input_to_search = strtolower( (string) $new_text_to_search);
        $input_no_punctuation_possessives =implode(" !", explode("!", implode(" ?",(explode("?",(implode (" .", (explode(".",implode(" ,", (explode(",",implode(" ' ", explode("'", $input_to_search))))))))))))));

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
        $input_no_punctuation_possessives =implode(" !", explode("!", implode(" ?",(explode("?",(implode (" .", (explode(".",implode(" ,", (explode(",",implode(" ' ", explode("'", $input_to_search))))))))))))));
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
        $input_no_punctuation_possessives =implode(" !", explode("!", implode(" ?",(explode("?",(implode (" .", (explode(".",implode(" ,", (explode(",",implode(" ' ", explode("'", $input_to_search))))))))))))));
        $to_search_array = explode(" ", $input_no_punctuation_possessives );
        $x=0;
        foreach ( $to_search_array as $word ){
            if ( $input_to_find == $word){
                array_splice($to_search_array, $x, 1, $replacement_text );
                $this->replacement_count++;
            }
            elseif ( $word=="," || $word=="." || $word=="?" || $word=="!") {
                // will attach punctuation back to the previous word.
                $previous_word_w_punctuation = $to_search_array[$x-1] . $word ;
                array_splice($to_search_array, $x-1, 1,$previous_word_w_punctuation);
                array_splice($to_search_array, $x, 1, "");
            }
            elseif ($word=="'")
            {
              $previous_word_w_punctuation = $to_search_array[$x-1] . $word . $to_search_array[$x+1];
              array_splice($to_search_array, $x-1, 1,$previous_word_w_punctuation);
              array_splice($to_search_array, $x, 1, ""); // erase the duplicate single quote.
              array_splice($to_search_array, $x+1, 1, ""); // erase the duplicate possessive letter.
            }
            $x++;
        }
        $output_array_w_spaces = str_split(implode(" ", $to_search_array));
        $output_array = array();
        $y=0;
        // will erase space after and before a punctuation.
        foreach ( $output_array_w_spaces as $characters ) {
          if ( $output_array_w_spaces[$y] == " " && $output_array_w_spaces[$y-1] == " "){
            array_splice($output_array_w_spaces, $y, 1, "");
          }

          /// NOTE A) -> see additional-notes.md note A)

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

}

 ?>
