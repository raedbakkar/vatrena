<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
			<!-- BEGIN: Left Aside -->
			<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
				<i class="la la-close"></i>
			</button>
			<!-- END: Left Aside -->
			<div class="m-grid__item m-grid__item--fluid m-wrapper">
				<!-- BEGIN: Subheader -->
				<div class="m-subheader ">
					<div class="d-flex align-items-center">
						<div class="mr-auto">
							<h3 class="m-subheader__title m-subheader__title--separator">
								Category
							</h3>
							<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
								<li class="m-nav__item m-nav__item--home">
									<a href="#" class="m-nav__link m-nav__link--icon">
										<i class="m-nav__link-icon la la-home"></i>
									</a>
								</li>
								<li class="m-nav__separator">
									-
								</li>
								<li class="m-nav__item">
									<a href="" class="m-nav__link">
										<span class="m-nav__link-text">
											Forms
										</span>
									</a>
								</li>
								<li class="m-nav__separator">
									-
								</li>
								<li class="m-nav__item">
									<a href="" class="m-nav__link">
										<span class="m-nav__link-text">
											Form Controls
										</span>
									</a>
								</li>
								<li class="m-nav__separator">
									-
								</li>
								<li class="m-nav__item">
									<a href="" class="m-nav__link">
										<span class="m-nav__link-text">
											Base Inputs
										</span>
									</a>
								</li>
							</ul>
						</div>
						<div>
							<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
								<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
									<i class="la la-plus m--hide"></i>
									<i class="la la-ellipsis-h"></i>
								</a>
								<div class="m-dropdown__wrapper">
									<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
									<div class="m-dropdown__inner">
										<div class="m-dropdown__body">
											<div class="m-dropdown__content">
												<ul class="m-nav">
													<li class="m-nav__section m-nav__section--first m--hide">
														<span class="m-nav__section-text">
															Quick Actions
														</span>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-share"></i>
															<span class="m-nav__link-text">
																Activity
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-chat-1"></i>
															<span class="m-nav__link-text">
																Messages
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-info"></i>
															<span class="m-nav__link-text">
																FAQ
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-lifebuoy"></i>
															<span class="m-nav__link-text">
																Support
															</span>
														</a>
													</li>
													<li class="m-nav__separator m-nav__separator--fit"></li>
													<li class="m-nav__item">
														<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
															Submit
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END: Subheader -->
				<div class="m-content">
					<div class="row">
					<div class="col-md-12">
						<!--begin::Portlet-->
						<div class="m-portlet m-portlet--tab">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<span class="m-portlet__head-icon m--hide">
											<i class="la la-gear"></i>
										</span>
										<h3 class="m-portlet__head-text">
											Add Category
										</h3>
									</div>
								</div>
							</div>
							<!--begin::Form-->
							<form class="m-form m-form--fit m-form--label-align-right" id="edit_feature" method="POST">
								<div class="m-portlet__body">
									<div class="form-group m-form__group">
										<div></div>
										<div class="custom-file">
											<input type="text" name="feature_category_ar" class="form-control m-input m-input--square"  placeholder="Enter Category Feature arabic" value="<?= $feature->single_feature_title_ar ?>">
										</div>
									</div>
									<div class="form-group m-form__group">
										<div></div>
										<div class="custom-file">
											<input type="text" name="feature_category" class="form-control m-input m-input--square"  placeholder="Enter Category Feature" value="<?= $feature->single_feature_title ?>">
											<input type="hidden" value="<?= $feature->single_feature_id ?>" name="single_feature_id">
										</div>
									</div>
									<div class="form-group m-form__group">
										<div class="custom-file">
											<select class="custom-select form-control add_feature_options" name="input_type">
												<option selected="">
													Choose input type
												</option>
												<option value="dropdownlist" <?= $feature->single_feature_input_type == 'dropdownlist' ? 'selected="selected"':'' ?>>
													dropdownlist
												</option>
												<option value="text" <?= $feature->single_feature_input_type == 'text' ? 'selected="selected"':'' ?>>
													text
												</option>
											</select>
										</div>
									</div>
									<div class="geneOptionMakerFirst"></div>
									<div class="geneOptionMaker">
										
										<?php  $this->load->view('dashboard/option-maker-edit', array('feature_option'=>$feature_option)); ?>


									</div>
									<div class="form-group m-form__group display-btn">
										<div class="genebuttons"> 
											<button type="button" class="add-gene btn btn-primary">Add Feature</button>
											<button type="button" class="del-gene btn btn-primary">delete Feature</button>
										</div>
									</div>
								</div>
								<div class="m-portlet__foot m-portlet__foot--fit">
									<div class="m-form__actions">
										<button type="submit" class="btn btn-primary">
											Submit
										</button>
									</div>
								</div>
							</form>
							<!--end::Form-->
						</div>
					<!--end::Portlet-->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end:: Body -->


<style> 

	.display-btn {
		display:none;
	}

	.genebuttons {
		margin:20px;
		text-align:center;
	}
	.marg-appends {
		margin:20px;
	}

</style>