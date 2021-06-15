<html>
	<head>
	<?php include 'func.php'; ?>
	</head>
		<meta charset = "UTF-8">
	<body>
	<button><a href = "ReadPosts.php">Przejdź do postów</a></button><br /><br />
	<?php
		$readTitle = fopen("posty.txt", "r");
		if($readTitle){
			$showTitle = false;
			$i = 1;
			while(($line = fgets($readTitle)) !== false && $i < 4){
				if($line == "titlestarter.\n"){
					$showTitle = true;
				}
				if($line == "titlestoper.\n"){
					$showTitle = false;
				}
				if($showTitle && $line != "titlestarter.\n"){
					echo "<form action = 'SelectPost.php' method = 'post'>";
					echo "<input type = 'submit' name = '",$i,"' value = '",$line,"'>";
					echo "</form>";
					$i++;
				}
			}
		}
		fclose($readTitle);
		/*$readTitle = fopen("posty.txt", "r");
		if(isSet($_SESSION['read_post'])){
			PostReader($_SESSION['read_post'], $readTitle);
		}
		fclose($readTitle);*/
	?>

	</body>
</html>