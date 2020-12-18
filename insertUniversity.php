<?php 
	$con = mysqli_connect('127.0.0.1', 'root','','42');
	$query = mysqli_query($con, "INSERT INTO application (id, name, description, photo) VALUES ('{$_GET["id"]}','{$_GET["name"]}','{$_GET["description"]}','{$_GET["photo"]}')");
	header("Location: accountStudent.php");
 ?>