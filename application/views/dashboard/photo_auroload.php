<div class="m-form__section m-form__section--first removePh">
	<div class="m-form__heading">
		<h3 class="m-form__heading-title">
			Photos
		</h3>
	</div>
	<div class="form-group m-form__group row">
		<div class="col-lg-12">
			<label for="exampleInputEmail1" class="">
				File Browser
			</label>
			<div class="custom-file">
				<input type="file" class="custom-file-input inputTriggerd" name="inputTriggerd<?= $inputNumber ?>" data-input-number="<?= $inputNumber ?>" data-div-appender=".photoExcuter<?= $inputNumber ?>" data-nextClass="">
				<label class="custom-file-label" for="customFile">
					Choose file
				</label>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="photoExcuter<?= $inputNumber ?> photoAppender mangerImg "></div>
		</div>
	</div>
	<div class="form-group m-form__group row">
		<div class="col-lg-12">
			<label class="form-control-label">
				* Description arabic:
			</label>
			<input type="text" name="photoDescriptionAr<?= $inputNumber ?>" class="form-control m-input" placeholder="" value="">
		</div>
	</div>
	<div class="form-group m-form__group row">
		<div class="col-lg-12">
			<label class="form-control-label">
				* Description english:
			</label>
			<input type="text" name="photoDescriptionEn<?= $inputNumber ?>" class="form-control m-input" placeholder="" value="">
		</div>
	</div>
	<div class="form-group m-form__group row">
		<div class="col-lg-12">
			<label class="form-control-label">
				* Choose Category:(اختر قسم الصورة)
			</label>
			<select class="form-control m-input" name="photoCategory<?= $inputNumber ?>">
				<option></option>
				<?php photo_category(); ?>
			</select>
		</div>
	</div>
</div>