<?php

function getMonthListTH($index, $short = false)
{
    $fullMonth = [
        '',
        'มกราคม',
        'กุมภาพันธ์',
        'มีนาคม',
        'เมษายน',
        'พฤษภาคม',
        'มิถุนายน',
        'กรกฎาคม',
        'สิงหาคม',
        'กันยายน',
        'ตุลาคม',
        'พฤศจิกายน',
        'ธันวาคม',
    ];
    $shortMonth = [
        '',
        'ม.ค.',
        'ก.พ.',
        'มี.ค.',
        'เม.ย.',
        'พ.ค.',
        'มิ.ย.',
        'ก.ค.',
        'ส.ค.',
        'ก.ย.',
        'ต.ค.',
        'พ.ย.',
        'ธ.ค.',
    ];
    if ($short) {
        return $shortMonth[$index];
    }
    return $fullMonth[$index];
}

function getDateTH($strDate, $fullMonth = false, $time = false)
{
    $year = date('Y', strtotime($strDate)) + 543;
    $month = date('n', strtotime($strDate));
    $day = date('j', strtotime($strDate));
    $hour = date('H', strtotime($strDate));
    $minute = date('i', strtotime($strDate));

    $month = getMonthListTH($month, $fullMonth);

    if ($time) {
        return "$day $month $year $hour:$minute";
    }
    return "$day $month $year";
}

function getTimeFromDate($strDate, $second = true)
{
    $hour = date('H', strtotime($strDate));
    $minute = date('i', strtotime($strDate));
    $seconds = date('s', strtotime($strDate));

    if ($second) {
        return "$hour:$minute:$seconds";
    }
    return "$hour:$minute";
}
