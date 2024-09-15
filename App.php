<?php

declare(strict_types=1);

namespace App;
/**
 * Undefined class
 */
class App
{
  public function __construct(protected Router $route)
  {
    
  }

  public function run()
  {
    try {
      echo $this->route->resolve();
    } catch (\Throwable $th) {
      // http_response_code(404);
      // echo View::make('errors/404', ['code'=> 404]);
      throw $th;
    }
  }
}
