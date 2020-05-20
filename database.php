<?php 
class database{
 private $localhost='localhost';
 private $username='root';
 private $password='';
 private $database='pos';

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

public  function escape_string($value)
{
    $c = new main;
    $conn = $c->connect();
        return mysqli_real_escape_string($conn,$value);
}


public  function insert($table_name,$assoc_array,$successmsg=null){

    $keys = array();
    $values= array();
    foreach($assoc_array as $key => $value){
        $keys[] = $key;
        $values[] =$this->escape_string(strip_tags(htmlentities($_POST[$value]))) ;
    }
    $query = "INSERT INTO `$table_name`(`".implode("`,`", $keys)."`) VALUES('".implode("','", $values)."')";
    $c = new database;
    $conn = $c->connect();
    $q=  mysqli_query($conn,$query);
    if($q){
    $_SESSION['success_message']=$successmsg;
    echo  '     <script>
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
    </script>';
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
    echo '     <script>
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
    </script>';
  }else{
    $_SESSION['error_massage'] = 'هناك خطا  ';

  }
   
} 
    

public static function delete($table,$idname,$id,$successmsg=null){

   
        $query = "DELETE FROM $table WHERE $idname = $id";
        $c = new database;
    $conn = $c->connect();
      $q= mysqli_query($conn,$query);
       if($q){
       
        $_SESSION['success_message']=$successmsg;
        echo '     <script>
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
        </script>';
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



function query($sql)
{
    $c = new main;
    $conn = $c->connect();
    $query = mysqli_query($conn, $sql);
    if (!$query) {

        $_SESSION['error_massage'] = 'åäÇß ÎØÇ Ýí ÇáÇÓÊÚáÇã';
    } else {
        echo "";
    }
    return $query;
}
//fetch array of all information from database 
public static function  fetch($q)
{
    $row = mysqli_fetch_array($q);
    return $row;
}

public static function model($sql2, $alert = null, $page = null)
{
    $c = new main;
    $conn = $c->connect();
    @$query = mysqli_query($conn, $sql2);
    if ($query and $alert != "" and $page != "") {
        echo "<script>alert('$alert')</script>";
        echo "<Script>window.open('$page','_self')</Script>";
    } else if ($alert != "" and $page != "") {
        echo "<script>alert('åäÇß ÎØÇ ')</script>";
        echo "<Script>window.open('$page','_self')</Script>";
    }
}
public  function insert_last_id($table_name,$assoc_array,$successmsg=null){

  $keys = array();
  $values= array();
  foreach($assoc_array as $key => $value){
      $keys[] = $key;
      $values[] =$this->escape_string(strip_tags(htmlentities($_POST[$value]))) ;
  }
  $query = "INSERT INTO `$table_name`(`".implode("`,`", $keys)."`) VALUES('".implode("','", $values)."')";
  $c = new database;
  $conn = $c->connect();
  $q=  mysqli_query($conn,$query);
  if($q){
    $last=$conn->insert_id;
  $_SESSION['success_message']=$successmsg.$last;
  echo  '     <script>
  if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
  }
  </script>';
}else{
  $_SESSION['error_massage'] = 'هناك خطا  ';

}
} 



};

?>
