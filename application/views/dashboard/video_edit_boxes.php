<?php if($videos)foreach($videos as $video): ?>
<div class="m-form__section m-form__section--first removeV videos<?= $video->video_id ?>">
	<div class="m-form__heading">
		<h3 class="m-form__heading-title">
			Videos <button type="button" class=" margdel-input-video btn btn-brand deleteVideoEdit" value="<?= $video->video_id ?>" data-removal=".videos<?= $video->video_id ?>">Delete Video</button>
		</h3>
	</div>
	<div class="form-group m-form__group row">
		<div class="col-lg-12">
			<label class="form-control-label">
			* Video Name:
			</label>
			<input type="text" name="video_name[]" class="form-control m-input" placeholder="" value="<?= $video->video_name ?>">
		</div>
		<div class="col-lg-12">
			<label class="form-control-label">
			* Add Link:
			</label>
			<input type="text" name="video_link[]" class="form-control m-input" placeholder="" value="<?= $video->video_link ?>">
		</div>
	</div>
</div>
<?php endforeach ?>
<style>
	.margdel-input-video {
    	background-color: #f4516c;
    	border: 1px solid #f4516c;
	}

</style>