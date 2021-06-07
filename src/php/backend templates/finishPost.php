<?php
	session_start();
	file_put_contents("NewPost.txt", "ender.\n", FILE_APPEND);
	$postOrigin = fopen('posty.txt', 'r');
	while(($line = fgets($postOrigin)) !== false){
		file_put_contents("NewPost.txt", $line, FILE_APPEND);
	}
	fclose($postOrigin);
	$rewritePost = fopen('NewPost.txt', 'r');
	unlink('posty.txt');
	while(($line = fgets($rewritePost)) !== false){
		file_put_contents("posty.txt", $line, FILE_APPEND);
	}
	unlink('NewPost.txt');
	if(isSet($_SESSION['title_set'])){
		unset($_SESSION['title_set']);
		session_destroy();
	}
	header("Location: ReadPosts.php");
?>