<!-- Start of Header -->
<?php 
	 include_once('header.php'); 
 ?>
<!-- End of Header -->


	<!-- Start of Main Body -->
	<div class="container mt-5">
		<div class="card shadow-sm bg-white">
			<div class="card-header bg-dark">
				<h4 class="text-light">VIEW USERS</h4>
			</div>

			<div class="card-body">
				<a href="index.php" class="btn btn-primary">Add User</a>
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


				?>
				<table class="table table-responsive table-bordered table-hover">
					<thead>
						<tr>
							<th>SR#</th>
							<th>Full Name</th>
							<th>Email</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 


							require 'database.php';
							$query = "SELECT * FROM `users`";
							$result = mysqli_query($connection_status,$query);
							$a = 0;
							if(mysqli_num_rows($result) > 0 ){

								while($row  = mysqli_fetch_assoc($result))
								{
									?>
									<tr>
										<td><?php echo ++$a; ?></td>
										<td><?php echo $row['fullname']; ?></td>
										<td><?php echo $row['email']; ?></td>
										<td><?php echo $row['address']; ?></td>
										<td>
											<a class="btn btn-primary" href="edit.php?id=<?php echo $row['user_id'] ?>">Edit</a>

											<a class="btn btn-danger" href="process.php?action=delete&id=<?php echo $row['user_id'] ?>">Delete</a>
										</td>
									</tr>
									<?php
								}
							}else{
								?>
								<tr>
									<td colspan="5" align="center"><b>No Users Found</b></td>
								</tr>
								<?php
							}

						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- End of Main Body -->

<!-- Start of Footer -->
<?php  include_once('footer.php') ?>
<!-- End of Footer -->
	