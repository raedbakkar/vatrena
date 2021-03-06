<?php $i=0;if($user_photos)foreach($user_photos as $photo): $i++;?>
<div class="m-form__section m-form__section--first removePh photos<?= $photo->photo_id ?>">
	<div class="m-form__heading">
		<h3 class="m-form__heading-title">
			Photos
		</h3>
	</div>
	<div class="form-group m-form__group row">
		<div class="col-lg-9">
			<label for="exampleInputEmail1" class="">
				File Browser
			</label>
			<div class="custom-file">
				<input type="file" class="custom-file-input inputTriggerd" name="inputTriggerd<?= $i ?>" value="<?= base_url() ?>assets/new_uploads/<?= $photo->photo ?>" data-input-number="<?= $i ?>" data-div-appender=".photoExcuter<?= $i ?>" data-nextClass="">
				<input type="hidden" name="photo_id<?= $i ?>" value="<?= $photo->photo_id ?>">
				<label class="custom-file-label" for="customFile">
					Choose file
				</label>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="custom-file">
				<button type="button" class="margdel-input btn btn-brand deletePhotoEdit" value="<?= $photo->photo_id ?>" data-removal=".photos<?= $photo->photo_id ?>">Delete Photo</button>
			</div>
		</div>

		<div class="col-lg-12">
			<div class="photoExcuter<?= $i ?> photoAppender mangerImg "><img src="<?= base_url() ?>assets/new_uploads/<?= $photo->photo ?>" alt="photo"></div>
		</div>
	</div>
	<div class="form-group m-form__group row">
		<div class="col-lg-9">
			<label class="form-control-label">
				* Description arabic:
			</label>
			<input type="text" name="photoDescriptionAr<?= $i ?>" class="form-control m-input onKeyUp" data-class=".getDescAr<?= $i ?>" placeholder="" value="<?= $photo->desc_ar ?>">
		</div>
		<div class="col-lg-3">
			<div class="custom-file">
				<button type="button" data-desc-id="<?= $photo->desc_id ?>" data-desc="<?= $photo->desc_ar ?>" class="margup-input btn btn-brand updatePhotoDescAr getDescAr<?= $i ?>" value="<?= $photo->desc_ar ?>" data-removal=".photos<?= $photo->photo_id ?>">update desc</button>
			</div>
		</div>
	</div>
	<div class="form-group m-form__group row">
		<div class="col-lg-9">
			<label class="form-control-label">
				* Description english:
			</label>
			<input type="text" name="photoDescriptionEn<?= $i ?>" class="form-control m-input onKeyUp" data-class=".getDescEn<?= $i ?>"  placeholder="" value="<?= $photo->desc_en ?>">
		</div>
		<div class="col-lg-3">
			<div class="custom-file">
				<button type="button" data-desc-id="<?= $photo->desc_id ?>" data-desc="<?= $photo->desc_en ?>"  class="margup-input btn btn-brand updatePhotoDescEn getDescEn<?= $i ?>" value="<?= $photo->desc_en ?>" data-removal=".photos<?= $photo->photo_id ?>">update desc</button>
			</div>
		</div>
	</div>
	<div class="form-group m-form__group row">
		<div class="col-lg-9">
			<label class="form-control-label">
				* Choose Category:(اختر قسم الصورة)
			</label>
			<select class="form-control m-input editPhotoCategory" name="photoCategory<?= $i ?>"  data-class=".getCateEn<?= $i ?>">
				<option></option>
				<?php photo_category($photo->photo_category); ?>
			</select>
		</div>
		<div class="col-lg-3">
			<div class="custom-file">
				<button type="button" data-desc-id="<?= $photo->desc_id ?>" data-cate="<?= $photo->photo_category ?>"  class="margup-input btn btn-brand updatePhotoCategory getCateEn<?= $i ?>" value="<?= $photo->photo_id ?>" data-removal=".photos<?= $photo->photo_id ?>">update category</button>
			</div>
		</div>
	</div>
</div>
<?php endforeach ?>
<style>
	.margdel-input {
		background-color: #f4516c;
		border: 1px solid #f4516c;
		margin-top: 31px !important;
	}
	.margup-input {
		margin-top: 28px;
		background-color: #065a10;
		border: 1px solid #065a10;
	}

</style>