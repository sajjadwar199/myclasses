<?php  
require 'classes/time.php' ;
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

}
?>