<?php

function setComma($number, $percision = 2) {
    if ($percision === 0) {
        return number_format($number, 0, '.', ',');
    }
    return number_format($number, $percision, '.', ',');
}
