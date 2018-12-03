<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<div class="m-subheader ">
			<div class="align-items-center">
				<div class="m-portlet m-portlet--tab">
					<form class="m-form m-form--fit m-form--label-align-right categoryEdidtor"  method="POST">
						<div class="m-portlet__body">
							<div class="form-group m-form__group m--margin-top-10">
								<label for="recipient-name" class="form-control-label">
									Title Arabic:
								</label>
								<input type="text" class="form-control m-input m-input--solid" name="title_ar_edit" id="title_ar_edit" value="<?= $category_row->keyword_title ?>">
							</div>
							<div class="form-group m-form__group">
								<label for="message-text" class="form-control-label">
									Title English:
								</label>
								<input type="text" class="form-control m-input m-input--solid" name="title_en_edit" id="title_en_edit" value="<?= $category_row->cat_keywords_en ?>">
							</div>
							<div class="form-group m-form__group">
								<label for="message-text" class="form-control-label">
									Description Arabic:
								</label>
								<textarea class="form-control m-input m-input--solid" name="desc_ar_edit" id="desc_ar_edit"><?= $category_row->category_desc ?></textarea>
							</div>
							<div class="form-group m-form__group">
								<label for="message-text" class="form-control-label">
									Description english:
								</label>
								<textarea class="form-control" name="desc_en_edit" id="desc_ar_edit"><?= $category_row->category_desc_en ?></textarea>
							</div>
							<div class="form-group m-form__group">
								<label for="exampleInputEmail1">
									choose relative category
								</label>
								<select class="form-control m-input m-input--solid m-select2" id="m_select2_11" multiple name="keywords[]">
									<option></option>
									
								</select>
							</div>
							<div class="form-group m-form__group">
								<label for="message-text" class="form-control-label">
									Category img:
								</label>
								<div class="category-img-holder">
									<img src="assets/uploads/<?= $category_row->picutre ?>">
								</div>
							</div>
							
							<input type="hidden" name="id" value="<?= $category_row->keywords_id ?>">

							
						</div>
						<div class="m-portlet__foot m-portlet__foot--fit">
							<div class="m-form__actions">
								<button type="submit" class="btn btn-success">
									Submit
								</button>
							</div>
						</div>
					</form>
					<form class="m-dropzone dropzone uploadForm" data-catid="<?= $category_row->keywords_id ?>" data-dz-catId="<?= $category_row->keywords_id ?>" action="./Dashboard/upload_category_photo" id="m-dropzone-one">
						<div class="m-dropzone__msg dz-message needsclick">
							<h3 class="m-dropzone__msg-title">
								Drop Picture Here or click to upload.
							</h3>
							<span class="m-dropzone__msg-desc">
								<strong>
									not
								</strong>
								actually uploaded.
							</span>
						</div>
						<input type="hidden" name="category_id" class="category_id" value="<?= $category_row->keywords_id ?>">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>