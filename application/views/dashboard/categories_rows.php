<?php foreach($categories as $category): ?>
<tr>
	<td class="title_en<?= $category->keywords_id ?>" data-words="<?= $category->cat_keywords_en ?>">
		<?= $category->cat_keywords_en ?>
	</td>             
	<td class="title_ar<?= $category->keywords_id ?>">
		<?= $category->keyword_title ?>
	</td>
	<!-- <td class="img-holder title_ar<?= $category->keywords_id ?>">
		<a href="#" class="img-category<?= $category->keywords_id ?>" data-toggle="modal" data-target="#m_modal_pic<?= $category->keywords_id ?>" ><img  src="assets/uploads/<?= $category->picutre ?>"></a>
	</td> -->
	<!-- <td>
		<?= truncateString($category->category_desc, 20, true); ?>
	</td>
	<td>
		<?= truncateString($category->category_desc_en, 20, true); ?>
	</td> -->
	<td>
		<span class="m-switch m-switch--outline m-switch--icon m-switch--info">
			<label>
				<input type="checkbox" data-id="<?= $category->keywords_id ?>" data-checkValue="<?= $category->featured_item ?>" class="checkController" <?php checker($category->featured_item); ?> name="">
				<span></span>
			</label>
		</span>
		<?php //$category->featured_item ?>
	</td>
	<td>
		<span>
			<a href="<?= base_url() ?>dashboard/edit_category_view/<?= $category->keywords_id ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details"><i class="la la-edit"></i>
			</a>
			<a href="#"  class="btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill delete_category" data-id="<?= $category->keywords_id ?>" title="Delete"><i class="la la-trash"></i>
			</a>
		</span>
	</td>
</tr>
<?php endforeach ?>