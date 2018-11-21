<?php 
include('core/init.php');

if (isset($_POST['logout'])) {

	 unset($_SESSION['logged_in']);
	 unset($_SESSION['user_id']);
	 unset($_SESSION['group_id']);
	 unset($_SESSION['user']);

	 session_destroy();
	 
	 redirect('index.php', 'Logged out', 'success');
}