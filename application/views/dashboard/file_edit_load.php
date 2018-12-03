<?php $i=1;foreach($files as $file):$i++ ?>
<div class="form-group m-form__group row removeF files<?= $file->file_id ?>">
	<div class="col-lg-6">
		<input name="filepdfname<?= $i++ ?>" type="text" class="form-control m-input" value="<?= $file->file_title ?>" placeholder="File name">
	</div>
	<div class="col-lg-3">
		<input name="filepdf<?= $i++ ?>" type="file" class="custom-file-input" id="customFile<?= $i++ ?>">
		<input type="hidden" name="file_id<?= $i ?>" value="<?= $file->file_id ?>">
		<label class="custom-file-label" for="customFile<?= $i++ ?>">
			Choose file
		</label>
	</div>
	<div class="col-lg-3">
		<div class="custom-file">
			<button type="button" class="margdel-input btn btn-brand deleteFileEdit" value="<?= $file->file_id ?>" data-removal=".files<?= $file->file_id ?>">Delete File</button>
		</div>
	</div>
</div>
<?php endforeach ?>
<style>
	.margdel-input {
    	background-color: #f4516c;
    	border: 1px solid #f4516c;
    	margin-top: 0px;
	}
</style>