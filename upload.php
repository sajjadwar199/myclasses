<?php  
require 'classes/pagination.php' ;
class upload extends pagination{

    function upload_image($image, $file_upload_to, $page)
    {

        $rand = substr(md5(uniqid(rand(), true)), 3, 10); //create md5 for file
        if (isset($image)) { //isset of image name from form
            $image = $image;
        }

        $file_name = $_FILES["$image"]["name"]; //  1-get the name of file 
        $file_tmp_name = $_FILES["$image"]["tmp_name"]; // 2-get the temb_name of file
        $file_size = $_FILES["$image"]["size"]; // 3-get size of file 
        $file_type = $_FILES["$image"]["type"]; // 4-get the type of file
        $file_error = $_FILES["$image"]["error"]; //5-get any error
        $folder = "$file_upload_to/"; //6- the dir of upload folder
        $path = $folder.$rand.$file_name; //7-make path of file 
        $tmp = explode('.', $file_name); //8-search from allow types of file
        $test_type = strtolower(end($tmp));
        $type = array('jpeg', 'jpg', 'png', 'gif', 'jfif');
        $check = getimagesize($file_tmp_name);
        if (in_array($test_type, $type) and $file_size < 2000000 and $check!=false) {
            move_uploaded_file($file_tmp_name, $path); //upload file to folder
            return $path;
        } else {
           
           echo "<script>alert(' لرجاء اضافة صورة بصيغة مدعومة اقل من 2 ميغا بايت!لم تتم اضافة ')</script>";
            echo "<Script>window.open('$page','_self')</Script>"; //if found any error 
            return $path=false;
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
    $test_type =  strtolower(end($tmp));
    $type = array('pdf');
    //chack the image is the fake or not
    $check = getimagesize($file_tmp_name);
    if (in_array($test_type, $type) and $file_size < 2000000 and $check!=false) {
        move_uploaded_file($file_tmp_name, $path); //upload file to folder
        return $path;
    } else {
       
       echo "<script>alert(' لرجاء اضافة صورة بصيغة مدعومة اقل من 2 ميغا بايت!لم تتم اضافة ')</script>";
        echo "<Script>window.open('$page','_self')</Script>"; //if found any error 
        return $path=false;
    }
}
};




?>
