<?php foreach($district as $districts): ?>
<tr>
	<td class="title_en<?= $districts->district_id ?>" data-words="<?= $districts->district_title ?>">
		<?= $districts->district_title ?>
	</td>             
	<td class="title_en<?= $districts->district_id ?>" data-words="<?= $districts->district_title ?>">
		<?= get_city_name($districts->city_id); ?>
	</td>
	<td class="title_ar<?= $districts->district_id ?>">
		<?= $districts->district_title_ar ?>
	</td>
	<td>
		<span>
			<a href="<?= base_url() ?>dashboard/edit_district/<?= $districts->district_id ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details"><i class="la la-edit"></i>
			</a>
			<a href="#"  class="btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill delete_district" data-id="<?= $districts->district_id ?>" title="Delete"><i class="la la-trash"></i>
			</a>
		</span>
	</td>
</tr>
<?php endforeach ?>