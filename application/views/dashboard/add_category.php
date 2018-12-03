<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<div class="m-subheader ">
			<div class="align-items-center">
				<div class="m-portlet m-portlet--tab">
					<form class="m-form m-form--fit m-form--label-align-right" id="addCate" method="POST">
						<div class="m-portlet__body">
							<div class="form-group m-form__group m--margin-top-10">
								<div class="alert m-alert m-alert--default" role="alert">
									Add Album names:
								</div>
							</div>
							<div class="form-group m-form__group">
								<label for="exampleInputEmail1">
									Add Category Arabic
								</label>
								<input type="text" class="form-control m-input m-input--solid" name="category_ar"  placeholder="Category  Ar">
							</div>
							<div class="form-group m-form__group">
								<label for="exampleInputEmail1">
									Add Category English
								</label>
								<input type="text" class="form-control m-input m-input--solid" name="category_en" placeholder="Category  En">
							</div>
							<div class="form-group m-form__group">
								<label for="exampleInputEmail1">
									choose relative category
								</label>
								<select class="form-control m-select2" id="m_select2_11" multiple name="keywords[]">
									<option></option>
									<?php foreach($cat_keywords as $keyword): ?>
									<option value="<?=  $keyword->keywords_id ?>">
										<?=  $keyword->keyword_title ?>
									</option>
								    <?php endforeach ?>
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