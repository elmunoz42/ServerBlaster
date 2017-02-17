<?php
class RepeatCounter
{
    public $text_to_find;
    public $text_to_search;
    public $count;

    function __construct($new_text_to_find, $new_text_to_search)
    {
        $this->text_to_find = $new_text_to_find;
        $this->text_to_search = $new_text_to_search;
        $this->count = $count;
    }
    function CountRepeats($new_text_to_find, $new_text_to_search)
    {
        $this->count = 0;
        $input_to_find = strtolower( (string) $new_text_to_find);
        $input_to_search = strtolower( (string) $new_text_to_search);
        $input_no_possessive = implode(" ", explode("'", $input_to_search));
        $to_search_array = explode(" ", $input_no_possessive );

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

    function getTextToFind()
    {
        return $this->text_to_find;
    }
}

 ?>
