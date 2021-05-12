<?php include 'Register.php';?>
<?php $db = Connect(); ?>
<?php
if(isSet($_SESSION['login']))
{
	unset($_SESSION['login']);
	session_destroy();
	header("Location: login_wip.php");
}
?>