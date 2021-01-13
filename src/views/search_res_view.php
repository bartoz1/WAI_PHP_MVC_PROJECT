<div class="galeria">
    <?php if(count($images)>0): ?>
        <?php foreach ($images as $image ): ?>
            
            <div class="zdjecie">
                <a href="images/<?= $image['watermarkedFile']?>" target="_blank">
                <img src="images/<?= $image['thumbnail']?>" alt="<?= $image['title']?>" >
                </a>
                <div class="opis"><?= $image['title']?><br/>
                <i><?= $image['author']?></i>
                </div>
                

            </div>
            
        <?php endforeach ?>

    <?php else: ?>
        <p>Brak zdjęć :(</p>
    <?php endif ?>
      
</div>