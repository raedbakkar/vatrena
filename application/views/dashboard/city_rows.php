<?php foreach($city as $cities): ?>
<tr>
	<td class="title_en<?= $cities->city_id ?>" data-words="<?= $cities->city_name ?>">
		<?= $cities->city_name ?>
	</td>       
	<td class="title_ar<?= $cities->city_id ?>">
		<?= get_moha_name($cities->moha_id); ?>
	</td>      
	<td class="title_ar<?= $cities->city_id ?>">
		<?= $cities->city_name_ar ?>
	</td>
	<td>
		<span>
			<a href="<?= base_url() ?>dashboard/edit_city/<?= $cities->city_id ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details"><i class="la la-edit"></i>
			</a>
			<a href="#"  class="btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill delete_city" data-id="<?= $cities->city_id ?>" title="Delete"><i class="la la-trash"></i>
			</a>
		</span>
	</td>
</tr>
<?php endforeach ?>