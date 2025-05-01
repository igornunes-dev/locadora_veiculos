<?php

namespace routes;

class Routes
{
    private $routes = [];

    public function addRouter($method, $route, $action) {
        $this->routes[] = [
            'method' => $method,
            'route' => $route,
            'action' => $action
        ];
    }

    public function run($uri) {
        $uri = rtrim(parse_url($uri, PHP_URL_PATH), '/');
        $method = $_SERVER['REQUEST_METHOD'];

        foreach($this->routes as $route) {
            if(!isset($route['method'], $route['route'], $route['action'])) {
                continue;
            }
            $routePath = rtrim($route['route'], '/');

            if($routePath === $uri) {
                [$controller, $methodName] = $route['action'];
                $instance = new $controller();
                call_user_func([$instance, $methodName], []);
                return;
            }

            $pattern = preg_replace('/\{[a-zA-Z_]+}/', '([^/]+)', $routePath);
            $pattern = "#^$pattern$#";

            if(preg_match($pattern, $uri, $matches)) {
                array_shift($matches);
                [$controller, $methodName] = $route['action'];
                call_user_func_array([new $controller, $methodName], $matches);
                return;
            }
        }

        echo "Página não encontrada!";
    }
}