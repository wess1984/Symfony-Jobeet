<?php
class Jobeet
{
    static public function slugify($text)
    {
        // replace all letters or non-digits by -
        $text = preg_replace('/\W+/', '-', $text);

        // trim and lower case
        $text = strtolower(trim($text, '-'));

        return $text;
    }
}

?>
