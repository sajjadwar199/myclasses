<?php  
require 'classes/validation.php' ;
class message extends validation{
    public static function success_message()
    {
        if (isset($_SESSION['success_message'])) {
            @$success = "<div style='text-align:right' class='alert alert-success'>";
            @$success .= htmlentities($_SESSION['success_message']);
            @$success .= '</div>';
        }
        $_SESSION['success_message'] = null;

        return @$success;
    }

    public static function error_massage()
    {
        if (isset($_SESSION['error_massage'])) {
            @$error = "<div style='text-align:right' class='alert alert-danger'>";
            @$error .= htmlentities($_SESSION['error_massage']);
            @$error .= '</div>';
        }
        $_SESSION['error_massage'] = null;

        return @$error;
    }


}
?>