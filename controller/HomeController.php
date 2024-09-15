<?php

declare(strict_types=1);

namespace App\controller;

use App\View;
use PDO;

class HomeController
{
  public static function index()
  {
    try {
      $db = new PDO(
        $_ENV['DB_DRIVER'] . ':host=' . $_ENV['DB_HOST'] . ';dbname='. $_ENV['DB_NAME'],
        $_ENV['DB_USER'],
        $_ENV['DB_PASS']
      );
    } catch (\Throwable $th) {
      throw $th;
    }

    try {
      $db->beginTransaction();
      $add_user = $db->prepare('INSERT INTO users (email, full_name, is_active, created_at)
      VALUES (?, ?, 1, NOW())');
      $add_invoice = $db->prepare('INSERT INTO invoice (amount, user_id)
      VALUES (?, ?)');
      $add_user->execute(['mo@mail.com', 'Mohamed Ibrahim Ahmed Mahdi']);
      $uid = $db->lastInsertId();
      $add_invoice->execute([2999, $uid]);
      $db->commit();
    } catch (\Throwable $th) {
      $db->rollBack();
      throw $th;
    }
    
    return View::make('index');
  }
}
