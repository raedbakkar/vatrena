<?php foreach($comps as $comp): ?>
<tr>
	<td>
		<?= $comp->companies_id ?>
	</td>
	<td class="title_en">
		<?= $comp->company_name_ar ?>
	</td>             
	<td class="title_ar">
		<?= pick_first_category($comp->companies_id); ?>
	</td>
	<td class="img-holder title_ar">
		<?= get_city_name($comp->city); ?>
	</td>
	<td class="img-holder title_ar">
		<?= get_relative_brand($comp->companies_id); ?>
	</td>
	<td class="img-holder title_ar">
		<?= get_relative_keyword($comp->companies_id); ?>
	</td>
	<td>
		0
	</td>
	<td>
		<span>
			<a href="<?= base_url() ?>dashboard/editBranches/<?= $comp->companies_id ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details"><i class="la la-edit"></i>
			</a>
			<a href="#" class="btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill delete_Vatrena" data-id="<?= $comp->companies_id ?>" title="Delete"><i class="la la-trash" ></i>
			</a>
			<?php if($comp->parent == 0): ?>
			<a href="<?= base_url() ?>dashboard/view_all_branches/<?= $comp->companies_id ?>"  class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Branches" ><i class="la la-suitcase"></i>
			</a>
		<?php endif ?>
			<a target="_blank" href="<?= base_url() ?>home/single_page/<?= $comp->companies_id ?>" class="btn m-btn visitBtn" data-id="<?= $comp->companies_id ?>"><img src="<?= base_url() ?>assets/images/logo%20vatrena.png">
			</a>
		</span>
	</td>
	<td>
		<span class="m-switch m-switch--outline m-switch--icon m-switch--info">
			<label>
				<input type="checkbox" data-id="<?= $comp->companies_id ?>" data-checkValue="<?= $comp->active ?>" class="checkControllerActive" <?= $comp->active == 1 ? 'checked':'' ?>>
				<span></span>
			</label>
		</span>
	</td>
	<td>
		<span class="m-switch m-switch--outline m-switch--icon m-switch--info">
			<label>
				<input type="checkbox" data-id="<?= $comp->companies_id ?>" data-checkValue="<?= $comp->featured_item ?>" class="checkControllerFeatVatrena" <?php checker($comp->featured_item); ?>>
				<span></span>
			</label>
		</span>
	</td>
</tr>
<?php endforeach ?>