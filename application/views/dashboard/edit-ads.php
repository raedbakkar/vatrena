<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<div class="m-subheader ">
			<div class="align-items-center">
				<div class="m-portlet m-portlet--tab">
					<form class="m-form m-form--fit m-form--label-align-right edit_ad_maker"  method="POST">
						<div class="m-portlet__body">
							<div class="form-group m-form__group m--margin-top-10">
								<label for="recipient-name" class="form-control-label">
									Ad Name :
								</label>
								<input type="text" class="form-control m-input m-input--solid" name="ad_name" value="<?= $ads->name ?>">
							</div>
							<div class="form-group m-form__group">
								<label for="message-text" class="form-control-label">
									Ad photo:
								</label>
								<input type="file" class="form-control m-input m-input--solid" name="ad_photo"  value="">
								<input type="hidden" name="ad_photo_hidden" value="<?= $ads->photo ?>">
							</div>
							<div class="form-group m-form__group m--margin-top-10">
								<label for="exampleInputEmail1">
									 Hori / vert
								</label>
								<select class="form-control m-select2 perTime" id="m_select2_9"  name="horivert">
									<option></option>
									<option value="1" <?= $ads->ad_type==1 ? 'selected="selected"':'' ?>>
										Horizontal
									</option>
									<option value="2" <?= $ads->ad_type==2 ? 'selected="selected"':'' ?>>
										vertical
									</option>
								</select>
							</div>
							<div class="form-group m-form__group m--margin-top-10">
								<label for="recipient-name" class="form-control-label">
									Ad Link:
								</label>
								<input type="text" class="form-control m-input m-input--solid" name="ad_link" value="<?= $ads->link ?>">
							</div>
							
							<div class="row">
								<div class="col-md-4">
									<div class="form-group m-form__group">
										<label for="exampleInputEmail1">
											category
										</label>
										<select class="form-control m-select2 pick_category_number" id="m_select2_5"  name="category">
											<option></option>
											<?php foreach($cat_keywords as $keyword): ?>
											<option value="<?=  $keyword->keywords_id ?>" <?= $keyword->keywords_id == $ads->category ? 'selected="selected"':'' ?>>
												<?=  $keyword->keyword_title ?>
											</option>
										    <?php endforeach ?>
										</select>
									</div>
									<div class="category_ad_number_container">
										<div class="form-group m-form__group">
											<label for="recipient-name" class="form-control-label">
												Ad Category poisoning:
											</label>
											<input type="text" class="form-control m-input m-input--solid" name="category_count_prioirty" value="<?= $ads->category_pos ?>">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group m-form__group">
										<label for="exampleInputEmail1">
											keyword
										</label>
										<select class="form-control m-select2 pick_keyword_number" id="m_select2_8"  name="keyword">
											<option></option>
											<?php foreach($keywords as $keyword): ?>
											<option value="<?=  $keyword->keywords_id ?>" <?= $keyword->keywords_id == $ads->keyword ? 'selected="selected"':'' ?>>
												<?=  $keyword->keyword_title ?>
											</option>
										    <?php endforeach ?>
										</select>
									</div>
									<div class="keyword_ad_number_container">
										<div class="form-group m-form__group">
											<label for="recipient-name" class="form-control-label">
												Ad Keyword poisoning:
											</label>
											<input type="text" class="form-control m-input m-input--solid" name="keyword_count_prioirty" value="<?= $ads->keyword_pos ?>">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group m-form__group">
										<label for="exampleInputEmail1">
											 brands
										</label>
										<select class="form-control m-select2 pick_brand_number" id="m_select2_7"  name="brand">
											<option></option>
											<?php foreach($brands as $brand): ?>
											<option value="<?=  $brand->brand_id ?>" <?= $brand->brand_id == $ads->brand ? 'selected="selected"':'' ?>>
												<?=  $brand->brand_title_ar ?>
											</option>
										    <?php endforeach ?>
										</select>
									</div>
									<div class="brands_ad_number_container">
										<div class="form-group m-form__group">
											<label for="recipient-name" class="form-control-label">
												Ad brands poisoning:
											</label>
											<input type="text" class="form-control m-input m-input--solid" name="brand_count_prioirty" value="<?= $ads->brand_pos ?>">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div>
										<div class="form-group m-form__group m--margin-top-10">
											<label for="exampleInputEmail1">
												 Per Click / time
											</label>
											<select class="form-control m-select2 perTime" id="m_select2_2"  name="clickTime" data-id="<?= $ads->ad_id ?>">
												<option></option>
												<option value="1" <?= $ads->per_what==1 ? 'selected="selected"':'' ?>>
													Per Click
												</option>
												<option value="2" <?= $ads->per_what==2 ? 'selected="selected"':'' ?>>
													Time
												</option>
											</select>
										</div>
										<input type="hidden" name="ad_id" value="<?= $ads->ad_id ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="per_click">
										<div class="form-group m-form__group m--margin-top-10">
											<label for="recipient-name" class="form-control-label">
												<?= $ads->per_what==1 ? 'Click Count':'ime Per Day' ?>:
											</label>
											<input type="text" class="form-control m-input m-input--solid" name="per_click" value="<?= $ads->per_what_answer ?>">
										</div>
									</div>
								</div>
							</div>
							<div class="module_generator"></div>
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