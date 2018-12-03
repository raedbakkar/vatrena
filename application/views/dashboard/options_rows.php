<?php foreach($options as $option): ?>
<tr>
	<td class="title_en">
		<?= $option->single_option_title_ar ?>
	</td>             
	<td class="title_ar">
		<?= $option->single_option_title ?>
	</td>
	<td>
		<span>
			<a href="<?= base_url() ?>dashboard/edit_option/<?= $option->single_option_id ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details"><i class="la la-edit"></i>
			</a>
			<a href="#" class="btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill delete_Brand" data-id="<?= $option->single_option_id ?>" title="Delete"><i class="la la-trash" ></i>
			</a>
		</span>
	</td>
</tr>
<?php endforeach ?>