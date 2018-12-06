<?php include('includes/header.php'); ?>

 <section style="background: #f4f4f4;">
    <div class="container-fuid">
        <h2 class="h2 text-center mb-3 pt-3"><?php echo $post->title ?></h2>
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
                        <a href="#" class="list-group-item list-group-item-action">Admin</a>
                        <a href="#" class="list-group-item list-group-item-action">Candidates</a>
                        <a href="#" class="list-group-item list-group-item-action disabled">Voters</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9 pr-5">
				<div class="media">
				  <img class="img-icon rounded img-thumbnail mr-3" src="images/avatar/<?php echo $post->avatar ?>" alt="User Avatar">
				  <div class="media-body">
				    <?php echo $post->body; ?>
					<?php if($replies == null): ?>
						<p>There are no replies yet</p>
					<?php else:	?>
						<ul class="list-unstyled">
							<?php foreach($replies as $reply): ?>
							  <li class="media">
							    <img class="img-icon rounded img-thumbnail mr-3" src="images/avatar/<?php echo $reply->avatar ?>" alt="User avatar">
							    <div class="media-body">
							      <?php echo $reply->body; ?>
							      <p>Author : <strong><?php echo $reply->first_name; ?></strong></p>
							    </div>
							  </li>
							<?php endforeach; ?>
						</ul> 
					<?php endif; ?> 
				  </div>
				</div>

		        <div class="row">
		            <div class="col-md-11">
		                <hr>
		                <?php if(logged_in()) : ?>
			                <form action="reply.php" method="post">
			                	<input type="hidden" name="post_id" value="<?php echo $post->id; ?>">
			                    <div class="form-group">
			                        <label for="body">Reply Body</label>
			                        <textarea id="body" name="body" class="form-control" rows="8" cols="80" ></textarea>
			                        <script type="text/javascript">
			                        	CKEDITOR.replace('body');
			                        </script>
			                    </div>
			  
			                    <div class="col-md-2">
			                        <button type="submit" name="reply" class="btn btn-secondary">Submit</button>
			                    </div>
			                </form>
		            	<?php endif; ?>
		            </div>
		        </div>
            </div>
        </div>
    </div>
</section>


<?php include('includes/footer.php'); ?>