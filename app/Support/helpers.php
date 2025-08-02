<?php

if (!function_exists('now')) {
    function now(): DateTime
    {
        return new DateTime();
    }
}

if (!function_exists('today')) {
    function today(): DateTime
    {
        return new DateTime('today');
    }
}

if (!function_exists('collect')) {
    function collect(array $items = []): \Refynd\Database\Collection
    {
        return new \Refynd\Database\Collection($items);
    }
}
