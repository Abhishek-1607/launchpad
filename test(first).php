<?php
interface abcs{
    function connect();
    function disconnect();
    function select($tableName, $columns);
    function insert($tableName, $columns, $values);
    function update($tableName, $columns, $values,$conditions);
    function delete($tableName, $conditions);
    }
class connection implements abcs
{
private $host = '';

private $username = '';

private $password = '';

private $dbname = '';

private $port = '';

private $socket = '';

private $_mysqli;

function __construct($host, $username, $password, $dbname, $port = null, $socket = null)
{
    $this->host = $host;
    $this->username = $username;
    $this->password = $password;
    $this->dbname = $dbname;
    $this->port = $port;
    $this->socket = $socket;
}

function connect()
{
    $this->_mysqli = new mysqli($this->host, $this->username, $this->password, $this->dbname, $this->socket);
    if ($this->_mysqli->connect_error) {
        return true;
    }
    return false;
}

function disconnect()
{
    if (isset($this->_mysqli)) {
        $this->_mysqli->close();
    }
}
// select operation
function select($tableName, $columns)
{
    $query = "SELECT $columns FROM $tableName";
    
    $result = $this->_mysqli->query($query);
    $response = [];
    $response[]= mysqli_fetch_all($result);
    print_r($response);
    return $response;
}

// insert
function insert($tableName, $columns, $values){
   // $impl=implode(",",$values); not help becuase it will give sql error;
   $impl="'" . implode("', '", $values ) ."'";
    // print_r($impl);
    $query="INSERT INTO $tableName $columns VALUES ($impl)";
    // print_r($query);
    $result=$this->_mysqli->query($query);
    return $result;
}

// delete
function delete($tableName,$conditions){
    $whereString = $this->convertArrayToString($conditions);
    $query="DELETE FROM $tableName WHERE $whereString";
    // print_r($query);
    // echo "<br>";
    $result=$this->_mysqli->query($query);
    return $result;
}

// UPDATE
function update($tableName, $columns, $values,$conditions){
    $updateString=$this->updateWhereString($columns,$values);
    // echo " i am here";
    $whereString=$this->convertArrayToString($conditions);
    
    
    $query="UPDATE $tableName SET $updateString WHERE $whereString";
    // print_r($query);
    $result=$this->_mysqli->query($query);
    // print_r($result);
    return $result;
    
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
$obj=new connection('localhost','hestabit','hestabit','info');
echo $obj->connect();
// echo $obj->disconnect();




// select operation
 $obj->select('information','*');



// delete operation
// $obj->delete('information',array('id','2'));


// $obj->insert('information','id',array(10));
//  $obj->insert('information','(id,name,email,gender,phone,city)',array('10','j','j@gmail.com','f','100009','del'));



// update command  update($tableName, $columns, $values)
$obj->update('information','name,email,gender,phone,city',array('rajest','rajesh@gmail.com','m','1737475','singapour'),array('id','5'));
?>
