<?php

function substr_format($text, $length, $replace='..', $encoding='UTF-8')
{
    if ($text && mb_strlen($text, $encoding) > $length) {
        return mb_substr($text, 0, $length, $encoding) . $replace;
    }
    return $text;
}