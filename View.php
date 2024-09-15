<?php

declare(strict_types=1);

namespace App;


class View
{
  public function __construct(public string $relPath, public array $args = [])
  {}


  public static function make(string $relPath, array $args = []): static
  {
    return new static($relPath, $args);
  }

  public function render(): string
  {
    $viewPath = VIEW_PATH . 'view/' . $this->relPath . '.php';
    ob_start();
    include $viewPath;
    return ob_get_clean();
  }

  public function __toString()
  {
    return $this->render();
  }
}
