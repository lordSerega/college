<?php 
	session_start();
	error_reporting(-1);
ini_set('display_errors', 1);

	$mysqli = new mysqli('localhost', 'root','','college') or die(mysqli_error($mysqli));

	$update = false;
		$authorUP = false;
	$izdName ='';
	$name ='';
	$fam ='';
	$lastname ='';
	$id = 0;
	$idAut = 0;
	$idBook=  0;
	$bookName ='';
	$bookIzd ='diss';
	$bookDate ='';
	$bookStr ='';
	$bookName ='';
	$bookAvtor ='';


	if (isset($_POST['saveIzd'])){
		$izdName = $_POST['izdName'];


	try {
	$mysqli->query("INSERT INTO издательство (название) VALUES ('$izdName')");



	header("location: index.php");
	} catch (Exception $mysqli_error) {
		
		header("location: index.php");
		
		}


	}

if (isset($_POST['addAvv'])){
		$IDBOOK = $_POST['id'];
		$avv = $_POST['avtor'];



	try {
	$mysqli->query("INSERT INTO авторпособия (автор, пособие) VALUES ('$avv','$IDBOOK')");



	header("location: books.php");
	} catch (Exception $mysqli_error) {
		
		header("location: books.php");
		
		}


	}


	if (isset($_GET['deleteIzd'])){
		$id = $_GET['deleteIzd'];
		$mysqli->query("DELETE FROM издательство WHERE кодИздательства=$id") or die ($mysqli->error());


		header("location: index.php");
	}

		if (isset($_GET['editIzd'])){
		$id = $_GET['editIzd'];
		$update = true;
		$result = $mysqli->query("SELECT * FROM издательство WHERE кодИздательства=$id") or die($mysqli->error());

	
			$row = $result->fetch_array();
			$izdName = $row['название'];

	}


		if (isset($_POST['updateIzd'])){
		$id = $_POST['id'];
		$izdName = $_POST['izdName'];
	


		$mysqli->query("UPDATE `издательство` SET `название`='$izdName' WHERE `кодИздательства` = $id ") or die($mysqli->error);

		
		header("location: index.php");
		}



	if (isset($_POST['saveAut'])){
		$fam = $_POST['fam'];
		$name = $_POST['name'];
		$lastname = $_POST['lastname'];


	try {
	$mysqli->query("INSERT INTO автор (фамилия, имя, отчество) VALUES ('$fam','$name','$lastname')");

	

	header("location: author.php");
	} catch (Exception $mysqli_error) {
		
		header("location: author.php");
		
		}
	}




	if (isset($_GET['deleteAut'])){
		$idAut = $_GET['deleteAut'];
		$mysqli->query("DELETE FROM автор WHERE кодАвтора=$idAut") or die ($mysqli->error());

	
		header("location: author.php");
	}

		if (isset($_GET['editAut'])){
		$idAut = $_GET['editAut'];
		$update = true;
		$result = $mysqli->query("SELECT * FROM автор WHERE кодАвтора=$idAut") or die($mysqli->error());

	
			$row = $result->fetch_array();
			$fam = $row['фамилия'];
			$name = $row['имя'];
			$lastname = $row['отчество'];

	}


		if (isset($_POST['updateAut'])){
		$idAut = $_POST['id'];
		$fam = $_POST['fam'];
		$name = $_POST['name'];
		$lastname = $_POST['lastname'];

	


		$mysqli->query("UPDATE `автор` SET `фамилия`='$fam',`имя`='$name',`отчество`='$lastname' WHERE `кодАвтора` = $idAut ") or die($mysqli->error);

		
		header("location: author.php");
		}
















		if (isset($_POST['saveBook'])){
		$bookName = $_POST['bookName'];
		$bookIzd = $_POST['bookIzd'];
		$bookDate = $_POST['bookDate'];
		$bookStr = $_POST['bookStr'];


	try {
	$mysqli->query("INSERT INTO учебноепособие (название, издательство, датаИздания, страницы) VALUES ('$bookName','$bookIzd','$bookDate','$bookStr')");


	header("location: books.php");
	} catch (Exception $mysqli_error) {
	
		header("location: books.php");
		
		}
	}




	if (isset($_GET['deliteBook'])){
		$bookID = $_GET['deliteBook'];
		$mysqli->query("DELETE FROM учебноепособие WHERE кодПособия=$bookID") or die ($mysqli->error());


		header("location: books.php");
	}

		if (isset($_GET['deliteAvrot'])){
		$deleted = $_GET['deliteAvrot'];
		$mysqli->query("DELETE FROM авторпособия WHERE кодАвтораПособия=$deleted") or die ($mysqli->error());


		header("location: books.php");
	}


		if (isset($_GET['editBook'])){
		$bookID = $_GET['editBook'];
		$update = true;
		$result = $mysqli->query("SELECT * FROM учебноепособие WHERE кодПособия=$bookID") or die($mysqli->error());

	
			$row = $result->fetch_array();
			$bookName = $row['название'];
			$bookIzd = $row['издательство'];
			$bookDate = $row['датаИздания'];
			$bookStr = $row['страницы'];

	}

	if (isset($_GET['editBookAvtor'])){
		$authorUP = true;
		header("location: books.php");

	}


		if (isset($_POST['updateBook'])){
		$bookID = $_POST['id'];
		$bookName = $_POST['bookName'];
		$bookIzd = $_POST['bookIzd'];
		$bookDate = $_POST['bookDate'];
		$bookStr = $_POST['bookStr'];

	


		$mysqli->query("UPDATE `учебноепособие` SET `название`='$bookName',`издательство`='$bookIzd',`датаИздания`='$bookDate',`страницы`='$bookStr'  WHERE `кодПособия` = $bookID") or die($mysqli->error);

	
		header("location: books.php");
		}



	?>