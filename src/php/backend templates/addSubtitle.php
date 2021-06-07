<?php	
	$subtitle = $_POST['podtytul'];
	file_put_contents("NewPost.txt", "subtitlestarter.\n", FILE_APPEND);
	file_put_contents("NewPost.txt", $subtitle, FILE_APPEND);
	file_put_contents("NewPost.txt", "\n", FILE_APPEND);
	file_put_contents("NewPost.txt", "subtitlestoper.\n", FILE_APPEND);
	
	
	header("Location: CreatePost.php");
?>