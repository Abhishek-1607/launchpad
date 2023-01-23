<?php
interface qto{
    public static function reInr();
}
class ppo implements qto
{
 // Connection settings
 private static $host = 'localhost';
 private static $username = 'hestabit';
 private static $password = 'hestabit';
 private static $dbname = 'info';
 private static $dbConn = NULL;

 public function __construct() {
 die('Something is not good in your database connection');
 }
 public static function reInr() {
 // One connection through whole application
 if(self::$dbConn==NULL) {
 try {
 self::$dbConn = new PDO("mysql:host=".self::$host.";"."dbname=".self::$dbname, self::$username, self::$password);
 }
 catch(PDOException $e) {
    die($e->getMessage());
 }
 }
// errror during database connection
 self::$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
 return self::$dbConn;
 }
}
$obj=ppo::reInr();
