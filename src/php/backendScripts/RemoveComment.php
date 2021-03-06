<?php
	session_start();
	
	function SaveComments($fileName){
		$saveTmp = fopen($fileName, 'r');
		while(($line = fgets($saveTmp)) !== false){
			file_put_contents("savedata.txt", $line, FILE_APPEND);	
		}
		fclose($saveTmp);
	}
	
		$path = "../comments/";
		$path .= $_SESSION['save_title'];
		$path = trim($path);
		$path .= ".txt";
		$readComments = fopen($path, 'r');
		$showUsername = false;
		$showComment = false;
		$showThisComment = false;
		$i = 0;
		while(($line = fgets($readComments)) !== false){
			if($line == "usernamestart.\n"){
				$showUsername = true;
			}
			if($line == "usernamestop.\n"){
				$showUsername = false;
			}
			if($line != "usernamestart.\n" && $showUsername){	
				$checkNick = str_replace(array("\n", "\r"), '', $line);
				echo $checkNick, "<br />";
				if($checkNick == $_SESSION['username'] || $_SESSION['username'] == 'admin'){
					$showThisComment = true;
				}
			}
			if($showThisComment){
				if($line == "commentstart.\n"){
					$showComment = true;
				}
				if($line == "commentstop.\n"){
					$showComment = false;
					$showThisComment = false;
					$i++;
					continue;
				}
				if($line != "commentstart.\n" && $showComment){
					if(isSet($_POST[$i])){
						if(file_exists("tmp.txt")){
							unlink("tmp.txt");
							continue;
						}
					}
					else{
						$showComment = false;
						$showThisComment = false;
						$i++;
					}
				}
			}
			if($line == "commentstop.\n" && file_exists("tmp.txt")){
				file_put_contents("tmp.txt", $line, FILE_APPEND);
				SaveComments("tmp.txt");
				unlink("tmp.txt");
				continue;
			}
			file_put_contents("tmp.txt", $line, FILE_APPEND);
		}
		fclose($readComments);
		
		unlink($path);
		if(file_exists("savedata.txt")){
			$rewriteData = fopen("savedata.txt", 'r');
			while(($line = fgets($rewriteData)) !== false){
				file_put_contents($path, $line, FILE_APPEND);
			}
			fclose($rewriteData);
			unlink("savedata.txt");
		}
		header("Location: ../post.php");
			
?>