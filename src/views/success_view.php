<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kuchnia Studenta</title>
  <?php include "includes/head2.inc.php"; ?>

</head>
<body>
<div class="wrapper">
    <?php include "partial/menu.php"; ?>

  <main id="m_kontakt">
    <h1>Gratulacje</h1>

    <div class="karta">
      
    
    <?php if(isset($_SESSION['username'])): ?>
      Udało się zalogować
      <br/>
      <a href="home">OK</a>
    <?php else: ?>
      Pomyślnie zarejestrowano użytkownika
      <br/>
      <a href="login">OK</a>
    <?php endif ?>
    
    </div>
    
    </main>
    <?php include "partial/footer.php"; ?>
</div>
<script src="licznik.js"></script>
</body>
</html>