<?php foreach($ads as $ad): ?>
<tr>
	<td>
		<?= $ad->ad_id ?>
	</td>
	<td>
		<?= $ad->name ?>
	</td>
	<td class="title_en">
		<?= $ad->ad_type == 1 ? 'hori':'vert';  ?>
	</td>             
	<td class="title_ar">
		<?= get_category_by_id($ad->category); ?>
	</td>
	<td class="img-holder title_ar">
		<?= $ad->category_pos ?>
	</td>
	<td class="img-holder title_ar">
		<?= get_category_by_id($ad->keyword); ?>
	</td>
	<td class="img-holder title_ar">
		<?= $ad->keyword_pos ?>
	</td>
	<td class="img-holder title_ar">
		<?= get_brand_by_id($ad->brand); ?>
	</td>
	<td class="img-holder title_ar">
		<?= $ad->brand_pos ?>
	</td>
	<td class="img-holder title_ar">
		<?= $ad->keyword_pos ?>
	</td>
	<td class="img-holder title_ar">
		<?= $ad->keyword_pos ?>
	</td>
	<td>
		<span>
			<a href="<?= base_url() ?>dashboard/edit_ad_view/<?= $ad->ad_id ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details"><i class="la la-edit"></i>
			</a>
			<a href="#" class="btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill delete_ads" data-id="<?= $ad->ad_id ?>" title="Delete"><i class="la la-trash delete_ads" data-id="<?= $ad->ad_id ?>"></i>
			</a>
		</span>
	</td>
</tr>
<?php endforeach ?>