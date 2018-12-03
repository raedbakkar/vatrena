<label>الحى</label>
<select class="searchEng" >
	<option value="all">ألكل</option>
  <?php foreach($options as $option): ?>
     <option value="<?= $option->district_id ?>"><?= $option->district_title_ar ?></option>
  <?php endforeach ?>
</select>