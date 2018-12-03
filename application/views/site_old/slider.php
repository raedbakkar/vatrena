<?php if($photos)foreach($photos as $photo): ?>
    <div class="item sliderPhoto">
      <img src="assets/new_uploads/<?= $photo->photo ?>" alt="...">
    	<?php if(!empty($photo->desc_ar)){ ?>
        <div class="shad">
        	<h5><?= $photo->desc_ar ?></h5>
        </div>  
        <?php } ?>
    </div>
<?php endforeach ?>
