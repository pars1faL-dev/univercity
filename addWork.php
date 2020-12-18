<?php 
	$image_dir = "img/"
	$image_name = $image_dir . basename($_FILES['file']['name']);

	$upload = move_uploaded_file($_FILES['file']['tmp_name']), $image_name);
	$con = mysqli_connect('127.0.0.1', 'root','','42');
	if ($upload==false) {
		echo "Не работает";
	} else{
		echo "работает";
		$query = mysqli_query($con, "INSERT INTO works (description, file) SET avatar='{$image_name}' WHERE id='1'");
	}
 ?>