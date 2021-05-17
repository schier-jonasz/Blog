<?php
function Connect(){
	$user = 'root';
	$pass = '';
	$db = 'registration';
	
	$db = new mysqli('localhost', $user, $pass, $db) or die("Błąd połączenia z bazą");
	echo "Connected";
	
	session_start();
	return $db;
}

function DestroyFail(){
	unset($_SESSION['login_success']);
	session_destroy();
}
?>