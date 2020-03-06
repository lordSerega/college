<?php require 'process.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>КЭУП - Авторы</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


  <script src="https://kit.fontawesome.com/147ad66cb5.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">КЭУП</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Издательства</a>
      </li>
      <li class="nav-item active">
  
        <a class="nav-link" href="author.php">Авторы</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="books.php">Учебные пособия</a>
      </li>
   
    </ul>
  </div>
</nav>

<br>
<div class="contaner m-3">
	<div class="row justify-content-md-center">
		<div class="col-md-3">

	<form action="process.php" method="POST">
		<div class="form-group">
		<input type="hidden" name="id" value="<?php echo $idAut; ?>">

		<label for="">Фамилия</label>
		<input type="text" name="fam" class="form-control" value="<?php echo $fam; ?>" placeholder ="Введите фамилию">
		</div>
			<div class="form-group">
		<label for="">Имя</label>
		<input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder ="Введите имя">
		</div>
			<div class="form-group">
		<label for="">Отчество</label>
		<input type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>" placeholder ="Введите отчество">
		</div>
		
		
		<div class="form-group">


			<?php 
				if ($update == true):
			?>

		<button type="submit" class="btn btn-secondary" name="updateAut">Изменить</button>
		<?php 
				else:
			?>
		<button type="submit" class="btn btn-dark" name="saveAut">Добавить автора</button>
		<?php 
				endif;
			?>
		</div>
	
	</form>

	</div>



	<div class="col-md-9">
	<?php
		$mysqli = new mysqli('localhost', 'root','','college') or die(mysqli_error($mysqli));
		$result = $mysqli->query("SELECT * FROM автор") or die($mysqli->error);
	?>


		<table class="table table-dark table-hover">
			<thead>
				<tr>
					<th>Номер</th>
					<th>Фамилия</th>
					<th>Имя</th>
					<th>Отчество</th>
			
					<th colspan="2">Действие</th>
				</tr>
			</thead>
				<?php while($row =$result->fetch_assoc()): ?>
					<tr>
						<td><?php echo $row['кодАвтора']; ?></td>
						<td><?php echo $row['фамилия']; ?></td>
						<td><?php echo $row['имя']; ?></td>
						<td><?php echo $row['отчество']; ?></td>
						<td>
							<a href="author.php?editAut=<?php echo $row['кодАвтора']; ?>" class="btn btn-secondary">    	<i class="fas fa-pen"></i> </a>
							<a href="process.php?deleteAut=<?php echo $row['кодАвтора']; ?>" class="btn btn-dark"><i class="far fa-trash-alt"></i> </a>
						</td>
					</tr>
				<?php endwhile; ?>
		</table>



</div>
</div>


	
</body>
</html>