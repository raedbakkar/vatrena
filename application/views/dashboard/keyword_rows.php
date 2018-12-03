<?php foreach($keywords as $keyword): ?>
<tr>
	<td class="title_en<?= $keyword->keywords_id ?>" data-words="<?= $keyword->cat_keywords_en ?>">
		<?= $keyword->cat_keywords_en ?>
	</td>             
	<td class="title_ar<?= $keyword->keywords_id ?>">
		<?= $keyword->keyword_title ?>
	</td>
	<td>
		<span class="m-switch m-switch--outline m-switch--icon m-switch--info">
			<label>
				<input type="checkbox" data-id="<?= $keyword->keywords_id ?>" data-checkValue="<?= $keyword->featured_item ?>" class="isCategory" name="">
				<span></span>
			</label>
		</span>
		<?php //$keyword->featured_item ?>
	</td>
	<td>
		<span>
			<a href="<?= base_url() ?>dashboard/edit_keyword_view/<?= $keyword->keywords_id ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details"><i class="la la-edit"></i>
			</a>
			<a href="#"  class="btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill delete_keywords" data-id="<?= $keyword->keywords_id ?>" title="Delete"><i class="la la-trash"></i>
			</a>
		</span>
	</td>
</tr>
<?php endforeach ?>