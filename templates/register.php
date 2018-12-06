<?php include('includes/header.php') ?>

<section id="login-group">
    <form action="register.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6 offset-3">
                <h2 class="text-center">Registration Form</h2>
                <hr>
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input class="form-control" type="text" name="fname" id="fname" />
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input class="form-control" type="text" name="lname" id="lname" />
                    </div>
                    <div class="form-group">
                        <label for="uid">Regestration Number</label>
                        <input class="form-control" type="text" name="regno" id="uid" />
                    </div>
                    <div class="form-group">
                        <label for="faculty">Faculty</label>
                        <select class="form-control" name="faculty" id="faculty">
                            <option value="">--Select Faculty--</option>
                            <?php foreach ($faculties as $faculty): ?>
                                <option value="<?php echo $faculty->id; ?>"><?php echo $faculty->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" />
                    </div>
                    <div class="form-group">
                        <label for="avatar">Profile Picture</label>
                        <input class="form-control-file" type="file" name="pic" id="avatar">

                    </div>
                    <div class="form-group">
                        <label for="pwd">Password</label>
                        <input class="form-control" type="password" name="pwd" id="pwd" />
                    </div>
                    <div class="form-group">
                        <label for="cpwd">Confirm Password</label>
                        <input class="form-control" type="password" name="cpwd" id="cpwd" />
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <button type="submit" name="register" class="btn btn-secondary">Register</button>
                        </div>
                        <div class="col-md-2 offset-8">
                            <button type="reset" class="btn btn-warning">Reset</button><br>
                        </div>
                    </div>
                    Already have an account? <a class="btn btn-link" href="accounts.php">Login</a>
                </form>
            </div>
        </div>
    </form>
</section>

<?php include('includes/footer.php') ?>