<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<div class="m-subheader ">
			<div class="align-items-center">
				<div class="m-portlet m-portlet--tab">
					<form class="m-form m-form--fit m-form--label-align-right" id="edit_area" method="POST">
						<div class="m-portlet__body">
							<div class="form-group m-form__group m--margin-top-10">
								<label for="recipient-name" class="form-control-label">
									Title Arabic:
								</label>
								<input type="text" class="form-control m-input m-input--solid" name="title_ar_edit" id="title_ar_edit" value="<?= $area->gover_title_ar ?>">
							</div>
							<div class="form-group m-form__group">
								<label for="message-text" class="form-control-label">
									Title English:
								</label>
								<input type="text" class="form-control m-input m-input--solid" name="title_en_edit" id="title_en_edit" value="<?= $area->gover_title ?>">
							</div>
							<input type="hidden" name="id" value="<?= $area->gover_id ?>">

							
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