<label class="col-xl-3 col-lg-3 col-form-label" for="exampleInputEmail1">
	Mohafaza
</label>
<div class="col-xl-9 col-lg-9">
	<select class="areaDroper form-control m-input m-input--solid m-select2 reinit" id="m_select2_12"  name="moha" data-url="<?= base_url() ?>Dashboard/dropDownAppender" data-appenddiv="geneDropCity" data-tab="city" data-fidname="moha_id" data-view="dashboard/city_options" data-dropname="category">
		<option value="all">ألكل</option>
		<?php foreach($options as $option): ?>
			<option value="<?= $option->moha_id ?>"><?= $option->moha_title_ar ?></option>
		<?php endforeach; ?>
	</select>
</div>