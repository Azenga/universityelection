<?php

    require_once('core/init.php');

    if(isset($_POST['login'])){
    	$regno = trim($_POST['regno']);
    	$pwd = md5(trim($_POST['pwd']));

    	$user = new User;

    	if(empty($regno) || empty($pwd)){
    		redirect('accounts.php', 'Fill in all the fields', 'error');
    	}else{
	    	if($user->login($regno, $pwd)){
	    		redirect('index.php', 'Logged In Successfully', 'success');
	    	}else{
	    		redirect('accounts.php', 'Wrong Regestration Number or Password', 'error');
	    	}
    	}

    }else{
  	    $template = new Template('login');
	    echo $template;
    }