<?php
	function PostReader($postNumber, $readFile){
		$i = 1;
		$showTitle = false;
		$showSubtitle = false;
		$showText = false;
		while(($line = fgets($readFile)) !== false){
			if($line == "titlestarter.\n" && $i == $postNumber){
				$showTitle = true;
			}
			if($line == "titlestoper.\n"){
				$showTitle = false;
			}
			if($showTitle && $line != "titlestarter.\n"){
				echo "<font color = 'blue'>" ,$line, "<br />";
				echo "</font>";
				$saveTitle = $line;
			}
			if($line == "subtitlestarter.\n" && $i == $postNumber){
				$showSubtitle = true;
			}
			if($line == "subtitlestoper.\n"){
				$showSubtitle = false;
			}
			if($showSubtitle && $line != "subtitlestarter.\n"){
				echo "<font color = 'red'>" ,$line, "<br />";
				echo "</font>";
			}
			if($line == "textstarter.\n" && $i == $postNumber){
				$showText = true;
			}
			if($line == "textstoper.\n"){
				$showText = false;
			}
			if($showText && $line != "textstarter.\n"){
				echo $line, "<br />";
			}
			if($line == "ender.\n"){
				$i++;
			}
		}
		return $saveTitle;
	}
	
	function ReadTitles($readTitle){
		$showTitle = false;
		$i = 1;
		while(($line = fgets($readTitle)) !== false){
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
	
	function ReadComments($path){
		$readComments = fopen($path, 'r');
		$showUsername = false;
		$showData = false;
		$showComment = false;
		$i = 0;
		while(($line = fgets($readComments)) !== false){
			if($line == "usernamestart.\n"){
				$showUsername = true;
			}
			if($line == "usernamestop.\n"){
				$showUsername = false;
			}
			if($line != "usernamestart.\n" && $showUsername){
				echo "Użytkownik: <font color = 'red'>";
				echo $line;
				echo "</font>";
				if(isSet($_SESSION['usernick'])){
					$line = str_replace(array("\n", "\r"), '', $line);
					//preg_replace('/\s+/', '', $line);
					if($line === $_SESSION['usernick']){
						echo "<form action = 'RemoveComment.php' method = 'post'>";
						echo "<input type = 'submit' value = 'X' name = ",$i," >";
						echo "</form>";
						$i++;
					}
				}
				echo "dodał komentarz o godzinie: ";
			}
			if($line == "datastart.\n"){
				$showData = true;
			}
			if($line == "datastop.\n"){
				$showData = false;
			}
			if($line != "datastart.\n" && $showData){
				echo "<font color = 'blue'>";
				echo $line;
				echo "</font><br />";
			}
			if($line == "commentstart.\n"){
				$showComment = true;
			}
			if($line == "commentstop.\n"){
				$showComment = false;
			}
			if($line != "commentstart.\n" && $showComment){
				echo $line;
				echo "<br /><br />";
			}
		}
		fclose($readComments);
	}
?>