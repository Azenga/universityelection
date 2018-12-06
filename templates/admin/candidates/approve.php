<?php session_start(); ?>
<?php include('../includes/connection.php'); ?>
<?php include('../includes/helper.php'); ?>

<?php 


if(isset($_GET['id'])){
    $candidate_id = $_GET['id'];

    $query = "UPDATE candidates SET nominated = 1 WHERE id = {$candidate_id}"; 

    $result = mysqli_query($conn, $query);

    if($result == 1){
    	$query = "SELECT user_id FROM candidates WHERE id = {$candidate_id}";

    	$result = mysqli_query($conn, $query);

    	if(mysqli_num_rows($result) == 1){
    		$user_id = mysqli_fetch_assoc($result)['user_id'];

    		$query = "UPDATE users SET group_id = 2 WHERE id = {$user_id}";

    		$result = mysqli_query($conn, $query);

    		if($result ==1){
        		redirect('candidates.php', 'Candidature Approved', 'success');
    		}else{
        		redirect('candidates.php', 'An Error Ocurred', 'error');
    		} 
    	}
    }else{
        redirect('candidates.php', 'Try again Later', 'error');
    }
}

