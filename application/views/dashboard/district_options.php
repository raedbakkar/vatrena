<label class="col-xl-3 col-lg-3 col-form-label" for="exampleInputEmail1">
	District
</label>
<div class="col-xl-9 col-lg-9">
	<select class="areaDroper form-control m-input m-input--solid m-select2 reinit" id="m_select2_14"  name="dist">
		<option value="all">ألكل</option>
		<?php foreach($options as $option): ?>
			<option value="<?= $option->district_id ?>"><?= $option->district_title_ar ?></option>
		<?php endforeach; ?>
	</select>
</div>