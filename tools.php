<?php  
require 'time.php' ;
class tools extends time {

      //  دالة توليد ملفات الرفع اوتماتيكيا
    public static   function create_upload_file($folder_name)
    {
          if (!is_dir($folder_name)) {
              mkdir($folder_name);
          }
      }

    public static function delete_file($url)
    {

        $filename = dirname(__FILE__) . "$url";
        chmod($filename, 0777);
        unlink($filename);
    }
    public static function redir($page)

    {
        return header('location:' . $page . '.php');
    }
    public static function redir_inc($page_include){
        if($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] == $_SERVER['HTTP_HOST'].'/pos/views'.$page_include){
            header('location:404') ;
        
        }
    }

public function bootstrab_header(){
    echo '<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
    }
public function bootstrab_footer(){

    }
   
}
?>
