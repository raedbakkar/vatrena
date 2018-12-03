<?php if($options)foreach($options as $option): ?>
	<label class="m-checkbox">
		<input type="checkbox" name="option[]" class="gear-checker toggle-option" <?php is_option_exist($option->single_option_id ,$feature_id, $category_id); ?>>
			<?= get_single_option_title_by_id($option->single_option_id); ?>
		<span></span>
	</label>
<?php endforeach ?>