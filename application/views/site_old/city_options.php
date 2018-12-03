<label>المدينة</label>
<select class="searchEng"  data-url="<?= base_url() ?>home/dropDownAppender" data-appenddiv="geneDropDistrict" data-tab="district" data-fidname="city_id" data-view="site/district_options" data-dropname="category">
	<option value="all">ألكل</option>
	<?php foreach($options as $option): ?>
	<option value="<?= $option->city_id ?>"><?= $option->city_name_ar ?></option>
	<?php endforeach ?>
</select>