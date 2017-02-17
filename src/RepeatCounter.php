<?php
class RepeatCounter
{
    private $text_to_find;
    private $text_to_search;
    private $count;

    function __construct($new_text_to_find, $new_text_to_search)
    {
        $this->text_to_find = $new_text_to_find;
        $this->text_to_search = $new_text_to_search;
        $this->count = $count;
    }
    function CountRepeats($new_text_to_find, $new_text_to_search)
    {
        return "test";
    }

    function setTextToFind( $new_text_to_find )
    {
        $this->text_to_find = (string) $new_text_to_find;
    }
    function getTextToFind()
    {
        return $this->text_to_find;
    }
}

 ?>
