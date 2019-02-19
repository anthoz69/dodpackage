<?php

namespace anthoz69\dodpackage;

class dodSlug
{
    public static function slug($string, $separator)
    {
        return strtolower(preg_replace('/[^A-Za-z0-9ก-เ]+/i', $separator, str_replace('&', '-and-', $string)));
    }
}
