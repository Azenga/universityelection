<?php include('includes/header.php') ?>

<section id="login-group">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h2 class="text-center">Login Form</h2>
            <hr>
            <form action="accounts.php" method="post">
                <div class="form-group">
                    <label for="#regno">Username</label>
                    <input class="form-control" type="text" name="regno" id="regno" />
                </div>
                <div class="form-group">
                    <label for="#pwd">Password</label>
                    <input class="form-control" type="password" name="pwd" id="pwd" />
                </div>

                <div>
                    <div class="row">
                    <div class="col-md-10">
                        <input type="checkbox" name="rememberme" id="rememberme">
                        <label for="#rememberme">Remember Me</label>
                    </div>
                    <div class="col-md-2 align-items-end">
                    <button class="btn btn-primary flex-last" name="login" type="submit">Login</button> 
                    </div>
                    </div>
                </div>
            </form>
            <div>
                <span class="mr-auto">Don't Have an account yet?</span>
                <a class="btn btn-link" href="signup.php">Signup</a> <br>
            </div>
            <a href="resetpwd.html">Forgot Password? </a>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>