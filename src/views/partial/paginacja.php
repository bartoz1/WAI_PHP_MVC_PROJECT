<div class="paginacja">
          <?php for ($i = 1; $i <= $model['total_pages']; $i++) : ?>
            
              <a class="pagi_button <?php
              if($i == $pagenumber)
              echo "pagi_active"
              ?>" href="/gallery?pagenumber=<?= $i ?>"><?=
               $i 
              ?></a>
            
          <?php endfor; ?>
      </div>