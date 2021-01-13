<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kuchnia Studenta</title>
  <?php include_once "includes/head2.inc.php"; ?>

</head>
<body>
<?php

  if (isset($_GET['pagenumber'])) {
      $pagenumber = $_GET['pagenumber'];
  } else {
      $pagenumber = 1;
  }
  $model['page'] = $pagenumber;
?>

<div class="wrapper">
  <?php include "partial/menu.php"; ?>

  <main>
    <h1>O Serwisie</h1>
    <p class="tekst">Serwis został <b>stworzony z myślą o studentach</b> ale i nie tylko! <br/> <br/> Jeżeli szukasz inspiracji na szybkie i smaczne danie, trafiłeś we właściwe miejsce. Na naszej stronie znajdziesz wiele różnych przepisów, dzięki którym będziesz mógł przygotować potrawy na miarę Masterszefa! Przepisy inspirowane z serwisu <a href="https://www.przepisy.pl">przepisy.pl</a>, a także z <a href="https://www.kuchnia-domowa.pl">kuchnia-domowa.pl</a></p>
    <br/>
    <h2>Zdjęcia przesłane przez naszych czytelników:</h2>
    <br/>
    <div class="przycisk_cont">
      <a class="przycisk" href="/upload">Prześlij zdjęcie</a>
    </div>
    <form method="post">
    <div class="galeria">

          <?php if(count($images)): ?>
          <?php foreach ($images as $image ): ?>
            <div class="zdjecie">
              <a href="images/<?= $image['watermarkedFile']?>" target="_blank">
                <img src="images/<?= $image['thumbnail']?>" alt="<?= $image['title']?>" >
              </a>
              <div class="opis"><?= $image['title']?><br/>
                <i><?= $image['author']?></i>
                <?php 
                  if($image['status']=='private'){
                    echo "<i>- prywatne</i>";
                  }
                ?>
              </div>
              <input type="checkbox" name="<?= $image['_id'].''?>"<?php
                if(isset($_SESSION['wybrane'])){
                  if(in_array($image['_id'].'',$_SESSION['wybrane'] )){
                    echo "checked";
                  }
                }
                
              ?> >

            </div>
          <?php endforeach ?>
          
        <?php else: ?>
          <p>Brak zdjęć :(</p>
        <?php endif ?>
        <input class="przycisk" type="submit" value="Zapamiętaj wybrane">
      
    </div>
    </form>
    <?php include "partial/paginacja.php"; ?>


    </main>
    <?php include "partial/footer.php"; ?>
</div>
<script src="static/js/licznik.js"></script>
</body>
</html>