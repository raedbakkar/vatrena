<?php if($feat)foreach($feat as $feats): ?>
<option value="<?= $feats->f_option_id?>" <?= $feats->f_option_id == $ans->feature_value ? 'selected="selected"':'' ?>>
	<?= $feats->f_option_title; ?>
</option>
<?php endforeach; ?>