<?php include 'Register.php';?>
<?php $db = Connect(); ?>
<?php
	$login = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	mysqli_query($db, "INSERT INTO users (`username`, `email`, `password`) VALUES ('$login', '$email', '$password')"); 
?>
<?php header("Location: login_wip.php"); ?>