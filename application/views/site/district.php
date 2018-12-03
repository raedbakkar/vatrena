<option></option>
<?php if($options)foreach($options as $option): ?>
<option value="<?= $option->district_id ?>"><?= (is_arabic() ? $option->district_title_ar : $option->district_title); ?></option>
<?php endforeach; ?>