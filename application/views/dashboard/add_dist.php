<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<div class="m-subheader ">
			<div class="align-items-center">
				<div class="m-portlet m-portlet--tab">
					<form class="m-form m-form--fit m-form--label-align-right" id="add_dist" method="POST">
						<div class="m-portlet__body">
							<div class="form-group m-form__group m--margin-top-10">
								<div class="alert m-alert m-alert--default" role="alert">
									Add Distract:
								</div>
							</div>
							<div class="form-group m-form__group">
								<label for="exampleInputEmail1">
									Title arabic
								</label>
								<input type="text" class="form-control m-input m-input--solid" name="title_ar"  placeholder="title arabic">
							</div>
							<div class="form-group m-form__group">
								<label for="exampleInputEmail1">
									Title english
								</label>
								<input type="text" class="form-control m-input m-input--solid" name="title_en" placeholder="title english">
							</div>
							<div class="form-group m-form__group">
								<label for="exampleInputEmail1">
									city title
								</label>
								<select class="form-control m-input m-input--solid m-select2" id="m_select2_11"  name="city">
									<option></option>
									<?php foreach($city as $citys): ?>
										<option value="<?= $citys->city_id ?>"><?= $citys->city_name_ar ?></option>
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