<html>
<?php
	$user = 'root';
	$pass = '';
	$db = 'registration';
	
	$db = new mysqli('localhost', $user, $pass, $db) or die("Błąd połączenia z bazą");
	
	session_start();
?>
	<head>
	</head>
		<meta charset = "UTF-8">
	<body>
	<?php
	if(!isSet($_SESSION['title_set'])){
		?>
		<form action = "addTitle.php" method = "post">
		Dodaj tytuł posta<br />
		<input type = "text" name = "tytul"><br />
		<input type = "submit" value = "Dodaj"><br />
		</form>
	<?php } ?>
		<form action = "addSubtitle.php" method = "post">
		Dodaj podtytuł posta<br />
		<input type = "text" name = "podtytul"><br />
		<input type = "submit" value = "Dodaj"><br />
		</form>
		
		<form action = "addText.php" method = "post">
		Dodaj treść posta<br />
		<input type = "textarea" name = "tresc"><br />
		<input type = "submit" value = "Dodaj"><br />
		</form>
		<button><a href = "finishPost.php">Zakończ</button>
	</body>
</html>