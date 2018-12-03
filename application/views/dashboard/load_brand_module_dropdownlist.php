<div class="form-group m-form__group">
	<label for="exampleInputEmail1">
		 brands
	</label>
	<select class="form-control m-select2" id="m_select2_5"  name="brand">
		<option></option>
		<?php foreach($brands as $brand): ?>
		<option value="<?=  $brand->brand_id ?>">
			<?=  $brand->brand_title_ar ?>
		</option>
	    <?php endforeach ?>
	</select>
</div>