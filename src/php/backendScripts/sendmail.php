<?php
	$name = $_POST['name'];
	$visitorMail = $_POST['email'];
	$message = $_POST['message'];
	if(empty($name) || empty($visitorMail)){
		header("Location: ../contact.php");
	}
	$emailFrom = '';
	$emailSubject = "Nowy mail submission";
	$emailBody = "Otrzymałeś wiadomość od użytkownika $name.\n".
		"adres email: $visitorMail \n".
		"Treść wiadomości: \n $message".
		
	$to = "";
	$headers = "From: $emailFrom \r\n";
	
	mail($to, $emailSubject, $emailBody, $headers);
	header("Location: ../contact.php");
?>