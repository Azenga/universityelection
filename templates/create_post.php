<?php include 'includes/header.php'; ?>
 <section>
    <div class="container-fuid" style="background: #f4f4f4;">
        <h2 class="h2 text-center mb-3 pt-3">Create Post</h2>
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
            </div>
            <div class="col-md-9">
            	<form action="create_post.php" method="POST"">
			        <div class="row">
			            <div class="col-md-11">
			                <hr>
			                <form action="login.php" method="post">
			                    <div class="form-group">
			                        <label for="title">Post Title</label>
			                        <input class="form-control" type="text" name="title" id="title" />
			                    </div>
			                    <div class="form-group">
			                        <label for="body">Post Body</label>
			                        <textarea id="body" name="body" class="form-control" rows="8" cols="80" ></textarea>
			                        <script type="text/javascript">
			                        	CKEDITOR.replace('body');
			                        </script>
			                    </div>
			  
			                    <div class="col-md-2">
			                        <button type="submit" name="post" class="btn btn-secondary">Submit</button>
			                    </div>
			                </form>
			            </div>
			        </div>
			    </form>
            </div>
        </div>
    </div>
</section>
<?php include 'includes/footer.php'; ?>