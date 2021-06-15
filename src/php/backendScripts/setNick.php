<?php
	session_start();
	$_SESSION['usernick'] = $_POST['post_number'];
	header("Location: ReadPosts.php");
?>