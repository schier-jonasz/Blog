<?php
function Connect(){
	$user = 'root';
	$pass = '';
	$db = 'registration';
	
	$db = new mysqli('localhost', $user, $pass, $db) or die("Błąd połączenia z bazą");
	
	session_start();
	return $db;
}

function DestroyFail(){
	unset($_SESSION['login_success']);
	session_destroy();
}

function DestroyLoginExists(){
	unset($_SESSION['login_exists']);
	session_destroy();
}

function DestroyEmailExists(){
	unset($_SESSION['email_exists']);
	session_destroy();
}
?>