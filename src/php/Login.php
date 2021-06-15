<!DOCTYPE html>
<?php include 'Register.php';?>
<?php $db = Connect(); ?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog programistyczny</title>
    <link href="../scss/css/login.css" rel="stylesheet">
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
        <section class="login">
		<?php
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
                <p class="links__register">Nie masz konta? <a href="Registration.php" class="links__register links__register--bold">Zarejestruj się.</a></p>
                <a href="#" class="links__forget">Zapomniałeś hasła?</p>
            </div>
		<?php
			}
			else{ ?>
				<h2 class="login__header">Witaj <?php echo $_SESSION['username']; ?></h2>
			<?php
			}
			?>
        </section>
    </main>
</body>