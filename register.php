<?php

include('core/init.php');

$validator = new Validator;
$user = new User;

if(isset($_POST['register'])){
    $letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890_!";

    $data = array();

    $data['fname'] = trim($_POST['fname']);
    $data['lname'] = trim($_POST['lname']);
    $data['regno'] = trim($_POST['regno']);
    $data['faculty'] = trim($_POST['faculty']);
    $data['email'] = trim($_POST['email']);
    $data['faculty'] = trim($_POST['faculty']);
    $data['pwd'] = md5(trim($_POST['pwd']));
    $data['cpwd'] = md5(trim($_POST['cpwd']));
    $data['join_date'] = date('Y-m-d H:i:s');
    $data['token'] = substr(str_shuffle($letters), 0, 20);

    foreach ($data as $key => $value) {
        if(empty($value)){
            redirect('signup.php?', 'Fill in all the fields', 'error');
        }
    }
    
    if($validator->passwordsMatch($data['pwd'], $data['cpwd'])){
        if($validator->isValidEmail($data['email'])){
            if($validator->isValidAvatar()){
                $data['avatar'] = $_FILES['pic']['name'];
            }else{
                $data['avatar'] = 'member.png';
            }

            if ($user->register($data)) {

                redirect('accounts.php?', 'Successfully registered you can now log in', 'success');

            } else {

                redirect('signup.php?', 'An error occured you have to try again', 'error');

            }
        }else{
            redirect('signup.php?', 'Email is not valid', 'error');
        }
    }else{
        redirect('signup.php?', 'Passwords do not match', 'error');
    }
}