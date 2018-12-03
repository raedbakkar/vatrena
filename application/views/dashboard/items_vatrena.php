				<!--end::Form-->
				<!-- </div> -->
					<div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop m-body__content">

						<div class="col-xl-12 col-md-12  ">
							<!--begin::Portlet-->
							<div class="m-portlet">
								<div class="m-portlet__head">
									<div class="m-portlet__head-caption">
										<div class="m-portlet__head-title">
											<h3 class="m-portlet__head-text">
												All Items   
											</h3>
											<span class="m-portlet__head-text">
												<button class="floaterEle btn m-btn--pill m-btn--air m-btn m-btn--gradient-from-danger m-btn--gradient-to-warning" data-target="#m_modal_add" data-toggle="modal"><i class="flaticon-plus"></i> Add Item</button>  
												<!-- <a  class=" m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="modal" data-target="#m_modal_4<?= $comp->companies_id ?>" title="Edit details"><i class="la la-edit"></i> -->
																</a>
											</span>
										</div>
									</div>
								</div>
								<div class="m-portlet__body">
									<!--begin::Section-->
									<div class="m-section">
										<div class="m-section__content">
											<table class="table m-table m-table--head-bg-brand">
												<thead>
													<tr>
														<th>
															name
														</th>
														<th>
															category 
														</th>
														<th>
															city 
														</th>
														<th>
															Publication Time 
														</th>
														<th>
															Acitvate
														</th>
														<th>
															Feature
														</th>
														<th>
															Controllers
														</th>
													</tr>
												</thead>
												<tbody class="appender">
													<?php $this->load->view('dashboard/items_rows', array('comps'=> $comps)); ?>
												</tbody>
											</table>
											<div class="paginator">
												<ul class="pagination">
													<?php for($i=1;$i<=$count_pages;$i++): ?>
														<li><a href="#" class="count_pages" data-number="<?= $i ?>"><?= $i ?></a></li>
													<?php endfor ?>
												</ul>
											<div> 
										</div>
									</div>
									<!--end::Section-->
								</div>
								<!--end::Form-->
							</div>
							<!--end::Portlet-->
							<!--begin::Portlet-->
						</div>

						<!-- BEGIN: Left Aside -->
						<button class="m-aside-left-close m-aside-left-close--skin-light" id="m_aside_left_close_btn">
							<i class="la la-close"></i>
						</button>
						<div id="m_aside_left" class="m-grid__item m-aside-left ">
							<!-- BEGIN: Aside Menu -->
						</div>
						<!-- END: Left Aside -->
							
						</div>
					</div>
				</div>
			</div>
			<!-- begin::Body -->


<!-- addItem pop up -->

<div class="modal fade" id="m_modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
					New message
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
			</div>
			<form class="edit_itmes" method="POST">
				<div class="modal-body">
						<div class="form-group">
							<label for="recipient-name" class="form-control-label">
								Company name ar:
							</label>
							<input type="text" class="form-control" name="Company_name_ar" id="Company_name_ar" value="">
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								Company name en:
							</label>
							<input type="text" class="form-control" name="Company_name_en" id="Company_name_en" value="">
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								Logo:
							</label>
							<input type="text" class="form-control" name="logo" id="logo" value="">
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								CompanyType:
							</label>
							
							<select name="CompanyType" class="SelectedCompanyType form-control m-bootstrap-select m_selectpicker" data-live-search="true">
								<?php droper('CompanyType'); ?>
							</select>
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								Area:
							</label>
							<select name="Area" class="SelectedAreaType form-control m-bootstrap-select m_selectpicker" data-live-search="true">
								<?php droper('Area'); ?>
							</select>	
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								Mohafaza:
							</label>
							<select name="Mohafaza" class="SelectedMohafazaType form-control m-bootstrap-select m_selectpicker" data-live-search="true">
								<?php droper('Mohafaza'); ?>
							</select>	
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								City:
							</label>
							<select name="City" class="SelectedCityType form-control m-bootstrap-select m_selectpicker" data-live-search="true">
								<?php droper('City'); ?>
							</select>	
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								District:
							</label>
							<select name="District" class="SelectedDistrictType form-control m-bootstrap-select m_selectpicker" data-live-search="true">
								<?php droper('District'); ?>
							</select>	
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								Adress ar:
							</label>
							<input type="text" class="form-control" name="Adress_ar" id="title_en_edit" value="">
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								Adress en:
							</label>
							<input type="text" class="form-control" name="Adress_en" id="title_en_edit" value="">
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								Email:
							</label>
							<input type="text" class="form-control" name="Email" id="title_en_edit" value="">
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								Company about:
							</label>
							<input type="text" class="form-control" name="Company_about" id="title_en_edit" value="">
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								company about en:
							</label>
							<input type="text" class="form-control" name="company_about_en" id="title_en_edit" value="">
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								employee name:
							</label>
							<input type="text" class="form-control" name="employee_name" id="employee_name" value="">
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								employee job:
							</label>
							<input type="text" class="form-control" name="employee_job" id="employee_job" value="">
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								employee phone:
							</label>
							<input type="text" class="form-control" name="employee_phone" id="employee_phone" value="">
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								company mobile:
							</label>
							<input type="text" class="form-control" name="company_mobile" id="company_mobile" value="">
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								company telephone:
							</label>
							<input type="text" class="form-control" name="company_telephone" id="company_telephone" value="">
						</div>
						
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								website:
							</label>
							<textarea class="form-control" name="website" id="website"></textarea>
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								featured item:
							</label>
							<select name="featured_item" class="SelectedDistrictType form-control m-bootstrap-select m_selectpicker" data-live-search="true">
								<option class="selected" data-selected="نعم" value="1">نعم</option> 
      							<option value="0">لا</option>
							</select>
						</div>
						
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">
						Close
					</button>
					<button type="submit" class="btn btn-primary">
						Save Options
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

			<!-- begin::Body -->

<style> 

	.pagination li{
		padding: 9px 20px;

		border: 1px solid #e6e6e6;

		color: black;
	}

	.paginator{
		position:absolute;
	}

</style>