<!DOCTYPE html>
<?php include 'Register.php'; ?>
<?php $db = Connect()?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog programistyczny</title>
    <link href="../scss/css/register.css" rel="stylesheet">
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
        <div class="background-container">
            <section class="register">
                <h2 class="register__header">Stwórz konto</h2>
				<?php
					if(isSet($_SESSION['login_exists'])){
						echo "Podany login jest już w użyciu";
						DestroyLoginExists();
					}
					else if(isSet($_SESSION['email_exists'])){
						echo "Podany email jest już w użyciu";
						DestroyEmailExists();
					}
				?>
                <form class="form-register" method = "post", action = "register_complete.php">
                    <input type="text" name="username" placeholder="username" Required class="form-register__input">
                    <input type="text" name="email" placeholder="email" Required class="form-register__input">
                    <input type="password" name="password" placeholder="password" Required class="form-register__input">
                    <div class="terms">
                        <label class="terms__label">Zgadzam się z <span class="terms__label--bold">warunkami</span> i <span class="terms__label--bold">polityką prywatności</span>.</label>
                        <input type="checkbox" Required class="terms__checkbox">
                    </div>
                    <div class="buttons">
                        <button type="submit" class="buttons__register">zarejestruj</button>
                        <a href="Login.php" class="buttons__login">zaloguj</a>
                    </div>
                </form>
            </section>
        </div>
    </main>
</body>