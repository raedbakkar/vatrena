<?php foreach($features as $feature): ?>
<tr>
	<td class="title_ar">
		<?= $feature->single_feature_title ?>
	</td>
	<td class="title_en">
		<?= $feature->single_feature_title_ar ?>
	</td>             
	<td class="title_ar">
		<?= $feature->single_feature_input_type ?>
	</td>
	<td>
		<span>
			<a href="<?= base_url() ?>dashboard/edit_feature/<?= $feature->single_feature_id ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details"><i class="la la-edit"></i>
			</a>
			<a href="#" class="btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill delete_feature" data-id="<?= $feature->single_feature_id ?>" title="Delete"><i class="la la-trash" ></i>
			</a>
		</span>
	</td>
</tr>
<?php endforeach ?>