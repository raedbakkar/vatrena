<?php foreach($feature_option as $option): ?>
<div class="form-group m-form__group marg-appends del-box">
	<div class="custom-file">
		<input type="text" name="option_maker_ar[]" class="form-control m-input m-input--square"  placeholder="Enter an option arabic" value="<?= $option->single_option_title_ar ?>">
	</div>
</div>
<div class="form-group m-form__group marg-appends del-box">
	<div class="custom-file">
		<input type="text" name="option_maker[]" class="form-control m-input m-input--square"  placeholder="Enter an option english" value="<?= $option->single_option_title ?>">
	</div>
</div>
<?php endforeach ?>