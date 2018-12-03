<?php foreach($all_permission as $permission): ?>
<tr>
	<td>
		<?= $permission->permission_ar ?>
	</td>       
	<td>
		<?= $permission->permission_en ?>
	</td>      
	<td>
		<?= $permission->per_type == 1 ? 'Admin':'User'; ?>
	</td>
	<td>
		<?= $permission->vat_coin ?> Vat Coin
	</td>
	<td>
		<span>
			<a href="<?= base_url() ?>dashboard/edit_created_permission/<?= $permission->per_id ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details"><i class="la la-edit"></i>
			</a>
			<a href="#"  class="btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill delete_permission" data-id="<?= $permission->per_id ?>" title="Delete"><i class="la la-trash"></i>
			</a>
		</span>
	</td>
</tr>
<?php endforeach ?>