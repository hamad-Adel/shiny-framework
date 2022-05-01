<?php

declare(strict_types=1);

namespace Framework\Router;

interface RouterInterface 
{
    /**
     * Add a route to the routing table
     * @param string $route
     * @param array $params
     * @return void
     */
    public function add(string $route, array $params): void;


    /**
     * Extract The controller and method from the route and execute
     * the proper method
     * @param string $url
     * @return void
     */
    public function dispatch(string $url): void;
}