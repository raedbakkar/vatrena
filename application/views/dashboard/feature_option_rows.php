<?php foreach($base_feature as $feature): ?>
<tr>
	<td>
		<?= get_category_by_id($feature->base_category_id); ?>
	</td>             
	<td>
		<?= get_all_feature_by_category_id($feature->base_category_id); ?>
	</td>
	<td>
		<?= get_all_option_by_category_id($feature->base_category_id); ?>
	</td>
	<td>
		<span>
			<a href="<?= base_url() ?>dashboard/edit_feature_option/<?= $feature->base_category_id ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details"><i class="la la-edit"></i>
			</a>
			<a href="#"  class="btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill delete_feature_option" data-id="<?= $feature->base_id ?>" title="Delete"><i class="la la-trash"></i>
			</a>
		</span>
	</td>
</tr>
<?php endforeach ?>