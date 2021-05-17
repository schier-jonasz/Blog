<?php include 'Register.php';?>
<?php $db = Connect(); ?>
<?php
if(isSet($_SESSION['login_success']) || isSet($_SESSION['login_fail']))
{
	unset($_SESSION['login_success']);
	session_destroy();
	header("Location: login_wip.php");
}
?>