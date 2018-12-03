<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<div class="m-subheader ">
			<div class="align-items-center">
				<div class="m-portlet m-portlet--tab">
					<form class="m-form m-form--fit m-form--label-align-right" id="edit_created_permission" method="POST">
						<div class="m-portlet__body">
							<div class="form-group m-form__group m--margin-top-10">
								<div class="alert m-alert m-alert--default" role="alert">
									Add Permission:
								</div>
							</div>
							<div class="form-group m-form__group">
								<label for="exampleInputEmail1">
									Permission Arabic
								</label>
								<input type="text" class="form-control m-input m-input--solid" name="per_arabic" value="<?= $permission_row->permission_ar ?>">
							</div>
							<div class="form-group m-form__group">
								<label for="exampleInputEmail1">
									Permission English
								</label>
								<input type="text" class="form-control m-input m-input--solid" name="per_english" value="<?= $permission_row->permission_en ?>">
								<input type="hidden" name="per_id" value="<?= $permission_row->per_id ?>">
							</div>
							<div class="form-group m-form__group">
								<label for="exampleInputEmail1">
									Permission Type
								</label>
								<select class="form-control m-select2" id="m_select2_11"  name="per_type">
									<option value="1" <?= $permission_row->per_type == 1  ? 'selected="selected"':''?>>Admin</option>
									<option value="0" <?= $permission_row->per_type == 0  ? 'selected="selected"':''?>>User</option>
								</select>
							</div>
							<div class="form-group m-form__group">
								<label for="exampleInputEmail1">
									Permission Cost (Vat Coin)
								</label>
								<input type="text" class="form-control m-input m-input--solid" name="vat_coin" value="<?= $permission_row->vat_coin ?>">
							</div>
						</div>
						<div class="m-portlet__foot m-portlet__foot--fit">
							<div class="m-form__actions">
								<button type="submit" class="btn btn-success">
									Submit
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>