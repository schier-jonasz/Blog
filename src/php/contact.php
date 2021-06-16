<!DOCTYPE html>
<?php include 'Register.php';?>
<?php $db = Connect(); ?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog programistyczny</title>
    <link href="../scss/css/contact.css" rel="stylesheet">
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
        <section class="container">
            <header class="header">
                <div class="header-box">
                    <h2 class="header__title">kontakt</h2>
                    <p class="header__description">MASZ JAKIEŚ PYTANIE LUB PO PROSTU SIĘ NUDZISZ TO NAPISZ DO NAS MAILA.</p>
                </div>
            </header>
            <form class="form" action = "backendScripts/sendmail.php" method = "post">
                <div class="form-box">
                    <input type="text" required="" name="name" class="form__input"> 
                    <label for="name" class="form__label">Imię</label>
                </div>
                <div class="form-box">
                    <input type="text" required="" name="email" class="form__input">
                    <label for="email" class="form__label">Email</label>
                </div>
                <div class="form-box">
                    <textarea name="message" required="" class="form__input form__textarea"></textarea>
                    <label for="message" class="form__label">Wiadomość</label>
                </div>
                <button type="submit" class="form__button">wyślij</button>
            </form>
        </section>
    </main>

    <footer class="footer">
        <h2 class="footer__header">Blog</h2>
        <div class="social-media">
            <a target="_blank" rel="noopener noreferrer" class="footer__link footer__link--facebook">
                <img src="../assets/icons/facebook.svg" class="footer__image footer__image--facebook">
            </a>
            <a target="_blank" rel="noopener noreferrer" class="footer__link footer__link--youtube">
                <img src="../assets/icons/youtube.svg" class="footer__image footer__image--youtube">
            </a>
            <a target="_blank" rel="noopener noreferrer" class="footer__link footer__link--snapchat">
                <img src="../assets/icons/snapchat.svg" class="footer__image footer__image--snapchat">
            </a>
            <a target="_blank" rel="noopener noreferrer" class="footer__link footer__link--linkedin">
                <img src="../assets/icons/linkedin.svg" class="footer__image footer__image--linkedin">
            </a>
            <a target="_blank" rel="noopener noreferrer" class="footer__link footer__link--instagram">
                <img src="../assets/icons/instagram.svg" class="footer__image footer__image--instagram">
            </a>
        </div>
        <p class="footer__privacy">&copy; 2020 — 2022 Privacy — Terms</p>
    </footer>
</body>