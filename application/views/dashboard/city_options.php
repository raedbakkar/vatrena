<label class="col-xl-3 col-lg-3 col-form-label" for="exampleInputEmail1">
	City
</label>
<div class="col-xl-9 col-lg-9">
	<select class="areaDroper form-control m-input m-input--solid m-select2 reinit" id="m_select2_13"  name="city" data-url="<?= base_url() ?>Dashboard/dropDownAppender" data-appenddiv="geneDropDistrict" data-tab="district" data-fidname="city_id" data-view="dashboard/district_options" data-dropname="category">
		<option value="all">ألكل</option>
		<?php foreach($options as $option): ?>
			<option value="<?= $option->city_id ?>"><?= $option->city_name_ar ?></option>
		<?php endforeach; ?>
	</select>
</div>