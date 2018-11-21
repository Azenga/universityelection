<?php include('../includes/connection.php'); ?>
<?php include('../includes/header.php'); ?>
<?php 
if(isset($_POST['submit'])){
    if(empty($_POST['pname'])){
        redirect('add-post.php', 'Fill in the name', 'error');
    }else{
        $pname = mysqli_real_escape_string($conn, $_POST['pname']);

        $query = "INSERT INTO positions(name) VALUES ('$pname');";

        $result = mysqli_query($conn, $query);

        if($result == 1){
            redirect('positions.php', 'Position Successfully Added', 'success');
        }else{
            redirect('positions.php', 'A fatal Error Ocurred', 'error');
        }
    }
}

?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add Position</h1>
    </div>
    <?php display_message() ?>
    <form action="<?php $_PHP_SELF ?>" method="POST">
        <div class="form-group">
            <label for="name">Position Name: </label>
            <input class="form-control" type="text" name="pname" id="name" />
        </div>
        <button class="btn btn-outline-secondary" type="submit" name="submit">Submit</button>
    </form>
</main>

<?php include_once('../includes/footer.php') ?>
