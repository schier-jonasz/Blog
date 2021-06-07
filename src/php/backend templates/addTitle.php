<?php
	$user = 'root';
	$pass = '';
	$db = 'registration';
	
	$db = new mysqli('localhost', $user, $pass, $db) or die("Błąd połączenia z bazą");
	
	session_start();
	
	$_SESSION['title_set'] = true;
	
	$title = $_POST['tytul'];
	//mysqli_query($db, "INSERT INTO posts (`Tytul`) VALUES ('$title')");
	file_put_contents("NewPost.txt", "titlestarter.\n", FILE_APPEND);
	file_put_contents("NewPost.txt", $title, FILE_APPEND);
	file_put_contents("NewPost.txt", "\n", FILE_APPEND);
	file_put_contents("NewPost.txt", "titlestoper.\n", FILE_APPEND);
	
	
	header("Location: CreatePost.php");
?>