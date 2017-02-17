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
        // $to_search_array = str_split($new_text_to_search);
        // $this->count = array_search($to_search_array);

        if ($new_text_to_find == $new_text_to_search){
            $this->count++;
        }
        return $this->count;
    }

    function setTextToFind( $new_text_to_find )
    {
        $this->text_to_find = strtolower( (string) $new_text_to_find);
    }
    function getTextToFind()
    {
        return $this->text_to_find;
    }
}

 ?>
