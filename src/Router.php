<?php

namespace QuestLog;

class Router
{
    private array $routes = [];

    public function get(string $path, callable $call): void
    {
        $this->addRoute($path, $call);
    }

    private function addRoute(string $path, callable $call): void
    {
        $this->routes["GET"][$path] = $call;
    }

    public function dispatch(): void
    {
        $method = $_SERVER["REQUEST_METHOD"];
        $path = $_SERVER["REQUEST_URI"];
        $call = $this->routes[$method][$path];

        if (!isset($call)) {
            http_response_code(404);
            echo "404 - page not found";
            return;
        }

        $call();
    }
}
