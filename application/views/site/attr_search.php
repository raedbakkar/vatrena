<?php if($attr)foreach($attr as $attrs): ?>

<?php if($attrs->feature_input_type == 'dropdownlist'){ ?>
	<div class="col-md-6">
		<label><?= (is_arabic() ? $attrs->feature_title_ar : $attrs->feature_title); ?></label>
		<div class="form-group">
			<select class="gene-category" name="category" style="width: 100%;height:30px">
			  	<?= get_attr_option($attrs->feature_id); ?>
			</select>
		</div>
	</div>
<?php }else{ ?>
	
	<div class="col-md-6">
		<label><?= (is_arabic() ? $attrs->feature_title_ar : $attrs->feature_title); ?></label>
		<div class="form-group">
			<input type="text" class="form-control inp" name="<?= $attrs->feature_title ?>">
		</div>
	</div>

<?php } ?>
<?php endforeach ?>