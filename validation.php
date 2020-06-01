<?php  
require 'database.php' ;
class validation extends database{
  
//==========================================
//استدعاء check_empty()
//$data $_POST   اما $data $_GET   او 
//$fields   array('one,two,....')
//==========================================

public  function protection_input($input)
{
   $protect=$this->escape_string(strip_tags(htmlentities(trim(@$input)))) ;

    return $protect;
    }

    public   function empty_valid($input,$error)
    {
    
            if ($this->protection_input($input) =='') {
                ?>
                <div style='text-align:right' class='alert alert-danger'>
                <?php  echo $error;  ?>
                </div>
                
                            <?php 

return false;
            }else{
                return true;
            }
           
        }
    
    
    
    public  function number_valid($number,$error)
    {
     
       
        if (!preg_match("/^[0-9]+$/", $this->protection_input($number))) {    
            ?>
<div style='text-align:right' class='alert alert-danger'>
<?php  echo $error;  ?>
</div>

            <?php 
            return false;
        } else{
            return true;
        }
    
    }
    
    public   function email_valid($email,$error)
    {
        //if (preg_match("/^[_a-z0-9-+]+(\.[_a-z0-9-+]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) {
        if (!@filter_var($this->protection_input($email), FILTER_VALIDATE_EMAIL)) {    
            ?>
<div style='text-align:right' class='alert alert-danger'>
<?php  echo $error;  ?>
</div>

            <?php 
       return false; 
    }else{
        return true;
    }
}
    public  function english_char_valid($input,$error)
    {
        $regex = '/^[a-zA-Z0-9$@$!%*?&#^-_. +]+$/';
            if (!preg_match($regex, $this->protection_input(@$input)) ) {
                ?>
                <div style='text-align:right' class='alert alert-danger'>
                <?php  echo $error;  ?>
                </div>
                
                            <?php 
return false;
            }else{
                return true;
            }
            

            }
    };


?>
