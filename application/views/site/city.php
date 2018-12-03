<option></option>
<?php if($options)foreach($options as $option): ?>
<option value="<?= $option->city_id ?>"><?= (is_arabic() ? $option->city_name_ar : $option->city_name); ?></option>
<?php endforeach; ?>