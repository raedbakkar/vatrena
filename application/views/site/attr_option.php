<option></option>
<?php if($options)foreach($options as $option): ?>
  <option value="<?= $option->f_option_id ?>"><?= (is_arabic() ? $option->f_option_title_ar : $option->f_option_title); ?></option>
<?php endforeach ?>