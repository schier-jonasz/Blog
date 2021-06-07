<?php
	session_start();
	if(isSet($_SESSION['usernick'])){
		unset($_SESSION['usernick']);
		//session_destroy();
	}
	header("Location: ReadPosts.php");
?>