<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<!-- new one -->
		<div class="m-portlet__body">
				<!--begin: Search Form -->
				<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
					<div class="row align-items-center">
						<div class="col-xl-8 order-2 order-xl-1">
							<div class="form-group m-form__group row align-items-center">
								<div class="col-md-4">
									<div class="m-form__group m-form__group--inline">
										<div class="m-form__label">
											<label>
												Status:
											</label>
										</div>
										<div class="m-form__control">
											<select class="form-control m-bootstrap-select" id="m_form_status">
												<option value="">
													All
												</option>
												<option value="1">
													Pending
												</option>
												<option value="2">
													Delivered
												</option>
												<option value="3">
													Canceled
												</option>
											</select>
										</div>
									</div>
									<div class="d-md-none m--margin-bottom-10"></div>
								</div>
								<div class="col-md-4">
									<div class="m-form__group m-form__group--inline">
										<div class="m-form__label">
											<label class="m-label m-label--single">
												Type:
											</label>
										</div>
										<div class="m-form__control">
											<select class="form-control m-bootstrap-select" id="m_form_type">
												<option value="">
													All
												</option>
												<option value="1">
													Online
												</option>
												<option value="2">
													Retail
												</option>
												<option value="3">
													Direct
												</option>
											</select>
										</div>
									</div>
									<div class="d-md-none m--margin-bottom-10"></div>
								</div>
								<div class="col-md-4">
									<div class="m-input-icon m-input-icon--left">
										<input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
										<span class="m-input-icon__icon m-input-icon__icon--left">
											<span>
												<i class="la la-search"></i>
											</span>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 order-1 order-xl-2 m--align-right">
							<a href="<?= base_url() ?>dashboard/add_category" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
								<span>
									<i class="la la-cart-plus"></i>
									<span>
										Add Category
									</span>
								</span>
							</a>
							<div class="m-separator m-separator--dashed d-xl-none"></div>
						</div>
					</div>
				</div>
				<!--end: Search Form -->
				<!--begin: Datatable -->
				<table class="m-datatable" id="html_table" width="100%">
					<thead>
						<tr>

							<th>
								Title 
							</th>
							<th>
								Title Arabic 
							</th>
							<th>
								feateared category
							</th>
							<th>
								Controllers
							</th>
						</tr>
					</thead>
					<tbody class="appender">
						<?php $this->load->view('dashboard/categories_rows', array('categories'=> $categories)); ?>
					</tbody>
				</table>
				<!--end: Datatable -->
			</div>
			<!-- end new one -->
	</div>
</div>
</div>