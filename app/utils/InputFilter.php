<?php

namespace App\utils;

class InputFilter
{

    public static function htmlEscape(string $inputValue): string
    {
        return htmlentities($inputValue);
    }


}
