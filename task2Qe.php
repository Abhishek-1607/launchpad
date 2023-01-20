<?php
interface er{
    public static function reInr();
}
interface nr{
    public static function getDbConn();
}
class pll implements er,nr{
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
$obj1=pll::reInr();
$obj2=pll::getDbConn();
$sql="insert into information (id,name,email,gender,phone,city) values ('9','k','k@gmail.com','m','00000','tri')";
$sql="SELECT * FROM information";
$result=$obj2->query($sql);
$response=$result->fetch_all();
echo "<pre>";
print_r($response);

?>