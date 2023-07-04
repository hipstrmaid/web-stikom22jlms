<?php

function extractVideo($url)
{
    $pattern = '/^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:watch\?v=|embed\/|v\/|ytscreeningroom\?v=|youtube\.com\/v\/|youtube\.com\/embed\/|youtu\.be\/|youtube\.com\/ytscreeningroom\?.+?vi?=|youtube\.com\/user\/.+?#\w\/\w\/\w\/\w\/)|youtu\.be\/)([^?&\n#]+)/';
    preg_match($pattern, $url, $matches);

    if (isset($matches[1])) {
        return $matches[1];
    }

    return null;
}
