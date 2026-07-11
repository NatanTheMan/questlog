<?php

require_once __DIR__ . '/../vendor/autoload.php';

use QuestLog\Router;

$router = new Router();

$router->get("/", function () {
    echo "Home";
});

$router->get("/habits", function () {
    echo "Habits list";
});

$router->dispatch();
