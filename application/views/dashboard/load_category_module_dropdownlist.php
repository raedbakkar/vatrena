<div class="form-group m-form__group">
	<label for="exampleInputEmail1">
		category
	</label>
	<select class="form-control m-select2" id="m_select2_5"  name="category">
		<option></option>
		<?php foreach($cat_keywords as $keyword): ?>
		<option value="<?=  $keyword->keywords_id ?>">
			<?=  $keyword->keyword_title ?>
		</option>
	    <?php endforeach ?>
	</select>
</div>