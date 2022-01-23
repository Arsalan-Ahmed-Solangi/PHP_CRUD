<?php 


	//****start of Databse Connection******//
	require 'database.php';
	session_start();
	//**end of Databse Connection*******//


	//**Start of Add User********//
	if(isset($_POST['addBtn']))
	{
		extract($_POST);

		$query = "INSERT INTO `users` (`fullname`,`email`,`address`) VALUES ('$full_name','$email','$address')";
		$result = mysqli_query($connection_status,$query);

		if($result)
		{
			$_SESSION['success'] = "User Added Successfully!";
			header('location:index.php');
		}else{
			$_SESSION['error'] = "User Failed to add!";
			header('location:index.php');
		}
	}
	//**End of Add User********//

	//***Start of Delete User*****//
	if(isset($_GET['action']) && $_GET['action'] =="delete" && isset($_GET['id'])){

		$id = $_GET['id'];
		$query = "DELETE FROM `users` WHERE `user_id`=".$id;

		$result = mysqli_query($connection_status,$query);
		if($result)
		{
			$_SESSION['success'] = "User Deleted Successfully!";
			header('location:view.php');
		}else{
			$_SESSION['error'] = "User Failed to delete!";
			header('location:view.php');
		}
	}
	//***End of Delete User******//

	//**Start of Edit User********//
	if(isset($_POST['editBtn']))
	{
		extract($_POST);

		$query = "UPDATE `users` SET `fullname`='$full_name' , `email`='$email' , `address`='$address' WHERE `user_id`=".$user_id;
		$result = mysqli_query($connection_status,$query);

		if($result)
		{
			$_SESSION['success'] = "User Update Successfully!";
			header('location:view.php');
		}else{
			$_SESSION['error'] = "User Failed to update!";
			header('location:edit.php?id='.$user_id);
		}
	}
	//**End of Edit User********//


?>