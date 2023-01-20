<?php
interface m{
    public static function reInr();
}
interface n{
    public static function getDbConn();
}
class pll implements m,n{
    private static $inr=NULL;
    private $dbconn;
    private function __construct(){
        echo "Database connected <br>";
    }
    public static function reInr(){
        if(self::$inr==NULL){
            self::$inr = new Static();
        }
        else{
            echo "already connected <br>";
        }
        return self::$inr;
    }
    public static function getDbConn(){
        try{
            $db=self::$inr;
            $db->dbconn=new mysqli('localhost','hestabit','hestabit','info');  
            return $db->dbconn;
        }
        catch(Exception $e){
                echo "error".$e->getMessage();
        }
    }
}
// database connected
$obj1=pll::reInr();
$obj2=pll::getDbConn();
// database already connected
$obj3=pll::reInr();
$obj4=pll::getDbConn();
?>
