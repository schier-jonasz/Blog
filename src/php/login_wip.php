<!DOCTYPE html>
<?php include 'Register.php';?>
<?php $db = Connect(); ?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog programistyczny</title>
</head>
<body>
    <nav class="navigation">
        <a href="./main.html" class="navigation__link navigation__link--logo">Blog</a>
        <a href="./about.html" class="navigation__link">O nas</a>
        <a href="./posts.html" class="navigation__link">Posty</a>
        <a href="./contact.html" class="navigation__link">Kontakt</a>
        <a href="./faq.html" class="navigation__link">FAQ</a>
	<?php
		if(!isSet($_SESSION['login_success'])){
		?>
			<a href="./login.html" class="navigation__link navigation__link--button">Zaloguj się</a>
	<?php
		}
		else{
		?>
			<a href="destroy_login.php" class="navigation__link navigation__link--button">Wyloguj się</a>
    </nav>
    <main class="main">
        <section class="login">
		<?php
		}
			if(isSet($_SESSION['login_fail'])){
				echo "Błędne dane logowania!";
				DestroyFail();
			}
			if(!isSet($_SESSION['login_success'])){
		?>
            <h2 class="login__header">Zaloguj się</h2>
            <form class="form-login" method = "post" action = "login_main.php">
                <input type="text" name="email" placeholder="email" Required class="form-login__input">
                <input type="password" name="password" placeholder="password" Required class="form-login__input">
                <button type="submit" class="form-login__button">zaloguj</button>
            </form>
            <div class="links">
                <p class="links__register">Nie masz konta? <a href="register_wip.php" class="links__link">Zarejestruj się.</a></p>
                <a href="#" class="links__forget">Zapomniałeś hasła?</p>
            </div>
		<?php
			}
			else{ ?>
				<h2 class="login__header">Zalogowano</h2>
			<?php
			}
			?>
        </section>
    </main>
</body>