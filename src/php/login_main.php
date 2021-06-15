<?php include 'Register.php';?>
<?php $db = Connect(); ?>
<?php 
	$login = $_POST['email'];
	$password = $_POST['password'];
	$check_login_data = mysqli_query($db, "SELECT DISTINCT * FROM users WHERE username = '$login' AND password = '$password'");
	if(mysqli_num_rows($check_login_data) == 1){
		$_SESSION['login_success'] = true;
		$_SESSION['username'] = $login;
	}
	else{
		$_SESSION['login_fail'] = false;
	}
	header("Location: Login.php");
?>