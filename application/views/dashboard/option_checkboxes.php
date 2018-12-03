<?php if($feature)foreach($feature as $features): ?>
<?php if($features->single_feature_input_type == 'text'){ 
	return false;
} 
?>
<div class="m-form__group form-group">
	<label for="">
		<?= $features->single_feature_title_ar ?>
	</label>
	<div class="m-checkbox-list">
		<?= get_feature_option($features->single_feature_id); ?>
	</div>
</div>
<?php endforeach ?>
<!-- <input type="hidden" name="form_engine" class="form_engine" value="" > -->