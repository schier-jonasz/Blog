<!DOCTYPE html>
<?php include 'Register.php';?>
<?php $db = Connect(); ?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog programistyczny</title>
    <link href="../scss/css/about.css" rel="stylesheet">
</head>
<body>
    <nav class="navigation">
        <a href="./main.php" class="navigation__link navigation__link--logo">Blog</a>
	<?php
	if(isSet($_SESSION['login_success']) && $_SESSION['username'] == 'admin'){ ?>
		<a href="./backendScripts/CreatePost.php" class="navigation__link">Dodaj post</a>
	<?php } ?>
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
        <header class="header">
            <h1 class="header__title">Kim jesteśmy?</h1>
            <h2 class="header__question">Banda trojga kiepskich studentów, aspirujących na jeszcze gorszych programistów.</h2>
        </header>
        <section class="persons">
            <article class="person">
                <img src="../assets/images/tobi.jpeg" class="person__image">
                <div class="person__line"></div>
                <h3 class="person__name">Sobota Tobiasz</h3>
                <p class="person__description">Sphagetti code master.</p>
            </article>

            <article class="person">
                <img src="../assets/images/luki.jpeg" class="person__image">
                <div class="person__line"></div>
                <h3 class="person__name">Stasiak Łukasz</h3>
                <p class="person__description">"Nie pukać w szybę, płochliwy programista" - to ten typ.</p>
            </article>

            <article class="person">
                <img src="../assets/images/joni.jpg" class="person__image">
                <div class="person__line"></div>
                <h3 class="person__name">Schier Jonasz</h3>
                <p class="person__description">Jeden z niewielu nie pracujących w Rockwellu.</p>
            </article>
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