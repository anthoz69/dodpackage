<?php

function youtubeID($url) {
    $regex = "/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/";
    preg_match($regex, $url, $matches);

    return $matches[1];
}

function vimeoID($url) {
    $regexstr = "/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/";
    preg_match($regexstr, $url, $matches);
    return $matches[5];
}
