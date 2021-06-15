<?php include 'Register.php';?>
<?php $db = Connect(); ?>
<?php
	$login = $_POST['username'];
	$email = $_POST['email'];
	$checkLoginExists = mysqli_query($db, "SELECT DISTINCT * FROM users WHERE username = '$login'");
	$checkEmailExists = mysqli_query($db, "SELECT DISTINCT * FROM users WHERE username = '$email'");
	if(mysqli_num_rows($checkLoginExists) == 1){
		$_SESSION['login_exists'] = true;
		header("Location: Registration.php");
	}
	else if(mysqli_num_rows($checkEmailExists) == 1){
		$_SESSION['email_exists'] = true;
		header("Location: Registration.php");
	}
	else{
		$password = $_POST['password'];
		mysqli_query($db, "INSERT INTO users (`username`, `email`, `password`) VALUES ('$login', '$email', '$password')");
		header("Location: Login.php");
	}
?>