<?php

declare(strict_types = 1);

namespace Framework\Router;

class Router implements RouterInterface
{
    /**
     * Contains an array of route from our routing table
     * @var array
     */
    protected array $routes = [];

    /**
     * Contains an array of route parameters
     * @var array
     */
    protected array $params = [];

    public function add(string $route, array $params = []): void
    {
        $this->routes[$route] = $params;
    }

    public function dispatch(string $url): void
    {
        if ($this->match($url)) {
            $controller = $this->params['controller'];
        }

    }

    public function ToCamelCase(string $string): string
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    private function match(string $url) : bool
    {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                // Get named capture group values
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }
}