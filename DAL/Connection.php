<?php
namespace DAL;
use PDO;

class Connection
{
  private static $dbName = "los_santos";
  private static $dbHost = "localhost";
  private static $dbUser = "root";
  private static $dbPassword = "poo";
  private static $cont = null;

  public static function Connect()
  {
    if (self::$cont == null) {
      try {
        self::$cont = new PDO(
          "mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName,
          self::$dbUser,
          self::$dbPassword,
        );
      } catch (\PDOException $err) {
        die($err->getMessage());
      }
    }
    return self::$cont;
  }
  public static function Disconnect()
  {
    self::$cont = null;
    return self::$cont;
  }
}
