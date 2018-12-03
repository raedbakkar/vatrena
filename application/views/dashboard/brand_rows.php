<?php foreach($brand as $brands): ?>
<tr>
	<td class="title_en">
		<?= $brands->brand_title_ar ?>
	</td>             
	<td class="title_ar">
		<?= $brands->brand_title ?>
	</td>
	<td class="title_ar">
		<?= relative_categoies_brand($brands->brand_id); ?>
	</td>
	<td>
		<span>
			<a href="<?= base_url() ?>dashboard/edit_brand/<?= $brands->brand_id ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details"><i class="la la-edit"></i>
			</a>
			<a href="javascript:void(0)" class="btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill delete_brand" data-id="<?= $brands->brand_id ?>" title="Delete"><i class="la la-trash" ></i>
			</a>
			
			
		</span>
	</td>
</tr>
<?php endforeach ?>