<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kuchnia Studenta</title>
  <?php include_once "includes/head2.inc.php"; ?>
  <script src="static/js/search.js"></script>
</head>
<body>

<div class="wrapper">
  <?php include "partial/menu.php"; ?>

  <main>
    <h1>Wyszukaj zdjęcia</h1>
    <label for="search">Wprowadź tytuł:</label>
    <input type="text" name="search" id="search" onkeyup="szukaj(this.value)">
    <div id='odp'></div>
        


    </main>
    <?php include "partial/footer.php"; ?>
</div>
<script src="static/js/licznik.js"></script>
</body>
</html>