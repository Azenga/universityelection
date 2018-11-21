<?php include('../includes/connection.php'); ?>
<?php include('../includes/header.php'); ?>

<?php

    $query = "SELECT candidates.id, users.first_name, users.last_name, faculties.acronym, positions.name FROM candidates
    INNER JOIN users ON candidates.user_id = users.id
    INNER JOIN faculties ON users.faculty_id = faculties.id
    INNER JOIN positions ON candidates.position_id = positions.id";

    $results = mysqli_query($conn, $query);

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Candidates</h1>
    </div>
    <?php display_message(); ?>

    <div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Faculty</th>
            <th>Position</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if(mysqli_num_rows($results) > 0) :?>
            <?php while($row = mysqli_fetch_assoc($results)) :?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['acronym']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><a class="btn btn-link" href="templates/admin/faculties/edit-faculty.php?id=<?php echo $row['id']; ?>">Approve</a></td>
                    <td><a class="btn btn-link" href="templates/admin/faculties/delete-faculty.php?id=<?php echo $row['id']; ?>">Deny</a></td>
                </tr>
            <?php endwhile; ?>    
        <?php else: ?>    
        <?php endif; ?>    

        </tbody>
    </table>
    </div>
</main>
<?php include_once('../includes/footer.php') ?>