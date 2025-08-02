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

if (!function_exists('view')) {
    function view(string $template, array $data = []): string
    {
        global $container;
        $prism = $container->make(\Refynd\Prism\PrismEngine::class);
        return $prism->render($template, $data);
    }
}

if (!function_exists('response')) {
    function response(string $content = '', int $status = 200, array $headers = []): \Symfony\Component\HttpFoundation\Response
    {
        return new \Symfony\Component\HttpFoundation\Response($content, $status, $headers);
    }
}
