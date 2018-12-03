					<div class="m-content">
						<div class="row">
							<div class="col-md-6">
								<!--begin::Portlet-->
								<div class="m-portlet m-portlet--tab">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Choose Options For Features
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->
									<form class="m-form m-form--fit m-form--label-align-right" id="edit_feature_init" method="POST">
										<div class="m-portlet__body">
											<div class="form-group m-form__group m--margin-top-10">
												<div class="alert m-alert m-alert--default" role="alert">
													Featue Option Will apear here that you can choose what you want to apear 
												</div>
											</div>
											
											<div class="feature-thier-check-boxes"><?= $check  ?></div>
										</div>
										<div class="m-portlet__foot m-portlet__foot--fit">
											<div class="m-form__actions">
												<button type="submit" class="btn btn-primary">
													Submit
												</button>
												<button type="reset" class="btn btn-secondary">
													Cancel
												</button>
											</div>
										</div>
									<!--end::Form-->
								</div>
								<!--end::Portlet-->
						</div>
						<div class="col-md-6">
							<!--begin::Portlet-->
							<div class="m-portlet m-portlet--tab">
								<div class="m-portlet__head">
									<div class="m-portlet__head-caption">
										<div class="m-portlet__head-title">
											<span class="m-portlet__head-icon m--hide">
												<i class="la la-gear"></i>
											</span>
											<h3 class="m-portlet__head-text">
												Choose Feature For Category
											</h3>
										</div>
									</div>
								</div>
								<!--begin::Form-->
								<form class="m-form m-form--fit m-form--label-align-right">
									<div class="m-portlet__body">
										<div class="form-group m-form__group m--margin-top-10">
											<div class="alert m-alert m-alert--default" role="alert">
												Create Category For Product And choose thier Features and options
											</div>
										</div>
										<div class="form-group m-form__group">
											<label for="exampleInputEmail1">
												Choose Product Cateogry
											</label>
											<select class="form-control m-input m-input--solid m-select2 reinit" id="m_select2_5"  name="categories">
												<option></option>
												<?php foreach($categories as $keyword): ?>
												<option value="<?=  $keyword->keywords_id ?>" <?= $category_id ==  $keyword->keywords_id ? 'selected="selected"':'' ?>>
													<?=  $keyword->keyword_title ?>
												</option>
											    <?php endforeach ?>
											</select>
										</div>

										<!-- <input type="hidden" name="base_id" value="<?= $base->base_feature_id ?>"> -->
										
										<div class="form-group m-form__group">
											<label for="exampleInputEmail1">
												Choose Feature
											</label>
											<select class="form-control m-input m-input--solid m-select2 reinit get-thier-boxes" id="m_select2_8" multiple name="features[]">
												<option></option>
												<?php foreach($features as $feature): ?>
												<option value="<?=  $feature->single_feature_id ?>" <?php is_feature_exist($feature->single_feature_id ,$category_id); ?>>
												<?=  $feature->single_feature_title_ar ?>
												</option>
											    <?php endforeach ?>
											</select>
										</div>
									</div>
								</form>
								<!--end::Form-->
							</div>
							<!--end::Portlet-->
							<!--begin::Portlet-->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end:: Body -->