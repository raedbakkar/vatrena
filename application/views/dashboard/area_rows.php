<?php foreach($area as $areas): ?>
<tr>
	<td class="title_en<?= $areas->gover_id ?>" data-words="<?= $areas->gover_title ?>">
		<?= $areas->gover_title ?>
	</td>             
	<td class="title_ar<?= $areas->gover_id ?>">
		<?= $areas->gover_title_ar ?>
	</td>
	<td>
		<span>
			<a href="<?= base_url() ?>dashboard/edit_area/<?= $areas->gover_id ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details"><i class="la la-edit"></i>
			</a>
			<a href="#"  class="btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill delete_area" data-id="<?= $areas->gover_id ?>" title="Delete"><i class="la la-trash"></i>
			</a>
		</span>
	</td>
</tr>
<?php endforeach ?>