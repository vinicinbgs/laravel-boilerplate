<?php

namespace Tests;

trait Routes
{
    private $routes = [
        "users" => "users",
    ];

    /**
     * Get route formatted
     *
     * @param string $controller
     * @param string $prefix
     *
     * @return void
     */
    public function getRoute(string $controller, string $prefix = "/api/")
    {
        return $prefix . $this->routes[$controller];
    }
}
