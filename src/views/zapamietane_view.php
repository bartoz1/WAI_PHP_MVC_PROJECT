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
    <h1>Zapamiętane zdjęcia</h1>
    
    
    <form method="post">
    <div class="galeria">
      

          <?php if(isset($_SESSION['wybrane']) && count($_SESSION['wybrane'])>0): ?>
          <?php foreach ($images as $image ): ?>
            <?php if(in_array($image['_id'],$_SESSION['wybrane'])):?>
            <div class="zdjecie">
              <a href="images/<?= $image['watermarkedFile']?>" target="_blank">
                <img src="images/<?= $image['thumbnail']?>" alt="<?= $image['title']?>" >
              </a>
              <div class="opis"><?= $image['title']?><br/>
                <i><?= $image['author']?></i>
              </div>
              <input type="checkbox" name="<?= $image['_id'].''?>" >

            </div>
            <?php endif?>
          <?php endforeach ?>
          
          <input class="przycisk" type="submit" value="Usun wybrane">
        <?php else: ?>
          <p>Brak zdjęć :(</p>
        <?php endif ?>
      
    </div>
    </form>


    </main>
    <?php include "partial/footer.php"; ?>
</div>
<script src="static/js/licznik.js"></script>
</body>
</html>