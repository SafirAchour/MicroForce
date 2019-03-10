<?php

use Symfony\Component\Templating\PhpEngine;

return [
    'template_engine' => PhpEngine::class,
    'template_location' => realpath(__DIR__ . '/../views'),
    'DB' => [
        'host' => '127.0.0.1',
        'dbname' => 'microforce',
        'user' => 'root',
        'password' => null
    ]
];
