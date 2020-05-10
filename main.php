<?php  
require 'classes/tools.php' ;
class main extends tools {
/*
********************* develop by sajjad albassray  *********************************
************************** database محتويات كلاس  **********************************
 1-escape_string($value):تستخدم لحماية المدخلات ex =>    escape_string('اسم المدخل')  

 2-insert($table_name,$assoc_array,$successmsg=null):تستخدم لاضافة البيانات ex => insert('test','['name'=>'inputname']','success insert')  

 3-update($table,$where,$set,$successmsg=null):تستخدم لتعديل البيانات ex =>update('test','id=2','name=$_POST['name']','success update') or  update('test','id=2','name='$name,age=$age','success update')   

4- delete($table,$idname,$id,$successmsg):تستخدم لحذف البيانات ex => delete('test','id','3','success delete')    

5-show($table,$where=null):تستخدم لعرض البيانات ex => ('test','where id=10')   =>[
'عرض البيانات في الصفحة '=>
$obj=new main;

$result=$obj->show('d');
foreach ($result as $res) {
    $name = $res['name'];
    echo $name ;
}


] 
 6-number_query($table,$where=null):تستخدم لحساب عدد مرات  الاستعلام ex => number_query('test','id=12') or number_query('test')     

************************** database محتويات كلاس  ************************************ 
__________________________________________________________________________________________________

*/


}
?>