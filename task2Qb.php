<?php
class ptr{
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
$obj1=ptr::reInr();
$obj=ptr::getDbConn();
$obj2=ptr::reInr();
$ob3=ptr::getDbConn();
// $sql="* from information";
// $sql="update from information set city='mumbai'";
// $sql="delete from information WHERE city='mumbai'";
$sql="delete from information WHERE city='mumbai'";
$result=$obj->query($sql);
$response=$result->fetch_all();
echo "<pre>";print_r($response);

?>