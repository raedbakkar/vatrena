<?php if($products)foreach($products as $product): ?>
<tr>
	<td> <?= $product->ad_title_ar ?>
	</td>
	<td> <?= $product->ad_title ?>
	</td>
	<td> <?= get_vatrena_by_id($product->ad_advertiser_id); ?>
	</td>
	<td> <?= get_category_by_id($product->ad_cate_id); ?>
	</td>             
	<td> <?= number_format($product->ad_price) ?> EGP
	</td>
	<td> <?= $product->ad_percentage ?> %
	</td>
	<td> <?= number_format(after_discount($product->ad_price, $product->ad_percentage)); ?> EGP
	</td>
	<td>
		<span>
			<a href="<?= base_url() ?>dashboard/edit_product/<?= $product->ad_id ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details"><i class="la la-edit"></i>
			</a>
			<a href="#" class="btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill delete_product" data-id="<?= $product->ad_id ?>" title="Delete"><i class="la la-trash" ></i>
			</a>
		</span>
	</td>
</tr>
<?php endforeach ?>