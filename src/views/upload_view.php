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
    <h1>Prześlij nam zdjęcie Swojego dania!</h1>
    <form id="form_przepis" method="POST" enctype="multipart/form-data" onsubmit="prosze_czekac()">
        <label for="file_img">Zdjęcie:</label><br/>
        <input type="file" name="file_img" required /><br/>
        <label for="watermark">Znak wodny:</label><br/>
        <input type="text" name="watermark" placeholder="Ala_bez_kota" required/><br/>

        <label for="author">Autor:</label><br/>
        <input type="text" name="author"<?php 
            if(isset($_SESSION['username'])){
                echo 'value='.$_SESSION['username'];
            }
        ?> required/><br/>
        <label for="title">Tytuł:</label><br/>
        <input type="text" name="title" required/><br/>
        <label for="description">Opis:</label><br/>
        <textarea name="description" cols="25" rows="5" placeholder="Opis..."></textarea>
        <?php if(isset($_SESSION['username'])): ?>
            <p>Status zdjęcia:</p>
            <input type="radio" id="public" name="state" value="public" checked>
            <label for="public">publiczne</label><br/>
            <input type="radio" id="private" name="state" value="private">
            <label for="private">prywatne</label><br/>
            <input type="hidden" value="<?= $_SESSION['user_id']?>" name="user_id" />
        <?php endif ?>
        
        <div id="przyciski_form">
            <a href="gallery" class="cancel">Anuluj</a>
            <input type="submit" value="Wyslij" />
        </div>
    </form>
    </main>
    <?php include "partial/footer.php"; ?>
</div>

</body>
</html>
