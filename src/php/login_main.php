<?php include 'Register.php';?>
<?php $db = Connect(); ?>
<?php 
	$login = $_POST['email'];
	$password = $_POST['password'];
	$check_login_data = mysqli_query($db, "SELECT DISTINCT * FROM users WHERE username = '$login' AND password = '$password'");
	if(mysqli_num_rows($check_login_data) == 1){
		$_SESSION['login'] = true;
	}
	else{
		$_SESSION['login'] = false;
	}
	header("Location: login_wip.php");
?>