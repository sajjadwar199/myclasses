<?php 
class database{
 private $localhost='localhost';
 private $username='root';
 private $password='';
 private $database='a';

 protected $connection;

 public function connect()
 {


     $con = mysqli_connect($this->localhost, $this->username,$this->password,$this->database);
     if (!$con) {
         echo "لم يتم الاتصال";
     } else {
         echo "";
     }
     return $con;
 }

public function escape_string($value)
{
    $c = new main;
    $conn = $c->connect();
        return mysqli_real_escape_string($conn,$value);
}


public static function insert($table_name,$assoc_array,$successmsg=null){

    $keys = array();
    $values = array();
    foreach($assoc_array as $key => $value){
        $keys[] = $key;
        $values[] =strip_tags(htmlentities($_POST[$value])) ;
    }
    $query = "INSERT INTO `$table_name`(`".implode("`,`", $keys)."`) VALUES('".implode("','", $values)."')";
    $c = new database;
    $conn = $c->connect();
    $q=  mysqli_query($conn,$query);
    if($q){
    $_SESSION['success_message']=$successmsg;
  }else{
    $_SESSION['error_massage'] = 'هناك خطا  ';

  }
} 


public static function update($table,$where,$set,$successmsg=null){

    $sql = "UPDATE $table SET $set  WHERE $where";
    $c = new database;
    $conn = $c->connect();
  $q=  mysqli_query($conn,$sql);

  if($q){
    $_SESSION['success_message']=$successmsg;
  }else{
    $_SESSION['error_massage'] = 'هناك خطا  ';

  }
   
} 
    

public static function delete($table,$idname,$id,$successmsg){

   
        $query = "DELETE FROM $table WHERE $idname = $id";
        $c = new database;
    $conn = $c->connect();
      $q= mysqli_query($conn,$query);
       if($q){
        $_SESSION['success_message']=$successmsg;
      }else{
        $_SESSION['error_massage'] = 'هناك خطا  ';
    
      }
        
} 

public static function show($table,$where=null){
  $query = "SELECT * FROM $table   $where  ";
  $c = new database;
$conn = $c->connect();
$q= mysqli_query($conn,$query);
if ($q == false) {
  return false;
}
$rows = array();
while ($row =mysqli_fetch_array($q)) {
  $rows[] = $row;
}

return $rows;
    
} 


public static function number_query($table,$where=null){
  $c = new database;
$conn = $c->connect();
$query = "SELECT * FROM $table  $where  ";
$q= mysqli_query($conn,$query);
if ($q == false) {
  return false;
}
$num=mysqli_num_rows($q);
return $num;
}  

};

?>