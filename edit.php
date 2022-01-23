<!-- Start of Header -->
<?php 
	 include_once('header.php'); 
 ?>
<!-- End of Header -->


	<!-- Start of Main Body -->
	<div class="container mt-5">
		<div class="card shadow-sm bg-white">
			<div class="card-header bg-dark">
				<h4 class="text-light">EDIT USER</h4>
			</div>

			<div class="card-body">
				<a href="view.php" class="btn btn-primary">View All Users</a>
				<hr/>
				<?php 

					session_start();
					if(isset($_SESSION['success']))
					{
						?>
						<div class="alert alert-success">
							<b><?php  echo $_SESSION['success'] ?></b>
						</div>

						<?php
						unset($_SESSION['success']);
					}else if(isset($_SESSION['error'])){
						?>
						<div class="alert alert-danger">
							<b><?php  echo $_SESSION['error'] ?></b>
						</div>
						<?php
						unset($_SESSION['error']);
					}


					/***Getting User Id and Data******/
					$id = $_GET['id'];
					require 'database.php';
					$query = "SELECT * FROM `users` WHERE `user_id`=".$id;
					$result = mysqli_query($connection_status, $query);
					$row = mysqli_fetch_assoc($result);

				?>
				<form method="POST" action="process.php">
					<div class="form-group mb-2">
						<label>Full Name</label>
						<input type="hidden" value="<?php echo $id?>" name="user_id" required>
						<input type="text" value="<?php  echo $row['fullname'] ?>"  minlength="3" maxlength="30" name="full_name" placeholder="Enter fullname" required class="form-control"> 
					</div>


					<div class="form-group mb-2">
						<label>Email</label>
						<input type="email" value="<?php  echo $row['email'] ?>"  maxlength="30" name="email" placeholder="Enter Email Address" required class="form-control"> 
					</div>

					<div class="form-group mb-2">
						<label>Address</label>
						<textarea name="address" placeholder="Enter your address" required class="form-control"><?php  echo $row['address'] ?>
						</textarea>
					</div>

					<div class="form-group mt-3">
						<button type="submit" name="editBtn" class="btn btn-dark">Update User</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- End of Main Body -->

<!-- Start of Footer -->
<?php  include_once('footer.php') ?>
<!-- End of Footer -->
	