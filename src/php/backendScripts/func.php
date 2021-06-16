<?php
	function PostReader($postNumber, $readFile){
		$i = 0;
		$showImage = false;
		$showDate = false;
		$showTitle = false;
		$showSubtitle = false;
		$showText = false;
		while(($line = fgets($readFile)) !== false){
			if($line == "imagestarter.\n" && $i == $postNumber){
				$showImage = true;
			}
			if($line == "imagestoper.\n"){
				$showImage = false;
			}
			if($showImage && $line != "imagestarter.\n"){
				echo "<img src = '../assets/images/", $line,"' class='content__image'>";
			}
			if($line == "datestarter.\n" && $i == $postNumber){
				$showDate = true;
				echo '<div class="date">';
				echo '<img src="../assets/icons/clock.svg" class="date__icon">';
			}
			if($line == "datestoper.\n"){
				$showDate = false;
			}
			if($showDate && $line != "datestarter.\n"){
				$words = preg_split('/[\s]+/', $line, -1, PREG_SPLIT_NO_EMPTY);
				echo '<p class="date__released">' , PolishMonth($words[0]), " ", $words[1],", ", $words[2], '</p>';
				echo '</div>';
			}
			if($line == "titlestarter.\n" && $i == $postNumber){
				$showTitle = true;
			}
			if($line == "titlestoper.\n"){
				$showTitle = false;
			}
			if($showTitle && $line != "titlestarter.\n"){
				echo "<h1 class='content__title'>" ,$line, "</h1>";
				$saveTitle = $line;
			}
			if($line == "subtitlestarter.\n" && $i == $postNumber){
				$showSubtitle = true;
			}
			if($line == "subtitlestoper.\n"){
				$showSubtitle = false;
			}
			if($showSubtitle && $line != "subtitlestarter.\n"){
				echo "<h2 class='content__subtitle'>" ,$line, "</h2>";
			}
			if($line == "textstarter.\n" && $i == $postNumber){
				$showText = true;
			}
			if($line == "textstoper.\n"){
				$showText = false;
			}
			if($showText && $line != "textstarter.\n"){
				echo "<p class='content__text'>" , $line, "</p>";
			}
			if($line == "ender.\n"){
				$i++;
			}
		}
		return $saveTitle;
	}
	
	function PolishMonth($month){
		if($month == "January"){
			return "Styczeń";
		}
		if($month == "February"){
			return "Luty";
		}
		if($month == "March"){
			return "Marzec";
		}
		if($month == "April"){
			return "Kwiecień";
		}
		if($month == "May"){
			return "Maj";
		}
		if($month == "June"){
			return "Czerwiec";
		}
		if($month == "July"){
			return "Lipiec";
		}
		if($month == "August"){
			return "Sierpień";
		}
		if($month == "September"){
			return "Wrzesień";
		}
		if($month == "October"){
			return "Październik";
		}
		if($month == "November"){
			return "Listopad";
		}
		if($month == "December"){
			return "Grudzień";
		}
	}
	
	
	function ReadTitles($readTitle){
		$showImage = false;
		$showDate = false;
		$showTitle = false;
		$showText = false;
		$showTextOnce = false;
		$openDiv = true;
		$skipHeroPost = true;
		$i = 0;
		while(($line = fgets($readTitle)) !== false){
			if(!$skipHeroPost){
				if($i % 3 == 1 && $openDiv){
					echo "<div class='posts'>";
					$openDiv = false;
				}
				if($line == "imagestarter.\n"){
					echo "<article class = 'post'>";
					echo '<a rel="noopener noreferrer" href="post.php?id=',$i,'" class="post__link">';
					$showImage = true;
				}
				if($line == "imagestoper.\n"){
					$showImage = false;
				}
				if($showImage && $line != "imagestarter.\n"){
					echo "<img src = '../assets/images/", $line,"' class='post__image'>";
				}
				if($line == "datestarter.\n"){
					$showDate = true;
				}
				if($line == "datestoper.\n"){
					$showDate = false;
				}
				if($showDate && $line != "datestarter.\n"){
					$words = preg_split('/[\s]+/', $line, -1, PREG_SPLIT_NO_EMPTY);
					echo "<p class='post__date'>" , PolishMonth($words[0]), " ", $words[1],", ", $words[2], "</p>";
				}
				if($line == "titlestarter.\n"){
					$showTitle = true;
					$showTextOnce = true;
				}
				if($line == "titlestoper.\n"){
					$showTitle = false;
				}
				if($showTitle && $line != "titlestarter.\n"){
					echo '<h3 class=post__title>', $line, '<h3/>';
					/*echo "<form action = 'SelectPost.php' method = 'post'>";
					echo "<input type = 'submit' name = '",$i,"' value = '",$line,"'>";
					echo "</form>";*/
				}
				if($showTextOnce){
					if($line == "textstarter.\n"){
						$showText = true;
					}
					if($line == "textstoper.\n"){
						$showText = false;
						$showTextOnce = false;
						echo '</a>';
						echo '</article>';
						if($i % 3 == 0){
							echo '</div>';
							$openDiv = true;
						}
						$i++;
					}
					if($showText && $line != "textstarter.\n"){
						$tenWords = preg_split('/[\s]+/', $line, -1, PREG_SPLIT_NO_EMPTY);
						$j = 0;
						echo '<p class="post__description">';
						while(isSet($tenWords[$j]) && $j < 32){
							echo $tenWords[$j], " ";
							$j++;
						}
						echo "...</p>";
					}
				}
			}
			if($skipHeroPost && $line == "ender.\n"){
				$skipHeroPost = false;
				$i++;
			}
		}
	}
	
	function ReadHeroPost($readTitle){
		$showImage = false;
		$showDate = false;
		$showTitle = false;
		$showText = false;
		$showTextOnce = false;
		$i = 0;
		while(($line = fgets($readTitle)) !== false){
			if($line == "imagestarter.\n"){
				$showImage = true;
			}
			if($line == "imagestoper.\n"){
				$showImage = false;
			}
			if($showImage && $line != "imagestarter.\n"){
				echo "<img src = '../assets/images/", $line,"' class='hero-container__image'>";
				echo '<a rel="noopener noreferrer" href="post.php?id=',$i,'"class="hero-container__link">';
			}
			if($line == "datestarter.\n"){
				$showDate = true;
				echo '<div class="hero-post">';
			}
			if($line == "datestoper.\n"){
				$showDate = false;
			}
			if($showDate && $line != "datestarter.\n"){
				$words = preg_split('/[\s]+/', $line, -1, PREG_SPLIT_NO_EMPTY);
				echo "<p class='hero-post__date'>" , PolishMonth($words[0]), " ", $words[1],", ", $words[2], "</p>";
			}
			if($line == "titlestarter.\n"){
				$showTitle = true;
				$showTextOnce = true;
			}
			if($line == "titlestoper.\n"){
				$showTitle = false;
			}
			if($showTitle && $line != "titlestarter.\n"){
				echo '<h2 class="hero-post__title">', $line, '<h2/>';
				/*echo "<form action = 'SelectPost.php' method = 'post'>";
				echo "<input type = 'submit' name = '",$i,"' value = '",$line,"'>";
				echo "</form>";*/
			}
			if($showTextOnce){
				if($line == "textstarter.\n"){
					$showText = true;
				}
				if($line == "textstoper.\n"){
					$showText = false;
					$showTextOnce = false;
					echo '</div>';
					echo '</a>';
					break;
				}
				if($showText && $line != "textstarter.\n"){
					$tenWords = preg_split('/[\s]+/', $line, -1, PREG_SPLIT_NO_EMPTY);
					$j = 0;
					echo '<p class="hero-post__description">';
					while(isSet($tenWords[$j]) && $j < 32){
						echo $tenWords[$j], " ";
						$j++;
					}
					echo "...</p>";
				}
			}
		}
	}
	
	function ReadComments($path){
		$readComments = fopen($path, 'r');
		$showUsername = false;
		$showData = false;
		$showComment = false;
		$showUserImage = true;
		$i = 0;
		while(($line = fgets($readComments)) !== false){
			if($showUserImage){
				echo '<article class="comment">';
				echo '<img src="../assets/icons/user.svg" class="comment__image">';
				$showUserImage = false;
			}
			if($line == "usernamestart.\n"){
				echo '<div class="information">';
				$showUsername = true;
			}
			if($line == "usernamestop.\n"){
				$showUsername = false;
			}
			if($line != "usernamestart.\n" && $showUsername){
				echo '<p class="information__nickname">', $line, '</p>';
				if(isSet($_SESSION['username'])){
					$line = str_replace(array("\n", "\r"), '', $line);
					//preg_replace('/\s+/', '', $line);
					if($line == $_SESSION['username']){
						echo "<form action = 'backendScripts/RemoveComment.php' method = 'post'>";
						echo "<input type = 'submit' value = 'X' name = ",$i," >";
						echo "</form>";
						$i++;
					}
				}
			}
			if($line == "datastart.\n"){
				$showData = true;
			}
			if($line == "datastop.\n"){
				$showData = false;
				echo '</div>';
			}
			if($line != "datastart.\n" && $showData){
				$words = preg_split('/[\s]+/', $line, -1, PREG_SPLIT_NO_EMPTY);
				echo '<p class="information__date">', PolishMonth($words[0]), " ",$words[1], " ",$words[2], '</p>';
				echo '<p class="information__time">', $words[3], '</p>';
			}
			if($line == "commentstart.\n"){
				$showComment = true;
			}
			if($line == "commentstop.\n"){
				$showComment = false;
				$showUserImage = true;
				echo '</article>';
			}
			if($line != "commentstart.\n" && $showComment){
				echo '<p class="comment__text">', $line, '</p>';
			}
		}
		fclose($readComments);
	}
	
	function ShowRecentPosts($readTitle){
		$showTitle = false;
		$showDate = false;
		$i = 0;
		while(($line = fgets($readTitle)) !== false && $i < 3){
			if($line == "datestarter.\n"){
				$showDate = true;
				echo '<article class="post">';
				echo '<div class="post-overhead">';
			}
			if($line == "datestoper.\n"){
				$showDate = false;
				echo '</div>';
			}
			if($showDate && $line != "datestarter.\n"){
				$words = preg_split('/[\s]+/', $line, -1, PREG_SPLIT_NO_EMPTY);
				echo '<p class="post-overhead__date">' , PolishMonth($words[0]), " ", $words[1],", ", $words[2], '</p>';
			}
			if($line == "titlestarter.\n"){
				$showTitle = true;
				echo '<div class="post-bottom">';
			}
			if($line == "titlestoper.\n"){
				$showTitle = false;
			}
			if($showTitle && $line != "titlestarter.\n"){
				echo '<h3 class="post-bottom__title">', $line, '</h3>';
				echo '<a href="post.php?id=',$i,'" class="post-bottom__link">Czytaj więcej></a>';
				echo '</div>';
				echo '</article>';
				$i++;
			}
		}
	}
?>