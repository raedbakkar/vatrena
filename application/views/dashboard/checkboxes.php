<?php if($options)foreach($options as $option): ?>
	<label class="m-checkbox">
		<input type="checkbox" name="option[]" class="gear-checker" data-option="<?= $option->single_option_id ?>" data-feature="<?= $feature_id ?>" data-check="unmark">
			<?= $option->single_option_title_ar ?>
		<span></span>
	</label>
<?php endforeach ?>