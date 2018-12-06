<?php include('includes/header.php'); ?>

 <section style="background: #f4f4f4;">
    <div class="container-fuid">
        <h2 class="h2 text-center mb-3 pt-3">Candidate</h2>
        <div class="row">
            <div class="col-md-3">
                <?php if(logged_in()) : ?>
                    <div class="logout p-3">
                        <h4>Welcome <?php echo $_SESSION['user']; ?></h4>
                        <form action="logout.php" class="form-inline" method="POST">
                            <button type="submit" name="logout" class="btn btn-success">Logout</button>
                        </form>
                    </div>
                <?php endif; ?>
                <div class="logout p-3">
                    <h2 style="color: #90a4ae;" class="h3 mb-3">Candidate Positions</h2>
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action active">All</a>
                        <?php foreach($positions as $position): ?>
                            <a href="#" class="list-group-item list-group-item-action"><?php echo $position->name; ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <h3 class="card-header">
                        <?php echo $candidate->first_name . ' ' .$candidate->last_name; ?> 
                    </h3>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="images/avatar/<?php echo $candidate->avatar ?>">
                                    <div class="card-body">
                                        <button class="btn btn-block btn-sm btn-success">
                                            <?php echo $candidate->acronym; ?>
                                        </button>
                                        <button class="btn btn-block btn-sm btn-success">
                                            <?php echo $candidate->name; ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header">Manifesto</div>
                                    <div class="card-body">
                                        <?php echo $candidate->manifesto; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include('includes/footer.php'); ?>