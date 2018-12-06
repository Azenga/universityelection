<?php include 'includes/header.php'; ?>
 <section>
    <div class="container-fuid" style="background: #f4f4f4;">
        <h2 class="h2 text-center mb-3 pt-3">Candidature Application</h2>
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
            	<form action="applications.php" method="POST"">
			        <div class="row">
			            <div class="col-md-11">
			                <hr>
			                <form action="login.php" method="post">
			                    <div class="form-group">
			                        <label for="position">Position</label>
			                        <select class="form-control" id="position" name="position_id">
			                        	<option value="">--Select Position--</option>
			                        	<?php if($positions != null): ?>
			                        		<?php foreach($positions as $position): ?>
			                        			<option value="<?php echo($position->id); ?>"><?php echo($position->name); ?></option>
			                        		<?php endforeach; ?>
			                        	<?php endif; ?>
			                        </select>
			                    </div>
			                    <div class="form-group">
			                        <label for="body">Manifesto</label>
			                        <textarea id="body" name="manifesto" class="form-control" rows="8" cols="80" ></textarea>
			                        <script type="text/javascript">
			                        	CKEDITOR.replace('body');
			                        </script>
			                    </div>
			  
			                    <div class="col-md-2">
			                        <button type="submit" name="apply-candidature" class="btn btn-secondary">Submit</button>
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