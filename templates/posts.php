<?php include('includes/header.php'); ?>

 <section style="background: #f4f4f4;">
    <div class="container-fuid">
        <h2 class="h2 text-center mb-3 pt-3">POSTS</h2>
        <div class="row">
            <div class="col-md-3">
                <?php if(logged_in()) : ?>
                    <div class="logout p-3">
                        <h4>Welcome <?php echo $_SESSION['user']; ?></h4>
                        <form action="logout.php" class="form-inline" method="post">
                            <button type="submit" name="logout" class="btn btn-success">Logout</button>
                        </form>
                    </div>
                <?php endif; ?>
                <div class="logout p-3">
                    <h2 style="color: #90a4ae;" class="h3 mb-3">Post Category</h2>
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action active">All</a>
                        <?php foreach($groups as $group): ?>
                            <a href="#" class="list-group-item list-group-item-action"><?php echo $group->name; ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <ul class="list-unstyled">
                    <?php if($posts == NULL): ?>
                        <p>No posts yet</p>
                    <?php else: ?>
                        <?php foreach($posts as $post): ?>
                            <li class="media">
                                <img class="img-icon rounded img-thumbnail mr-3" src="images/avatar/<?php echo($post->avatar); ?>" alt="User Avatar">
                                <div class="media-body p-2">
                                    <h5 class="mt-0 mb-1"><?php echo $post->title; ?></h5>
                                    <?php echo $post->body; ?>
                                    <a class="btn btn-outline-secondary" href="post.php?post_id=<?php echo $post->id; ?>">Read More</a> <h4  style="color: #90a4ae;" class="float-right">Author : <?php echo $post->first_name ?></h4>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <nav>
                    <ul class="pagination justify-content-end">
                        <li class="page-item"> <a class="page-link" href="">Previous</a></li>
                        <li class="page-item active"> <a class="page-link" href="">1</a></li>
                        <li class="page-item"> <a class="page-link" href="">2</a></li>
                        <li class="page-item"> <a class="page-link" href="">3</a></li>
                        <li class="page-item"> <a class="page-link" href="">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>


<?php include('includes/footer.php'); ?>