<?php
require_once __DIR__ . '/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/src/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => __DIR__ . '/twig_cache',
]);

echo $twig->render('example.html', ['name' => 'Lola']);