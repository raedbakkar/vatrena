<div id="video_carousel" class="slider-pro Album_pic">
	<div class="sp-slides">
		<?php foreach($videos as $video): ?>
		<div class="sp-slide">
			<iframe class="sp-image"  data-src="<?= $video->video_link ?>" data-small="<?= $video->video_link ?>" data-medium="<?= $video->video_link ?>" data-large="<?= $video->video_link ?>" data-retina="<?= $video->video_link ?>"  src="<?= $video->video_link ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		</div>
		<?php endforeach; ?>
	</div>
	<div class="sp-thumbnails">
		<?php foreach($videos as $video): ?>
			<img alt="Image" class="sp-thumbnail" src="assets/new_uploads/<?= $vatrena->logo ?>">
		<?php endforeach; ?>
	</div>
</div>