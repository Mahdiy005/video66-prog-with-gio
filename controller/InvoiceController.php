<?php

declare(strict_types=1);

namespace App\controller;

use App\View;

class InvoiceController
{
  public static function index()
  {
    

    return View::make('invoice/index');
  }
}
