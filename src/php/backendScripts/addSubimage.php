<?php
	$targetPath = "../../assets/images/";
	$saveName = basename( $_FILES['userSubimage']['name'] );
	$targetPath = $targetPath.basename( $_FILES['userSubimage']['name'] );
	
	file_put_contents("NewPost.txt", "subimagestarter.\n", FILE_APPEND);
	file_put_contents("NewPost.txt", $saveName, FILE_APPEND);
	file_put_contents("NewPost.txt", "\n", FILE_APPEND);
	file_put_contents("NewPost.txt", "subimagestoper.\n", FILE_APPEND);

	move_uploaded_file( $_FILES['userSubimage']['tmp_name'], $targetPath );

	header("Location: CreatePost.php");
?>