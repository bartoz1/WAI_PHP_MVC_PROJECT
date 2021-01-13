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
    <h1>Zaloguj się</h1>
    <form id="form_przepis" method="POST">
        <?php
        if(isset($wrong['message'])){
            echo "<p>";
            echo $wrong['message'];
            echo "</p>";
        }
        ?>
        <label for="login">Login</label><br/>
        <input type="text" name="login" required/><br/>

        <label for="password">Hasło</label><br/>
        <input type="password" name="password" required/><br/>

        <div id="przyciski_form">
            <a href="register" class="cancel">Zarejestruj się</a>
            <br/><br/>
            <input type="submit" value="Zaloguj się" />
        </div>
    </form>
    </main>
    <?php include "partial/footer.php"; ?>
</div>

</body>
</html>
