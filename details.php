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



  <div class="container">
        <div class="row justify-content-center">


<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
  <div class="card-header">Учебное пособие #  <?= $id; ?></div>
  <div class="card-body">
    <h5 class="card-title"> <?= $dName; ?></h5>
    <p class="card-text">Издательство: <?= $dIzdName; ?> <br> Дата издания:  <?= $dDate; ?><br> Страниц:     <?= $dStr; ?> </p>
     <h6 class="card-text">Автор(ы): </h5>



		<?php
$mysqli = new mysqli('localhost', 'root','','college') or die(mysqli_error($mysqli));
		$result = $mysqli->query("SELECT
		  авторпособия.кодАвтораПособия,
		  автор.фамилия,
		  автор.кодАвтора,
		  автор.имя,
		  автор.отчество,
		  учебноепособие.кодПособия
		FROM авторпособия
		  INNER JOIN учебноепособие
		    ON авторпособия.пособие = учебноепособие.кодПособия
		  INNER JOIN автор
		    ON авторпособия.автор = автор.кодАвтора
		WHERE учебноепособие.кодПособия = $id
		AND авторпособия.пособие = $id") or die($mysqli->error); 

		 while($myrow = mysqli_fetch_assoc($result)) { ?>
             
                    
                    <p class="card-text"> <? echo $myrow['фамилия'].' '.$myrow['имя'].' '.$myrow['отчество']; ?></p>

    
                   
                    <?php } ?>
           </div>


		

           




  </div>
</div>



              
    </div>
</div>	


	
</body>
</html>