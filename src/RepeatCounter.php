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
        // $to_search_array = str_split($new_text_to_search);


        if ($input_to_find == $new_text_to_search){
            $this->count++;
        }
        if ($this->count==1) {
            return $this->count . ' match';
        }else{
            return $this->count . ' matches';
        }
    }

    function setTextToFind( $new_text_to_find )
    {
        $this->text_to_find = strtolower($new_text_to_find);
    }
    function getTextToFind()
    {
        return $this->text_to_find;
    }
}

 ?>
