<?php if($attr)foreach($attr as $option): ?>

	<?php if($option->feature_input_type == 'dropdownlist'){ ?>

		<div class="form-group1 m-form__group">
			<label><?= $option->feature_title ?></label>
			<select class="custom-select form-control" name="<?= attr_name($option->feature_title); ?>">
				<?= get_attr($option->feature_id); ?>
			</select>
		</div>

	<?php }else{ ?>

		<div class="form-group m-form__group">
			<label><?= $option->feature_title; ?></label>
			<div class="custom-file">
				<input type="text" name="<?= attr_name($option->feature_title); ?>" class="form-control m-input m-input--square">
			</div>
		</div>

	<?php }  ?>

<?php endforeach ?>