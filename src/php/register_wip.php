<!DOCTYPE html>
<?php include 'Register.php'; ?>
<?php $db = Connect()?>
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
        <a href="./login.html" class="navigation__link navigation__link--button">Zaloguj się</a>
    </nav>
    <main class="main">
        <div class="background-container">
            <section class="register">
                <h2 class="register__header">Stwórz konto</h2>
                <form class="form-register" method = "post", action = "register_complete.php">
                    <input type="text" name="username" placeholder="username" Required class="form-register__input">
                    <input type="text" name="email" placeholder="email" Required class="form-register__input">
                    <input type="password" name="password" placeholder="password" Required class="form-register__input">
                    <div class="terms">
                        <label class="terms__label">Zgadzam się z <span>warunkami</span> i <span>polityką prywatności</span>.</label>
                        <input type="checkbox" Required class="terms__checkbox">
                    </div>
                    <div class="buttons">
                        <button type="submit" class="buttons__register">Zarejestruj</button>
                        <a href="./login.html" class="buttons__login">zaloguj</a>
                    </div>
                </form>
                <div class="links">
                    <p class="links__register">Nie masz konta? <a href="./register.html" class="links__link">Zarejestruj się.</a></p>
                    <a href="#" class="links__forget">Zapomniałeś hasła?</p>
                </div>
            </section>
        </div>
    </main>
</body>