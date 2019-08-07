<?php

function setCurrency($number, $percision = 2)
{
    return number_format(floor($number * 100) / 100, $percision, '.', ',');
}
