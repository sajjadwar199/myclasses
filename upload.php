<?php  
require 'classes/pagination.php' ;
class upload extends pagination{

 public static function upload_image($image, $file_upload_to, $page)
    {
        $rand = substr(md5(uniqid(rand(), true)), 3, 10);
        if (isset($image)) {
            $image = $image;
        }
        $file_name = $_FILES["$image"]["name"];
        $file_tmp_name = $_FILES["$image"]["tmp_name"];
        $file_size = $_FILES["$image"]["size"];
        $file_type = $_FILES["$image"]["type"];
        $file_error = $_FILES["$image"]["error"];
        $folder = "$file_upload_to /";
        $path = $folder . $rand . $file_name;
        $tmp = explode('.', $file_name);
        $test_type = end($tmp);
        $type = array('jpeg', 'jpg', 'png', 'gif', 'jfif');

        if (in_array($test_type, $type) and $file_size < 1000000) {
            move_uploaded_file($file_tmp_name, $path);
            return $path;
        } else {
            echo "<script>alert(' لرجاء اضافة صورة بصيغة مدعومة اقل من 1 ميغا بايت!لم تتم اضافة ')</script>";
            echo "<Script>window.open('$page','_self')</Script>";
        }
    }


    public static function upload_pdf($image, $file_upload_to, $page)
{
    $rand = substr(md5(uniqid(rand(), true)), 3, 10);
    if (isset($image)) {
        $image = $image;
    }
    $file_name = $_FILES["$image"]["name"];
    $file_tmp_name = $_FILES["$image"]["tmp_name"];
    $file_size = $_FILES["$image"]["size"];
    $file_type = $_FILES["$image"]["type"];
    $file_error = $_FILES["$image"]["error"];
    $folder = "$file_upload_to /";
    $path = $folder . $rand . $file_name;
    $tmp = explode('.', $file_name);
    $test_type = end($tmp);
    $type = array('pdf');

    if (in_array($test_type, $type) and $file_size < 3000000) {
        move_uploaded_file($file_tmp_name, $path);
        return $path;
    } else {
        echo "<script>alert(' لرجاء اضافة ملف  نصي بصيغة مدعومة اقل من 3 ميغا بايت!لم تتم اضافة ')</script>";
        echo "<Script>window.open('$page','_self')</Script>";
    }
}
};




?>