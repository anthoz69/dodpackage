<?php

function getYoutubeId($url)
{
    $regex = "/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/";

    if (preg_match($regex, $url, $matches)) {
        return $matches[1];
    } else {
        return null;
    }
}

function getVimeoId($url)
{
    $regex = "/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/";

    if (preg_match($regex, $url, $matches)) {
        return $matches[5];
    } else {
        return null;
    }
}
