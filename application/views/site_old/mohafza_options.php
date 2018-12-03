<label>المحافظة</label>
<select class="searchEng"  data-url="<?= base_url() ?>home/dropDownAppender" data-appenddiv="geneDropCity" data-tab="city" data-fidname="moha_id" data-view="site/city_options" data-dropname="category">
	<option value="all">ألكل</option>
   <?php foreach($options as $option): ?>
     <option value="<?= $option->moha_id ?>"><?= $option->moha_title_ar ?></option>
  <?php endforeach ?>
</select>