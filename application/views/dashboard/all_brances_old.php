<?php foreach($comps as $comp): ?>
<div class="modal fade" id="m_modal_branch<?= $comp->companies_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
					All Branches
				</h5>
				<button class="floater-right btn m-btn--pill m-btn--air btn-success">
					<i class="flaticon-plus"></i> Add branches
				</button>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
			</div>
			<form class="edit_itmes" method="POST">
				<div class="modal-body">
						<div class="form-group">
							<?php Branches($comp->companies_id);?>
						</div>
						<input type="hidden" name="id" value="<?= $comp->companies_id ?>">
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

<?php endforeach ?>



<?php foreach($comps as $comp): ?>
<div class="modal fade" id="m_modal_4<?= $comp->companies_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
							<input type="text" class="form-control" name="Company_name_ar" id="Company_name_ar" value="<?= $comp->company_name_ar ?>">
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								Company name en:
							</label>
							<input type="text" class="form-control" name="Company_name_en" id="Company_name_en" value="<?= $comp->company_name_en ?>">
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								Logo:
							</label>
							<input type="text" class="form-control" name="logo" id="logo" value="<?= $comp->logo ?>">
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								CompanyType:
							</label>
							
							<select name="CompanyType" class="SelectedCompanyType form-control m-bootstrap-select m_selectpicker" data-live-search="true">
								<?php droper('CompanyType', $comp->companyType); ?>
							</select>
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								Area:
							</label>
							<select name="Area" class="SelectedAreaType form-control m-bootstrap-select m_selectpicker" data-live-search="true">
								<?php droper('Area', $comp->area ); ?>
							</select>	
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								Mohafaza:
							</label>
							<select name="Mohafaza" class="SelectedMohafazaType form-control m-bootstrap-select m_selectpicker" data-live-search="true">
								<?php droper('Mohafaza', $comp->mohafaza ); ?>
							</select>	
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								City:
							</label>
							<select name="City" class="SelectedCityType form-control m-bootstrap-select m_selectpicker" data-live-search="true">
								<?php droper('City', $comp->city ); ?>
							</select>	
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								District:
							</label>
							<select name="District" class="SelectedDistrictType form-control m-bootstrap-select m_selectpicker" data-live-search="true">
								<?php droper('District', $comp->district ); ?>
							</select>	
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								Adress ar:
							</label>
							<input type="text" class="form-control" name="Adress_ar" id="title_en_edit" value="<?= $comp->adress_ar ?>">
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								Adress en:
							</label>
							<input type="text" class="form-control" name="Adress_en" id="title_en_edit" value="<?= $comp->adress_en  ?>">
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								Email:
							</label>
							<input type="text" class="form-control" name="Email" id="title_en_edit" value="<?= $comp->email ?>">
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								Company about:
							</label>
							<input type="text" class="form-control" name="Company_about" id="title_en_edit" value="<?= $comp->company_about?>">
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								company about en:
							</label>
							<input type="text" class="form-control" name="company_about_en" id="title_en_edit" value="<?= $comp->company_about_en  ?>">
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								employee name:
							</label>
							<input type="text" class="form-control" name="employee_name" id="employee_name" value="<?= $comp->employee_name  ?>">
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								employee job:
							</label>
							<input type="text" class="form-control" name="employee_job" id="employee_job" value="<?= $comp->employee_job ?>">
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								employee phone:
							</label>
							<input type="text" class="form-control" name="employee_phone" id="employee_phone" value="<?= $comp->employee_phone  ?>">
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								company mobile:
							</label>
							<input type="text" class="form-control" name="company_mobile" id="company_mobile" value="<?= $comp->company_mobile ?>">
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								company telephone:
							</label>
							<input type="text" class="form-control" name="company_telephone" id="company_telephone" value="<?= $comp->company_telephone ?>">
						</div>
						
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								website:
							</label>
							<textarea class="form-control" name="website" id="website"><?= $comp->website ?></textarea>
						</div>
						<div class="form-group">
							<label for="message-text" class="form-control-label">
								featured item:
							</label>
							<select name="featured_item" class="SelectedDistrictType form-control m-bootstrap-select m_selectpicker" data-live-search="true">
								<?php featured_generator($comp->companies_id, 'items'); ?>
							</select>
						</div>
						
						<input type="hidden" name="id" value="<?= $comp->companies_id ?>">
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

<?php endforeach ?>