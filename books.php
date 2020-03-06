<?php
 require 'process.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>КЭУП - Учебные пособия</title>
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
      <li class="nav-item ">
  
        <a class="nav-link" href="author.php">Авторы</a>
      </li>
      <li class="nav-item active">
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
		<input type="hidden" name="id" value="<?php echo $bookID; ?>">

		<label for="">Название</label>
		<input type="text" name="bookName" class="form-control" value="<?php echo $bookName; ?>" placeholder ="Введите название">
		</div>
		
		<div class="form-group">
		<label for="">Издательство</label>

		<?php
		$mysqli = new mysqli('localhost', 'root','','college') or die(mysqli_error($mysqli));
		$result = $mysqli->query("SELECT * from издательство") or die($mysqli->error);
		 ?>
		 
		 <select size="1" class="custom-select" name="bookIzd">
		    <option disabled value ="diss">Выберите нужное издательство	</option>

		<?php while($myrow = mysqli_fetch_assoc($result)) { ?>

		 <option name="bookIzd" value ="<?php echo $myrow['кодИздательства']; ?>"><?php echo $myrow['название']; ?></option>

		<?php }
		            ?>
		        </select>	
		</div>


		<div class="form-group">
		<label for="">Дата издания</label>

		<input type="date" name="bookDate" class="form-control" value="<?php echo $bookDate; ?>">
		</div>
		<div class="form-group">
		<label for="">Кол-во страниц</label>
		<input type="number" name="bookStr" class="form-control" value="<?php echo $bookStr; ?>" placeholder ="Введите кол-во страниц">
		</div>

		<div class="form-group">
		<label for="">Автор <a href="avtorPosobie.php?bookID=<?php echo $bookID; ?>"><i class="fas fa-pen"></i></a></label> <br>
		<input type="number" readonly name="bookAvtor" class="form-control" value="<?php echo $bookAvtor; ?>" placeholder ="Недоступно для изменения"> 
		</div>

		<div class="form-group">


			<?php 
				if ($update == true):
			?>

		<button type="submit" class="btn btn-secondary" name="updateBook">Применить изменения</button>
		<?php 
				else:
			?>
		<button type="submit" class="btn btn-dark" name="saveBook">Добавить книгу</button>
		<?php 
				endif;
			?>
		</div>
	
	</form>

	</div>



	<div class="col-md-9">
	<?php
		$mysqli = new mysqli('localhost', 'root','','college') or die(mysqli_error($mysqli));
		$result = $mysqli->query("SELECT
  учебноепособие.*,
  издательство.название AS издНАз
FROM учебноепособие
  INNER JOIN издательство
    ON учебноепособие.издательство = издательство.кодИздательства") or die($mysqli->error);
	?>


		<table class="table table-dark table-hover">
			<thead>
				<tr>
					<th>Номер</th>
					<th>Название</th>
					<th>Дата издания</th>
					<th>Издательство</th>
			
					<th colspan="2">Действие</th>
				</tr>
			</thead>
				<?php while($row =$result->fetch_assoc()): ?>
					<tr>
						<td><?php echo $row['кодПособия']; ?></td>
						<td><?php echo $row['название']; ?></td>
						<td><?php echo $row['датаИздания']; ?></td>
						<td><?php echo $row['издНАз']; ?></td>
						<td>
							<a href="books.php?details=<?php echo $row['кодПособия']; ?>" class="btn btn-dark"><i class="fa fa-info" aria-hidden="true"></i></a>
							<a href="books.php?editBook=<?php echo $row['кодПособия']; ?>" class="btn btn-dark">    	<i class="fas fa-pen"></i> </a>
							<a href="process.php?deliteBook=<?php echo $row['кодПособия']; ?>" class="btn btn-dark"><i class="far fa-trash-alt"></i> </a>


						</td>
					</tr>
				<?php endwhile; ?>
		</table>



</div>
</div>


	
</body>
</html>