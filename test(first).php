<?php
class ptr{
    private static $inr=NULL;
    private $dbconn;
    private function __construct(){
        echo "Database connected <br>";
    }
    public static function reInr(){
        if(self::$inr==NULL){
            self::$inr = new ptr();
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


    // SELECT OPERATION
    function select($tableName, $columns,$conditions)
{
    $db = ptr::getDbConn();
    $sql = "SELECT $columns FROM $tableName ";
    if(!empty($conditions)){
        $searchString=self::convertSearchString($conditions);
        $sql .= "WHERE $searchString";
    }
    print_r($sql);
    $result = $db->query($sql);
    print_r($result);
    $response = [];
    $response[]= mysqli_fetch_all($result);
    print_r($response);
    return $response;
}


// insert
function insert($tableName, $columns, $values){
    $db = ptr::getDbConn();
    // $impl=implode(",",$values); not help becuase it will give sql error;
    $impl="'" . implode("', '", $values ) ."'";
     // print_r($impl);
     $query="INSERT INTO $tableName $columns VALUES ($impl)";
     // print_r($query);
     $result=$db->query($query);
     return $result;
 }


 // delete
 function delete($tableName,$conditions){
    $db = ptr::getDbConn();
    $whereString = self::convertArrayToString($conditions);
    $query="DELETE FROM $tableName WHERE $whereString";
    // print_r($query);
    // echo "<br>";
    $result=$db->query($query);
    return $result;
}
// UPDATE
function update($tableName, $columns, $values,$conditions){
    $db = ptr::getDbConn();
    $updateString=$db->updateWhereString($columns,$values);
    // echo " i am here";
    $whereString=$db->convertArrayToString($conditions);
    $query="UPDATE $tableName SET $updateString WHERE $whereString";
    // print_r($query);
    $result=$db->query($query);
    // print_r($result);
    return $result;
    
}

// convert array of string
public function convertSearchString($arrayValues){
    $Stringbuild='';
    foreach($arrayValues as $key=>$values){
        $Stringbuild .= $key . $values;
    }
    return $Stringbuild;
}
public function convertArrayToString($arrayValues)
{
    $p=implode('=',$arrayValues);
    // print_r($buildString);
    return $p;
}
public function updateWhereString($key,$value){
    $a=explode(',',$key);
    $buildString='';
    for($i=0;$i<count($a)-1;$i++){
        $buildString .=  $a[$i] . '=' ."'".  $value[$i] . "'". ',';
    }
    $buildString .= $a[count($a)-1] .  '=' .  "'". $value[count($a)-1]. "'";
    // print_r($buildString);
    // exit;
    return $buildString;
       
}

}
$obj1=ptr::reInr();

// SELECT OPERATION CALLING
$obj1->select('information','*',array('city='=>"'del'",'And id='=>'10'));

// INSERT OPERAATION CALLING
// $obj1->insert('information','(id,name,email,gender,phone,city)',array('16','rHUK','RAHUL@gmail.com','M','1000016','del'));

// DELETE OPERATION CALLING
// $obj1->delete('information',array('id','2'));


// UPDATE OPERATION CALLING
// $obj1->update('information','name,email,gender,phone,city',array('rajest','rajesh@gmail.com','m','1737475','singapour'),array('id','5'));


?>
