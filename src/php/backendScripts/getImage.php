<?php
	session_start();
	$_SESSION['image_set'] = true;
	$targetPath = "../../assets/images/";
	$saveName = basename( $_FILES['userFile']['name'] );
	$targetPath = $targetPath.basename( $_FILES['userFile']['name'] );
	
	file_put_contents("NewPost.txt", "imagestarter.\n", FILE_APPEND);
	file_put_contents("NewPost.txt", $saveName, FILE_APPEND);
	file_put_contents("NewPost.txt", "\n", FILE_APPEND);
	file_put_contents("NewPost.txt", "imagestoper.\n", FILE_APPEND);
	
	file_put_contents("NewPost.txt", "datestarter.\n", FILE_APPEND);
	file_put_contents("NewPost.txt", date('F j Y'), FILE_APPEND);
	file_put_contents("NewPost.txt", "\n", FILE_APPEND);
	file_put_contents("NewPost.txt", "datestoper.\n", FILE_APPEND);
	
	move_uploaded_file( $_FILES['userFile']['tmp_name'], $targetPath );

	header("Location: CreatePost.php");
?>