<?php include('../includes/connection.php'); ?>
<?php include('../includes/header.php'); ?>
<?php 
if(isset($_POST['submit'])){
    if(empty($_POST['fname']) || empty($_POST['facronym']) || empty($_POST['fdesc'])){
        redirect('add-faculty.php', 'Fill in all the fields', 'error');
    }else{
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $facronym = mysqli_real_escape_string($conn, $_POST['facronym']);
        $fdesc = mysqli_real_escape_string($conn, $_POST['fdesc']);

        $query = "INSERT INTO faculties(name, acronym, descr) VALUES ('$fname', '$facronym', '$fdesc');";

        $result = mysqli_query($conn, $query);

        if($result == 1){
            redirect('faculties.php', 'Faculty Successfully Added', 'success');
        }else{
            redirect('add-faculty.php', 'A fatal Error Ocurred', 'error');
        }
    }
}

?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add Faculty|School</h1>
    </div>
    <?php display_message(); ?>
    <form action="<?php $_PHP_SELF ?>" method="POST">
        <div class="form-group">
            <label for="name">Faculty Name: </label>
            <input class="form-control" type="text" name="fname" id="name" />
        </div>
        <div class="form-group">
            <label for="acronym">Faculty Acronym: </label>
            <input class="form-control" type="text" name="facronym" id="acronym" />
        </div>
        <div class="form-group">
            <label for="desc">Faculty Description: </label>
            <textarea class="form-control" name="fdesc" id="desc" rows="8" columns='80'></textarea>
        </div>
        <button class="btn btn-outline-secondary" type="submit" name="submit">Submit</button>
    </form>
</main>

<?php include_once('../includes/footer.php') ?>
