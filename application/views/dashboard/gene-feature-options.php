<?php if($feat)foreach($feat as $feats): ?>
<option value="<?= $feats->f_option_id ?>">
	<?= $feats->f_option_title_ar; ?>
</option>
<?php endforeach; ?>