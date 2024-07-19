<?php

class Router
{
    private $routes = array();

    public function addRoute($path, $file) {
        $this->routes[$path] = $file;
    }

    public function dispatch() {
        $request = $_SERVER['REQUEST_URI'];

        $request = parse_url($request, PHP_URL_PATH);
        if (array_key_exists($request, $this->routes)) {
            require $this->routes[$request];
        } else {
            header("HTTP/1.0 404 Not Found");
        }
    }
}