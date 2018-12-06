<?php session_start(); ?>
<?php include('../includes/connection.php'); ?>
<?php include('../includes/helper.php'); ?>

<?php 


if(isset($_GET['id'])){
    $candidate_id = $_GET['id'];

    $query = "UPDATE candidates SET nominated = 0 WHERE id = {$candidate_id}"; 

    $result = mysqli_query($conn, $query);

    if($result == 1){
        redirect('candidates.php', 'Candidature Denied', 'success');
    }else{
        redirect('candidates.php', 'Try again Later', 'error');
    }
}

