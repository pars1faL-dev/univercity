<?php 
	session_start()
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Профиль поступающего</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<?php 
		$con = mysqli_connect('127.0.0.1', 'root','','42'); 
    	$query = mysqli_query($con, "SELECT * FROM students WHERE id='{$_SESSION['students_id']}'");
  	  	$stroka = $query->fetch_assoc();
	 ?>
	
	<?php if($_SESSION['students_id'] == null){ ?>
		<div class="col-10 mx-auto">
			<h3>Войдите как абитуриент</h3>
			<p>Вы не авторизованы</p>
			<a href="loginStudent.php">Авторизация абитуриента</a>
		</div>
	<?php } else { ?>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  		<a class="navbar-brand" href="#"><?php echo "Привет, " . $stroka["fio"]; ?></a>
	  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    		<span class="navbar-toggler-icon"></span>
	  		</button>
	 		<div class="collapse navbar-collapse" id="navbarNav">
	    		<ul class="navbar-nav">
	     			<li class="nav-item">
	        			<a href="signOutStudent.php" class="nav-link text-danger">Выйти</a>
	      			</li>
	      			<li class="nav-item">
	       				<a class="nav-link" href="index.php">Главная</a>
	      			</li>
	    		</ul>
	 		</div>
		</nav>
		<div class="col-10 mx-auto mt-5">
			<div class="row">
				<?php 
					$con = mysqli_connect('127.0.0.1', 'root','','42'); 
    				$query = mysqli_query($con, "SELECT * FROM works");
  	  				$stroka = $query->fetch_assoc();
				 ?>
				<div class="col-3 border py-3 rounded">
					<h5>Добавить работу</h5>
					<form action="addWork.php" method="POST" enctype="multipart/form-data">
						<input class="mt-3 form-control" type="" placeholder="Описание" name="description">
						<input placeholder="Выбрать файл" class="mt-3" type="file" name="file">
						<button class="btn btn-success mt-3">Загрузить работу в портфолио</button>
					</form>
				</div>
				
				<!--Вывод работ-->
				<div class="col-3">
					<img class="w-100" src="<?php echo $stroka["file"] ?>">
					<p><?php echo $stroka["desc"]; ?></p>
				</div>	
			</div>
			<div class=" mt-5">
				<h3>Мои заявки в университеты</h3>		
					<?php 
						$con = mysqli_connect('127.0.0.1', 'root','','42'); 
            			$query = mysqli_query($con, "SELECT * FROM application");
						for ($i=0;$i<mysqli_num_rows($query);$i++){ 
							$stroka = $query->fetch_assoc();
					 ?>
						<div class="col-3">
							<img class="w-100" src="<?php echo $stroka["photo"] ?>">
							<h4><?php echo $stroka["name"]; ?></h4>
							<p><?php echo $stroka["description"]; ?></p>
							<form>
								<input style="display: none" class="form-control" type="text" name="id" value="<?php echo $stroka["id"] ?>">
                    			<input style="display: none" class="form-control" type="text" name="name" value="<?php echo $stroka["name"] ?>">
                    			<input style="display: none" class="form-control" type="text" name="description" value="<?php echo $stroka["description"] ?>">
                    			<input style="display: none" class="form-control" type="text" name="photo" value="<?php echo $stroka["photo"] ?>">	
							</form>		
						</div>
					<?php } ?>
			</div>
		</div>
	<?php } ?>
</body> 
</html>
