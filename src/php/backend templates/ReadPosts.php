<html>
<?php include 'func.php'; ?>
<?php
	$user = 'root';
	$pass = '';
	$db = 'registration';
	
	$db = new mysqli('localhost', $user, $pass, $db) or die("Błąd połączenia z bazą");
	
	session_start();
	
	
?>
	<head>
	</head>
		<meta charset = "UTF-8">
	<body>
		<form action = "setNick.php" method = "post">
		<input type = "text" name = "post_number">
		Wybierz nick (test only) <br />
		<input type = "submit" value = "wybierz">
		<button><a href = "deleteNick.php">Usuń nick</a></button><br />
		</form>
		<?php
			/*if(isSet($_SESSION['post_selected'])){
				$readTitle = fopen("posty.txt", "r");
				if($readTitle){
					PostReader($_SESSION['post_selected'], $readTitle);
					fclose($readTitle);
				}
				
			}*/
		?>
		<button><a href = "CreatePost.php">Przejdź do tworzenia</a></button><br /><br />
		<button><a href = "RecentPosts.php">Przejdź do głównej</a></button><br /><br />
		<?php
			$readTitle = fopen("posty.txt", "r");
			if($readTitle){
				ReadTitles($readTitle);
			}
			fclose($readTitle);
			$readTitle = fopen("posty.txt", "r");
			if(isSet($_SESSION['read_post'])){
				$_SESSION['save_title'] = PostReader($_SESSION['read_post'], $readTitle);
			}
			fclose($readTitle);
		?>
		<?php
			if(isSet($_SESSION['usernick']) && isSet($_SESSION['read_post'])){
				?>
				<form action = "addComment.php" method = "post"><br/>
				Dodaj komentarz</br>
				<input type = "text" name = "komentarz"><br/>
				<input type = "submit" value = "Dodaj"><br />
				</form>
				<?php
			}
			if(!isSet($_SESSION['usernick']) && isSet($_SESSION['read_post'])){
				echo "<br /> Aby  dodać komentarz musisz się zalogować! <br /><br />";
			}
			if(isSet($_SESSION['read_post'])){
				$path = "comments/";
				$path .= $_SESSION['save_title'];
				$path = trim($path);
				$path .= ".txt";
				if(file_exists($path)){
					ReadComments($path);
				}
				else{
					echo "Ten post nie ma jeszcze żadnych komentarzy<br/>";
				}
			}
		?>
	</body>
</html>