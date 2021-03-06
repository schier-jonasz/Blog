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
    <link href="../scss/css/main.css" rel="stylesheet">
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
        <header class="hero">
            <div class="hero-container">
                <h1 class="hero__header">Witaj na&nbsp;naszym <span class="hero__header--special">blogu</span>!&nbsp;</h1>
                <p class="hero__description">Chcemy się podzielić z wami doświadczeniem oraz wiedzą, którą poznajemy na codzień. Na pewno znajdziesz coś dla siebie!</p>
            </div>
            <img src="../assets/images/computer.png" class="hero__image">
        </header>
        <section class="latest-posts">
            <h2 class="latest-posts__header">Ostatnie <span class="latest-posts__header--posts">posty</span></h2>
            <p class="latest-posts__description">"Pod pewnymi względami programowanie jest jak malowanie. Zaczynasz z pustym płótnem i pewnymi podstawowymi surowcami. Używasz kombinacji nauki, sztuki i rzemiosła, aby określić, co z nimi zrobić. " - Andrew Hunt</p>
            <div class="posts">
			<?php
				ShowRecentPosts();
			?>
            </div>
        </section>
        <section class="information">
            <div class="information__container">
                <h2 class="information__header">Ogólnie o <span class="information__header--blog">blogu</span></h2>
                <p class="information__description">Blog jest projektem realizowanym w ramach zajęć programowania zespołowego.</p>
                <p class="information__description--bottom">Serdeczne pozdrowienia dla szanownego prowadzącego zajęcia dr. Bartosza Dziewita.</p>
                <a href="#" class="information__button">Czytaj więcej</a>
            </div>
            <img src="../assets/images/about-image.jpg" class="information__image">
        </section>
        <section class="quote">
            <h2 class="quote__background">quote</h2>
            <p class="quote__text">Czasami lepiej jest zostawić coś w spokoju, wstrzymać się, i to jest bardzo prawdziwe w programowaniu.</p>
            <div class="quote__box"></div>
            <p class="quote__name">Joyce Wheeler</p>
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
</body>
</html>