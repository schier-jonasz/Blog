<!DOCTYPE html>
<?php include 'Register.php';?>
<?php include 'backendScripts/func.php'; ?>
<?php $db = Connect(); ?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog programistyczny</title>
    <link href="../scss/css/post.css" rel="stylesheet">
</head>
<body>
    <nav class="navigation">
        <a href="./main.php" class="navigation__link navigation__link--logo">Blog</a>
        <a href="./about.php" class="navigation__link">O nas</a>
        <a href="./posts.php" class="navigation__link">Posty</a>
        <a href="./contact.php" class="navigation__link">Kontakt</a>
        <a href="./faq.php" class="navigation__link">FAQ</a>
	<?php
		if(!isSet($_SESSION['login_success'])){
		?>
			<a href="./Login.php" class="navigation__link navigation__link--button  navigation__link--login">Zaloguj się</a>
	<?php
		}
		else{
		?>
			<a href="destroy_login.php" class="navigation__link navigation__link--button  navigation__link--logout">Wyloguj się</a>
		<?php } ?>
    </nav>
    <main class="main">
        <section class="content">
		<?php
		if($_GET['id'] != ""){
			$_SESSION['save_id'] = $_GET['id'];
			$postNumber = $_GET['id'];
		}
		else{
			$postNumber = $_SESSION['save_id'];
		}
			$postFile = fopen("backendScripts/posty.txt", 'r');
			$savePostTitle = PostReader($postNumber, $postFile);
			$_SESSION['save_title'] = $savePostTitle;
			fclose($postFile);
        ?>
        </section>
        <section class="comments">
            <div class="box">
                <h3 class="box__information">komentarze</h3>
            </div>
			<?php
				$path = "comments/";
				$path .= $savePostTitle;
				$path = trim($path);
				$path .= ".txt";
				if(file_exists($path)){
					ReadComments($path);
				}
				else{
					echo "Ten post nie ma jeszcze żadnych komentarzy<br/>";
				}
			?>
			<?php
			if(isSet($_SESSION['username'])){ ?>
            <form class="message" action="backendScripts/addComment.php" method="POST">
                <img src="../assets/icons/user.svg" class="message__image">
                <textarea class="message__text" name="komentarz" contenteditable="true" placeholder="Napisz co chcesz..."></textarea>
                <button type="submit" class="message__button"><img src="../assets/icons/send.svg" class="message__icon"></button>
            </form>
			<?php } ?>
        </section>
    </main>
    <footer class="footer">
        <h2 class="footer__header">Blog</h2>
        <div class="social-media">
            <a target="_blank" rel="noopener noreferrer" href="https://facebook.com" class="footer__link footer__link--facebook">
                <img src="../assets/icons/facebook.svg" class="footer__image footer__image--facebook">
            </a>
            <a target="_blank" rel="noopener noreferrer" href="https://youtube.com" class="footer__link footer__link--youtube">
                <img src="../assets/icons/youtube.svg" class="footer__image footer__image--youtube">
            </a>
            <a target="_blank" rel="noopener noreferrer" href="https://snapchat.com" class="footer__link footer__link--snapchat">
                <img src="../assets/icons/snapchat.svg" class="footer__image footer__image--snapchat">
            </a>
            <a target="_blank" rel="noopener noreferrer" href="https://linkedin.com" class="footer__link footer__link--linkedin">
                <img src="../assets/icons/linkedin.svg" class="footer__image footer__image--linkedin">
            </a>
            <a target="_blank" rel="noopener noreferrer" href="https://instagram.com" class="footer__link footer__link--instagram">
                <img src="../assets/icons/instagram.svg" class="footer__image footer__image--instagram">
            </a>
        </div>
        <p class="footer__privacy">&copy; 2020 — 2022 Privacy — Terms</p>
    </footer>
    <script src="../js/disable_button.js"></script>
</body>
</html>