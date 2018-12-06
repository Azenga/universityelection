<?php session_start(); ?>
<?php include('../includes/connection.php'); ?>
<?php include('../includes/helper.php'); ?>

<?php 


if(isset($_GET['id'])){
    $user_id = $_GET['id'];

    $query = "UPDATE users SET canvote = 1 WHERE id = {$user_id}"; 

    $result = mysqli_query($conn, $query);

    if($result == 1){
        redirect('voters.php', 'Voter Approved', 'success');
    }else{
        redirect('voters.php', 'Try again Later', 'error');
    }
}

