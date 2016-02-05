<?php 

	$db = mysqli_connect('localhost', 'root', 'root', 'scotchbox');
	if(mysqli_connect_errno())
	{
		echo 'Failed to connect to MySQL: '.mysqli_connect_error();
	}

 ?>