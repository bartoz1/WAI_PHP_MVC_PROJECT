<!DOCTYPE html>
<html>
<head>
    <title>Przeyłanie zdjęcia</title>
    <?php require "includes/head2.inc.php"; ?>
</head>
<body>
<div class="wrapper">
    <?php include "partial/menu.php"; ?>
    <main>
    <h1>Zarejestruj się</h1>
    <form id="form_przepis" method="POST">
        
        <label for="login">Login</label><br/>
        <input type="text" name="login" required/><br/>

        <label for="email">email</label><br/>
        <input type="email" name="email" required/><br/>

        <label for="name">Imie</label><br/>
        <input type="text" name="name" required/><br/>

        <label for="surname">Nazwisko</label><br/>
        <input type="text" name="surname" required/><br/>

        <label for="password">Hasło:</label><br/>
        <input type="password" name="password" required/><br/>

        <label for="rep_password">Powtórz hasło:</label><br/>
        <input type="password" name="rep_password" required/><br/>
        
        <div id="przyciski_form">
            <a href="login" class="cancel">Zaloguj się</a>
            <br/><br/>
            <input type="submit" value="Zarejestruj się" />
        </div>
    </form>
    </main>
    <?php include "partial/footer.php"; ?>
</div>

</body>
</html>
