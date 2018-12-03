<?php foreach($moha as $mohas): ?>
<tr>
	<td class="title_en<?= $mohas->moha_id ?>" data-words="<?= $mohas->moha_title ?>">
		<?= $mohas->moha_title ?>
	</td>     
	<td class="title_ar<?= $mohas->moha_id ?>">
		<?= get_area_name($mohas->governorate_id); ?>
	</td>        
	<td class="title_ar<?= $mohas->moha_id ?>">
		<?= $mohas->moha_title_ar ?>
	</td>
	<td>
		<span>
			<a href="<?= base_url() ?>dashboard/edit_moha/<?= $mohas->moha_id ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details"><i class="la la-edit"></i>
			</a>
			<a href="#"  class="btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill delete_moha" data-id="<?= $mohas->moha_id ?>" title="Delete"><i class="la la-trash"></i>
			</a>
		</span>
	</td>
</tr>
<?php endforeach ?>