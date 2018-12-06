<?php include('includes/header.php') ?>

<main style="background: #f4f4f4;" class="p-3">
	<form action="castvote.php" method="POST">
		<?php foreach ($data as $position => $candidates): ?>
			<div class="card m-3">
				<h5 style="background : skyblue;" class="card-header text-white"><?php echo $position; ?></h5>
				<div class="card-body d-flex justify-content-around">
					<?php if ($candidates != null): ?>
						<?php foreach ($candidates as $candidate): ?>
							<div class="d-inline mr-5"><?php echo($candidate->first_name . ' ' . $candidate->last_name); ?>
							<input type="radio" name="<?php echo($position); ?>" /></div>
						<?php endforeach ?>
					<?php else: ?>
						No candidates yet
					<?php endif ?>
				</div>
			</div>
		<?php endforeach ?>
		<button type="submit" name="vote" class="btn btn-outline-primary ml-3">Submit Vote</button>
		<button type="reset" class="btn btn-outline-secondary float-right mr-3">Reset</button>
	</form>
</main>
<?php include('includes/footer.php') ?>