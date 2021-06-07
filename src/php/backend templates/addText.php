<?php	
	$text = $_POST['tresc'];
	file_put_contents("NewPost.txt", "textstarter.\n", FILE_APPEND);
	file_put_contents("NewPost.txt", $text, FILE_APPEND);
	file_put_contents("NewPost.txt", "\n", FILE_APPEND);
	file_put_contents("NewPost.txt", "textstoper.\n", FILE_APPEND);
	
	
	header("Location: CreatePost.php");
?>