<?php
	$user = 'root';
	$pass = '';
	$db = 'registration';
	
	$db = new mysqli('localhost', $user, $pass, $db) or die("Błąd połączenia z bazą");
	
	session_start();
	
	//$_SESSION['post_selected'] = $_POST['post_number'];
	$readTitle = fopen("posty.txt", "r");
		if($readTitle){
			$i = 1;
			while(($line = fgets($readTitle)) !== false){
				if(isSet($_POST[$i])){
					$_SESSION['read_post'] = $i;
				}
				$i++;
			}
		}
		/*foreach($_POST as $key=>$value){
			echo "$key = $value";
		}*/
	header("Location: ReadPosts.php");	
?>