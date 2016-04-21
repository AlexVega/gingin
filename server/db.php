<?php 

	$db = mysqli_connect('localhost', 'root', 'root', 'gingin');
    //$db = mysqli_connect('localhost', 'e97f8ad78309', 'programacion2014', 'gingin_dbcontact');
	if(mysqli_connect_errno())
	{
		echo 'Failed to connect to MySQL: '.mysqli_connect_error();
	}

 ?>
