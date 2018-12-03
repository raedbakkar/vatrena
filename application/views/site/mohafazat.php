<option></option>
<?php if($options)foreach($options as $option): ?>
<option value="<?= $option->moha_id ?>"><?= (is_arabic() ? $option->moha_title_ar : $option->moha_title); ?></option>
<?php endforeach; ?>