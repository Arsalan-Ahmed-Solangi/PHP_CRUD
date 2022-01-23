<?php 


	//***start of variables******//
	$DB_HOST = "localhost";
	$DB_USER = "root";
	$DB_PASS = "";
	$DB_NAME = "core_php_crud";
	$connection_status = null;
	//***end of variables******//


	$connection_status = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

	if(mysqli_connect_errno()){
		echo "Connection Failed".mysqli_connect_error();
	}



?>