<?php 

/*
 *
 * Validation Class for Image and Check required fields
 * 
 * */

 class Validator{
     /*
      *Image validation function
      *
      **/

      public function isValidAvatar()
      {
          $allowed_extensions = ['png', 'jpg', 'gif', 'jpeg'];

          $parts = explode('.', $_FILES['pic']['name']);

          $extension = end($parts);

          if((
              ($_FILES['pic']['type'] == 'image/gif') ||
              ($_FILES['pic']['type'] == 'image/jpg') ||
              ($_FILES['pic']['type'] == 'image/jpeg') ||
              ($_FILES['pic']['type'] == 'image/pjpeg') ||
              ($_FILES['pic']['type'] == 'image/x-png') ||
              ($_FILES['pic']['type'] == 'image/png')
               ) && ($_FILES['pic']['size'] < 20000) && in_array($extension, $allowed_extensions)){
            if($_FILES['pic']['error'] > 0){
                redirect('signup.php?', $_FILES['pic']['error'], 'error');
            }else{
                if (file_exists('images/avatar/'.$_FILES['pic']['name'])) {

                    redirect('signup.php?', 'File already exists', 'error');
                    
                }else{
                    move_uploaded_file($_FILES['pic']['tmp_name'], 'images/avatar/'.$_FILES['pic']['name']);
                    return true;
                } 
            }
         }else{
            redirect('signup.php?', 'Invalid file type', 'error');
         }

      }

      /*
       *Validate Email
       * 
       * */

       public function isValidEmail($email)
       {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            }else{
                return false;
            }
       }

       /*
        *Check whether the password and the confirm password match
        *
        **/

       public function passwordsMatch($pwd, $cpwd)
       {
           if($pwd === $cpwd){
               return true;
           }else{
               return false;
           }
       }

 }