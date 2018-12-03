<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<div class="m-subheader ">
			<div class="align-items-center">
				<div class="m-portlet m-portlet--tab">
					<form class="m-form m-form--fit m-form--label-align-right" id="edit_moha" method="POST">
						<div class="m-portlet__body">
							<div class="form-group m-form__group m--margin-top-10">
								<label for="recipient-name" class="form-control-label">
									Title Arabic:
								</label>
								<input type="text" class="form-control m-input m-input--solid" name="title_ar_edit" id="title_ar_edit" value="<?= $moha->moha_title_ar ?>">
							</div>
							<div class="form-group m-form__group">
								<label for="message-text" class="form-control-label">
									Title English:
								</label>
								<input type="text" class="form-control m-input m-input--solid" name="title_en_edit" id="title_en_edit" value="<?= $moha->moha_title ?>">
							</div>
							<input type="hidden" name="id" value="<?= $moha->moha_id ?>">
							<div class="form-group m-form__group">
								<label for="exampleInputEmail1">
									area title
								</label>
								<select class="form-control m-input m-input--solid m-select2" id="m_select2_11"  name="area">
									<option></option>
									<?php foreach($governorate as $governorat): ?>
										<option value="<?= $governorat->gover_id ?>" <?php check_value_moha($governorat->gover_id, $moha->moha_id); ?>><?= $governorat->gover_title_ar ?></option>
									<?php endforeach; ?>
								</select>
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