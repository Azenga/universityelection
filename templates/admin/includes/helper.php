<?php 

/* 
 *
 * Redirecting function
 *
 * */

function redirect($page = false, $message = null, $message_type = null){
    /*
        *Checking and setting the location
        */

    if (is_string($page)) {
        $location = $page;
    }else{
        $location = $_SERVER['SCRIPT_NAME'];
    }

    /*
        *Checking and setting message
        */

    if ($message != null) {
        $_SESSION['message'] = $message;
    }

    /*
        *Checking and setting message
        */

    if ($message_type != null) {
        $_SESSION['message_type'] = $message_type;
    }

    header('Location: '.$location);

    exit();
}
    
function display_message(){
    if (isset($_SESSION['message'])) {

        // Assigning the global message
        $message = $_SESSION['message'];

        if (isset($_SESSION['message_type'])) {
            
            // Assigning the global message
            $message_type = $_SESSION['message_type'];

            if ($message_type == 'error') {
                echo '<div class="alert alert-danger">'. $message .'</div>';
            } else {
                echo '<div class="alert alert-success">'. $message .'</div>';
            }
            

        }
    }

    // Unsetting Error session variables

    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
}