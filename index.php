<?php

declare(strict_types=1);

use App\App;
use App\controller\HomeController;
use App\controller\InvoiceController;
use App\Router;
use App\View;

require_once './vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('VIEW_PATH', __DIR__ . '/');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$route = new Router();

$route
      ->get('/last_rev/', [HomeController::class, 'index'])
      ->get('/last_rev/invoice', [InvoiceController::class, 'index']);



(new App($route))->run();