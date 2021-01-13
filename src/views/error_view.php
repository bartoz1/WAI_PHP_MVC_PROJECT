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
    <h1>O nie!</h1>
    <h2>Wystąpił błąd!</h2>

    <div class="karta">
      <?= $error["message"] ?>
      <br/>
      <a href="<?php $error["location"]?>">wróć</a>
    </div>
    

    
    </main>
    <?php include "partial/footer.php"; ?>
</div>
<script src="licznik.js"></script>
</body>
</html>