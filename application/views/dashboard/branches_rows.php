<?php foreach($branches as $branch): ?>
<tr>
	<td class="title_en">
		<?= $branch->company_name_ar ?>
	</td> 
	<td class="img-holder title_ar">
		<?= get_moha_name($branch->mohafaza); ?>
	</td>
	<td class="img-holder title_ar">
		<?= get_city_name($branch->city); ?>
	</td>            
	<td class="img-holder title_ar">
		<?= get_dist_name($branch->district); ?>
	</td>
	<td>
		<span>
			<a href="<?= base_url() ?>dashboard/editBranches/<?= $branch->companies_id ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details"><i class="la la-edit"></i>
			</a>
			<a href="#" class="btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill delete_Vatrena" data-id="<?= $branch->companies_id ?>" title="Delete"><i class="la la-trash" ></i>
			</a>
		</span>
	</td>
</tr>
<?php endforeach ?>