<?php include('../includes/connection.php'); ?>
<?php include('../includes/header.php'); ?>

<?php

    $query = "SELECT * FROM positions";

    $results = mysqli_query($conn, $query);

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Positions</h1>
    </div>
    <?php display_message() ?>
    <div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if(mysqli_num_rows($results) > 0) :?>
            <?php while($row = mysqli_fetch_assoc($results)) :?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><a class="btn btn-link" href="templates/admin/positions/remove-post.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
            <?php endwhile; ?>    
        <?php else: ?>    
        <?php endif; ?>    

        </tbody>
    </table>
    <a href="templates/admin/positions/add-post.php" class="btn btn-outline-primary">Add Position</a>
    </div>
</main>
<?php include_once('../includes/footer.php') ?>