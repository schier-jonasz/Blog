<?php
	session_start();
	$comment = $_POST['komentarz'];
	$path = "comments/";
	$path .= $_SESSION['save_title'];
	$path = trim($path);
	$path .= ".txt";
	$data = date('m/d/Y h:i:s a', time());
	//echo $_SERVER['DOCUMENT_ROOT'];
	file_put_contents($path, "usernamestart.\n", FILE_APPEND);
	file_put_contents($path, $_SESSION['usernick'], FILE_APPEND);
	file_put_contents($path, "\n", FILE_APPEND);
	file_put_contents($path, "usernamestop.\n", FILE_APPEND);
	file_put_contents($path, "datastart.\n", FILE_APPEND);
	file_put_contents($path, $data, FILE_APPEND);
	file_put_contents($path, "\n", FILE_APPEND);
	file_put_contents($path, "datastop.\n", FILE_APPEND);
	file_put_contents($path, "commentstart.\n", FILE_APPEND);
	file_put_contents($path, $comment, FILE_APPEND);
	file_put_contents($path, "\n", FILE_APPEND);
	file_put_contents($path, "commentstop.\n", FILE_APPEND);
	header("Location: ReadPosts.php");
?>