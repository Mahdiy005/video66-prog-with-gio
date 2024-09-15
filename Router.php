<?php

declare(strict_types=1);

namespace App;

use App\exceptions\PageNotFoundException;
use Exception;

class Router
{
  private array $routes = [];

  // Register new route with method type
  public function register(string $method, string $route, callable|array $target): static
  {
    $this->routes[$method][$route] = $target;
    return $this;
  }

  public function get(string $route, callable|array $target): static
  {
    return $this->register('get', $route, $target);
  }

  public function post(string $route, callable|array $target): static
  {
    return $this->register('post', $route, $target);
  }

  // matche route against Request URI
  public function resolve()
  {
    // echo '1';
    $method = strtolower($_SERVER['REQUEST_METHOD']) ?? null;
    $route  = explode('?', $_SERVER['REQUEST_URI'])[0];
    $target = $this->routes[$method][$route] ?? null;

    if(! isset($target))
    {
      throw new \Exception('404 No Such Page');
    }

    if(is_callable($target))
    {
      return call_user_func($target);
    }

    if(is_array($target))
    {
      [$class, $passMethod] = $target;
      if(class_exists($class))
      {
        $class = new $class;
        if(method_exists($class, $passMethod))
        {
          return call_user_func_array($target, []);
        }
      }
    }

    throw new Exception();
  }
}
