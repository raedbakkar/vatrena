<?php foreach($feature as $features): ?>
<tr>
	<td class="title_ar">
		<?= $features->feature_title ?>
	</td>
	<td class="title_ar">
		<?= $features->feature_title_ar ?>
	</td>
	<td class="title_en">	
		<?= get_category_by_id($features->feature_category_id); ?>
	</td>             
	<td class="title_ar">
		<select class="arrange-rw" data-feat="<?= $features->feature_id ?>">
			<?php foreach(range(1, $count) as $arrange): ?>
			<option value="<?= $arrange ?>"  <?= ($arrange == $features->arrange ? 'selected="selected"': '') ?>><?= $arrange ?></option>
			<?php endforeach ?>
		</select>
	</td>
	<td>
		<span>
			<a href="<?= base_url() ?>dashboard/edit_area/<?= $features->feature_id ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details"><i class="la la-edit"></i>
			</a>
			<a href="#"  class="btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill delete_area" data-id="<?= $features->feature_id ?>" title="Delete"><i class="la la-trash"></i>
			</a>
		</span>
	</td>
</tr>
<?php endforeach ?>